<?php
App::uses('AppController', 'Controller');
App::uses('CakeSchema', 'Model');
App::uses('ConnectionManager', 'Model');
App::uses('Inflector', 'Utility');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Subperiodos Controller
 *
 * @property Subperiodo $Subperiodo
 */

class SeguridadController extends AppController 
{
    private $QuerysPermitidas = array();
    private $timeQeuryPe;
    
    function salvar($execute = false) {
        
        $i=0;
        
        if ($this->request->is('ajax') && !$execute)
        {
            
            $this->autoRender = false;
            print_r($this->Session->read('textShowLoad'));
        }
        else
       if ($this->request->is('post'))
        {
            $textShowLoad = array();
        
                    $dataSourceName = 'default';
                
                    $path = APP. DS .'Backups'. DS;

                    $Folder = new Folder($path, true);
                
                $fileSufix = date('Ymd\_His') . '.sql';
                $file = $path . $fileSufix;
                if (!is_writable($path)) {
                        trigger_error('La ruta "' . $path . '" no es posible escribir!', E_USER_ERROR);
                }
                
                $continueSave = true;
                //$this->out("Backing up...\n");
                $textShowLoad .= "Salvando...<br>";
                //$this->Session->write('textShowLoad',$textShowLoad);
                $File = new File($file);
                
                $db = ConnectionManager::getDataSource($dataSourceName);

                $config = $db->config;
                $this->connection = "default";
                $File->write('SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";DELIMITER_SQL
                    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;DELIMITER_SQL
                    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;DELIMITER_SQL
                    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;DELIMITER_SQL
                    /*!40101 SET NAMES utf8 */;DELIMITER_SQL');
                    try{
                foreach ($db->listSources() as $table) {
                
                        $table = str_replace($config['prefix'], '', $table);
                        // $table = str_replace($config['prefix'], '', 'dinings');
                        $ModelName = Inflector::classify($table);
                        $Model = ClassRegistry::init($ModelName);
                        $DataSource = $Model->getDataSource();
                        $this->Schema = new CakeSchema(array('connection' => $this->connection));
                        
                        $cakeSchema = $db->describe($table);
                        // $CakeSchema = new CakeSchema();
                        
                        $this->Schema->tables = array($table => $cakeSchema);
                        
                        $File->write("\n/* Drop statement for {$table} */\n");
                        $File->write("SET foreign_key_checks = 0;DELIMITER_SQL\n");
                        // $File->write($DataSource->dropSchema($this->Schema, $table) . "\n");
                        //$File->write($DataSource->dropSchema($this->Schema, $table)."DELIMITER_SQL\n");
                        $File->write("DROP TABLE IF EXISTS `".$config['database']."`.`".$table."`;DELIMITER_SQL\n");
                        //$File->write("TRUNCATE ".$table.";");
                        

                        $File->write("\n/* Backuping table schema {$table} */\n");
                        
                        $arrayCreateTable = $Model->query("SHOW CREATE TABLE ".$config['database'].".".$table);
                        //print_r($queryCreateTable);
                        //break;
                        
                        $queryCreateTable = str_replace('`'.$table.'`','`'.$config['database'].'`.'.'`'.$table.'`',$arrayCreateTable[0][0]['Create Table']);
                       
                        $File->write($queryCreateTable.";DELIMITER_SQL\n");

                        $File->write("\n/* Backuping table data {$table} */\n");

                
                        unset($valueInsert, $fieldInsert);

                        $rows = $Model->find('all', array('recursive' => -1));
                        $quantity = 0;
                        
                        if (sizeOf($rows) > 0) {
                                $fields = array_keys($rows[0][$ModelName]);
                                $values = array_values($rows);        
                                $count = count($fields);

                                for ($i = 0; $i < $count; $i++) {
                                        $fieldInsert[] = $DataSource->name($fields[$i]);
                                }
                                $fieldsInsertComma = implode(', ', $fieldInsert);

                                foreach ($rows as $k => $row) {
                                        unset($valueInsert);
                                        for ($i = 0; $i < $count; $i++) {
                                                $valueInsert[] = $DataSource->value(utf8_encode($row[$ModelName][$fields[$i]]), $Model->getColumnType($fields[$i]), false);
                                        }

                                        $query = array(
                                                'table' => $DataSource->fullTableName($table),
                                                'fields' => $fieldsInsertComma,
                                                'values' => implode(', ', $valueInsert)
                                        );                
                                        $File->write($DataSource->renderStatement('create', $query) . ";DELIMITER_SQL\n");
                                        $quantity++;
                                }
                                


                        }
                        $File->write("SET foreign_key_checks = 1;DELIMITER_SQL\n");
                        //$this->out('Model "' . $ModelName . '" (' . $quantity . ')');
                        $textShowLoad .= 'Model "' . $ModelName . '" (' . $quantity . ')<br>';
                        
                        //$this->Session->write('textShowLoad',$textShowLoad);
                        
                }
                }
                catch(exception $e)
                {
                    
                    $continueSave = false;
                    $this->requestAction("trazas/add/Error al Salvar Estructura y Datos de la BD/");
                }
                $File->write('/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;DELIMITER_SQL
                                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;DELIMITER_SQL
                                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;DELIMITER_SQL');
                $File->close();
                //$this->out("\nFile \"" . $file . "\" saved (" . filesize($file) . " bytes)\n");
                

                if ($continueSave)
                {
                $textShowLoad .= "\Fichero \"" . $file . "\" salvado (" . filesize($file) . " bytes)<br>";    
                if (class_exists('ZipArchive') && filesize($file) > 100) {
                        //$this->out('Zipping...');
                        $textShowLoad .= 'Compactando...';
                        //$this->Session->write('textShowLoad',$textShowLoad);
                        $zip = new ZipArchive();
                        $zip->open($file . '.zip', ZIPARCHIVE::CREATE);
                        $zip->addFile($file, $fileSufix);
                        $zip->close();
                        //$this->out("Zip \"" . $file . ".zip\" Saved (" . filesize($file . '.zip') . " bytes)\n");
                        $textShowLoad .= "Zip \"" . $file . ".zip\" salvado (" . filesize($file . '.zip') . " bytes)<br>";
                        //$this->Session->write('textShowLoad',$textShowLoad);
                        //$this->out("Zipping Done!");
                        $textShowLoad .= "Compactado terminado!<br>";
                        //$this->Session->write('textShowLoad',$textShowLoad);
                        if (file_exists($file . '.zip') && filesize($file) > 10) {
                                unlink($file);
                        }
                        //$this->out("Database Backup Successful.\n");
                        $textShowLoad .= "La Base de Datos ha sido salvada satisfactoriamente.<br>";
                        //$this->Session->write('textShowLoad',$textShowLoad);
                        //$this->set('textShow',$textShowLoad);
                        //$this->Session->showMessage($textShowLoad,$this->MSG_SUCCESS);
                        
                        $this->viewClass = 'Media';
                        // Download app/outside_webroot_dir/example.zip
                        $params = array(
                                        'id'        => $fileSufix.'.zip',
                                        'name'      => $fileSufix,
                                        'download'  => true,
                                        'extension' => 'zip',
                                        'path'      => APP . 'Backups' . DS
                                        );
                        $this->set($params);
                }
                else
                {
                  $textShowLoad = "La Base de Datos no se pudo compactar.<br>";
                  //$this->Session->write('textShowLoad',$textShowLoad);  
                  $this->Session->showMessage($textShowLoad,$this->MSG_SUCCESS);
                  $this->viewClass = 'Media';
                        // Download app/outside_webroot_dir/example.zip
                        $params = array(
                                        'id'        => $fileSufix,
                                        'name'      => $fileSufix,
                                        'download'  => true,
                                        'extension' => '',
                                        'path'      => APP . 'Backups' . DS
                                        );
                        $this->set($params);
                }
                }
                else
                {
                    unlink($file);
                    $textShowLoad = "No se pudo obtener todos los datos de la salva.<br>";
                    //$this->Session->write('textShowLoad',$textShowLoad);
                    $this->Session->showMessage($textShowLoad,$this->MSG_ERROR);
                }
                
                
        }
       
        }

        function loadQueryPermitidas()
        {
                $db = ConnectionManager::getDataSource('default');
                $config = $db->config;
                
                $this->QuerysPermitidas[] = 'INSERT INTO `'.$config['database'].'`.'; 
                
                $this->QuerysPermitidas[] = 'CREATE TABLE `'.$config['database'].'`.';
                
                
                $this->QuerysPermitidas[] = 'SET foreign_key_checks = 0';
                $this->QuerysPermitidas[] = 'DROP TABLE IF EXISTS `'.$config['database'].'`.';
                $this->QuerysPermitidas[] = 'SET foreign_key_checks = 1';               
                
                $this->QuerysPermitidas[] = 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"';
                $this->QuerysPermitidas[] = '/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */';
                $this->QuerysPermitidas[] = '/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */';
                $this->QuerysPermitidas[] = '/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */';
                $this->QuerysPermitidas[] = '/*!40101 SET NAMES utf8 */';               
                
                $this->QuerysPermitidas[] = '/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */';
                $this->QuerysPermitidas[] = '/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */';
                $this->QuerysPermitidas[] = '/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */';
                
                /*$pathFileForeinKey = APP.'Backups'.DS.'forein_key_db.inc.php';
                if (file_exists($pathFileForeinKey))
                {
                    if (($forein_key_db = file_get_contents($pathFileForeinKey)) != false)
                    {
                        $arrayForeinKey = explode(';DELIMITER_SQL',$forein_key_db);
                        for ($i=0;$i<count($arrayForeinKey);$i++)
                            $this->QuerysPermitidas[] = $arrayForeinKey[$i];
                    }
                    else
                    return false;
                }
                else
                    return false;  */
                    
           return true;         
        }
        function querysPermitidas($query)        
        {    
           $tiempo_inicio = microtime(true);
           for ($i = 0;$i<count($this->QuerysPermitidas);$i++)
           {
                if (strpos($query,$this->QuerysPermitidas[$i]) !== false)
                {
                        //echo $query.'---'.$i.'<br/>';
                    return true;
                }    
                    
           }
           $tiempo_fin = microtime(true);   
           $this->timeQeuryPe[]  = 'Demora '.$tiempo_fin - $tiempo_inicio;
           //echo 'Demora '.$tiempo_fin - $tiempo_inicio;
           return false;
        }
        function restaurar(){
            //set_time_limit(400);
            if ($this->request->is('post') && $this->request->data != null)
            {
                
                
                if($this->request->data['restaurar']['file']['size'] > 0)
                {
                    $file = $this->request->data['restaurar']['file'];
                    if ($this->uploadDocument($this->request->data['restaurar']['file']))
                    {
                      $dataSourceName = 'default';             
                      
                
                      $tmpath = APP . DS . 'tmp'.DS.'restore_db';
                        
                      $fileRestore = APP.'tmp'.DS.'restore_db'.DS.$file['name'];
                      
                        App::import('Model', 'AppModel');
                         
                        $model = new AppModel(false, false);
                            
                        $model = $model->getDataSource();
                        
                        $message = "";
                        $error = false;
                                if(file_exists($fileRestore)){
                                         //$this->out('Restoring file: '.$zipfile);
                                         
                                         //echo 'Restoring file: '.$zipfile;
                                         $fileParts = explode(".",$fileRestore);
                                         
                                         if ($fileParts[count($fileParts)-1]=='zip')
                                            {
                                            
                                                 //$this->out('Unzipping File');
                                                 $message = '-Descompactando Fichero<br/>';
                                                 if (class_exists('ZipArchive')) {
                                                         $zip = new ZipArchive;
                                                         if($zip->open($fileRestore) === TRUE){
                                                                 $zip->extractTo($tmpath);
                                                                 $work_file = $tmpath.DS.$zip->getNameIndex(0);
                                                                 $zip->close();
                                                                 //$this->out('Successfully Unzipped');
                                                                 $message .= '-Descompactado Satisfactorio<br/>';
                                                         } else {
                                                                 //$this->out('Unzip Failed');
                                                                 $message .= '-Error al Descompactar<br/>';
                                                                 $error = true;
                                                                 //$this->_stop();
                                                         }
                                                 } else {
                                                         //$this->out('ZipArchive not found, cannot Unzip File!');
                                                         $message .= '-Librería ZipArchive no se encuentra habilitada, no se puede descompactar!<br/>';
                                                         //$this->_stop();
                                                         $error = true;
                                                 }
                                            }
                                            else
                                            if ($fileParts[count($fileParts)-1]=='sql')
                                            {
                                                $work_file = $fileRestore;
                                            }                                         
                                            else
                                            {
                                                $error = true;
                                                $message .= "-Fichero no soportado para la Restaura<br/>";
                                            }
                                                
                
                                         if (($sql_content = file_get_contents($filename = $work_file)) !== false && !$error){
                                                 //$this->out('Restoring Database');
                                                 $message .= '-Restaurando Base de Datos<br/>';
                                                 
                                                 $sql = explode(";DELIMITER_SQL", $sql_content);
                                                 
                                                 if ($this->loadQueryPermitidas())
                                                 {
                                                     $model->begin();
                                                     $k = 0;
                                                     try{
                                                     set_time_limit(120);
                                                     foreach ($sql as $key => $s) {
                                                             if(trim($s)){
                                                                     //$pdoStat = $model->prepare($s);
                                                                      //$pdoStat->closeCursor();
                                                                     //$result = $pdoStat->execute();
                                                                     
                                                                     //$result = $model->query($s);
                                                                    if ($this->querysPermitidas($s))
                                                                    {
                                                                       //$tiempo_inicio = microtime(true);
                                                                       $result = $model->execute($s);
                                                                       //$tiempo_fin = microtime(true);  
                                                                       //echo "<br>Tiempo de ejecución redondeado: " . round($tiempo_fin - $tiempo_inicio, 4);
                                                                    }                                                                 
                                                                   else
                                                                   {
                                                                    //echo $s;
                                                                    $model->rollback();
                                                                    $message .='-Error al restaurar<br/>';
                                                                    echo $s;
                                                                    $error = true;
                                                                    $this->requestAction("trazas/add/Error al Restaurar Consulta no permitida/");
                                                                    break;
                                                                   }  
                                                                    
                                                             }
                                                     }
                                                     if (!$error)
                                                     {
                                                        $model->commit();
                                                        $message .= '-Restaura Finalizada<br/>';
                                                        $this->requestAction("trazas/add/Restaura Finalizada/");
                                                        print_r($this->timeQeuryPe);
                                                     }
                                                     
                                                     }
                                                     catch (Exception $e)
                                                    {
                                                       
                                                       $model->rollback();
                                                       //$message .= $e;
                                                        $message .='-Error al restaurar<br/>.'.$s;
                                                        $error = true;
                                                        $this->requestAction('trazas/add/Error al Restaurar Error SQL/'); 
                                                    }
                                                }
                                                else
                                                {
                                                  $message .= "-No se pudo obtener todos los datos para la restaura<br/>";
                                                  $error = true;  
                                                }
                                                 unlink($fileRestore);
                                         } else {
                                                 //$this->out("Couldn't load contents of file {$unzipped_file}, aborting...");
                                                 $message .= "-No se puede cargar el contenido del fichero {$fileRestore}, abortando...";
                                                 $error = true;
                                                 unlink($fileRestore);
                                            //$this->_stop();
                                         }
                                 } else {
                                         //$this->out("Invalid File Number");
                                         $message .= "-El Fichero {$fileRestore} no existe<br/>";
                                         $error = true;
                                         //$this->_stop();
                                 }
                                 
                             if ($error)                             
                                $this->Session->showMessage("Error al Restaurar:<br/>".$message, $this->MSG_ERROR);
                             else
                                $this->Session->showMessage("Restaura realizada:<br/>".$message, $this->MSG_SUCCESS);
                   $tiempo_fin = microtime(true);    
                   
                  //echo "<br>Tiempo de ejecución redondeado: " . round($tiempo_fin - $tiempo_inicio, 4);      
                 }
                 else
                    $this->Session->showMessage("Error al subir el fichero", $this->MSG_ERROR);
                }
                else
                    $this->Session->showMessage("Debe seleccionar un fichero", $this->MSG_ERROR);
                
                }
              

        }
    private function uploadDocument($file) 
    {      
      if ($file['error'] === UPLOAD_ERR_OK) 
      {
        $this->request->data['Seguridad']['nombre'] = $file['name'];
        //$id = String::uuid();
        
            return  move_uploaded_file($file['tmp_name'], APP.'tmp'.DS.'restore_db'.DS.$file['name']); 
                   
      }
      else 
       return false;
    }    
    
    public function isAuthorized($user) 
    {
        if($user['Tipousuario']['nivel'] === $this->TECNOLOGO_LEVEL) 
        {
            return true;
        }
    
        // Default deny
        return false;
        
       
    }

}

?>
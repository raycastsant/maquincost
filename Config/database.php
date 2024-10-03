<?php
class DATABASE_CONFIG 
{
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'maquincost',
	);
    
	 /*public $default = array(
                    //'driver'   => 'adodb',
                    'datasource' => 'Database/Adodb', 
                    'persistent' => false,
                    'connect'  => 'access', 
                    'host'     => 'Driver={Microsoft Access Driver(*.mdb)};Dbq=E:\Gx_Data.MDB;	', 
                    'login'    => 'Admin', 
                    'password' => 'alimaticsicema', 
                    'database' => 'Gx_Data'); */
}

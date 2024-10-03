<?php
class PchartsController extends AppController {
     public  $name = 'Pcharts';
     //1   
     public  $uses = null;                                                         
     
      
     public function index()
     {      
         //2
         $this->autoRender = true;
          
         //3                                               
         App::import('Vendor','pData', array('file' =>'pchart'.DS.'pChart'.DS.'pData.class')); 
         App::import('Vendor','pChart', array('file' =>'pchart'.DS.'pChart'.DS.'pChart.class'));
          
         //4
         $fontFolder = APP.'Vendor'.DS.'pchart'.DS.'Fonts';                       
          
         //5
         // Dataset definition
       /*  $DataSet = new pData;
         $DataSet->AddPoint(array(1,4,3,2,12,10,20,11,9,7,4),"Serie1");  
         $DataSet->AddPoint(array(3,3,14,5,2,2,10,19,21,16,17),"Serie2");  
         $DataSet->AddAllSeries();
         $DataSet->SetSerieName("Sample data","Serie1");
         $DataSet->SetSerieName("Sample hfhdata","Serie2");
         
         // Initialise the graph
         $Test = new pChart(700,230);
         $Test->setFontProperties($fontFolder.DS."tahoma.ttf",10);
         $Test->setGraphArea(40,30,680,200);
         $Test->drawGraphArea(252,252,252,TRUE);
         $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);
         $Test->drawGrid(4,TRUE,230,230,230,70);
         
         // Draw the line graph
         $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());
         $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);
         
         // Finish the graph
         $Test->setFontProperties($fontFolder.DS."tahoma.ttf",8);
         $Test->drawLegend(45,35,$DataSet->GetDataDescription(),255,255,255);
         $Test->setFontProperties($fontFolder.DS."tahoma.ttf",10);
         $Test->drawTitle(60,22,"My pretty graph",50,50,50,585);
         $Test->Stroke();*/
         
       // Dataset definition   
         $DataSet = new pData;  
         $DataSet->AddPoint(array(1,4,3,4,3,3,2,1,0,7,4,3,2,3,3,5,1,0,7),"Serie1");  
         $DataSet->AddPoint(array(1,4,2,6,2,3,0,1,5,1,2,4,5,2,1,0,6,4,2),"Serie2");  
         $DataSet->AddAllSeries();  
         $DataSet->SetAbsciseLabelSerie();  
         $DataSet->SetSerieName("January","Serie1");  
         $DataSet->SetSerieName("February","Serie2");  
          
         // Initialise the graph  
         $DataSet = new pData;  
         $DataSet->AddPoint(array(10,2,3,5,3),"Serie1");  
         $DataSet->AddPoint(array("Jan","Feb","Mar","Apr","May"),"Serie2");  
         $DataSet->AddAllSeries();  
         $DataSet->SetAbsciseLabelSerie("Serie2");  
          
         // Initialise the graph  
         $Test = new pChart(380,200);  
         $Test->drawFilledRoundedRectangle(7,7,373,193,5,240,240,240);  
         $Test->drawRoundedRectangle(5,5,375,195,5,230,230,230);  
          
         // Draw the pie chart  
         $Test->setFontProperties($fontFolder.DS."tahoma.ttf",8);  
         $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),150,90,110,PIE_PERCENTAGE,TRUE,50,20,5);  
         $Test->drawPieLegend(310,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250); 
         $Test->Render('img'.DS.'example.png');  
} 
 }
?>
<?php

namespace curriculum\report;

include_once('class/tcpdf/tcpdf.php');
include_once("class/PHPJasperXML.inc.php");


class AdapterPHPJasperXML extends \PHPJasperXML {
	
	public function outpage($out_method="I",$filename="") {
//  		ob_clean();
//  		ob_start();
		
		$result = parent::outpage($out_method, $filename);
		
		
		return $result;
	}
	
	public function transferDataToArray(array $data) {
		$this->cndriver = "arrayData";
		$this->m=0;
		if(is_null($data)) {
			echo "Array Data most not be null";
			exit(0);
		}
		 
		foreach ($data as $row) {
			foreach($this->arrayfield as $out) {
				echo "<br>".$out.": ".$row->$out;
				$this->arraysqltable[$this->m]["$out"]=$row->$out;
			}
			$this->m++;
		}
	}
	
	public function disconnect($cndriver="mysql") {
		if($cndriver!="arrayData") {
			parent::disconnect($cndriver);
		}
	}
	
	public function includeSubReport($d,$arrdata,$current_y){
		
		if($this->cndriver!="arrayData") {
			parent::includeSubReport($d,$arrdata,$current_y);
		}  
		
		include_once ("PHPJasperXMLSubReport.inc.php");
		$srxml=  simplexml_load_file($d['subreportExpression']);
		$PHPJasperXMLSubReport= new AdapterPHPJasperXMLSubReport($this->lang,$this->pdflib,$d['x']);
		$PHPJasperXMLSubReport->arrayParameter=$arrdata;
		$PHPJasperXMLSubReport->debugsql=$this->debugsql;
		$PHPJasperXMLSubReport->xml_dismantle($srxml);
		 
		 
		$this->passAllArrayDatatoSubReport($PHPJasperXMLSubReport,$d,$current_y,$arrdata);
		
 		$PHPJasperXMLSubReport->transferDataToArray($arrdata);
		$PHPJasperXMLSubReport->pdf=$this->pdf;
  		$PHPJasperXMLSubReport->outpage();    //page output method I:standard output  D:Download file
	
		$this->SubReportCheckPoint=$PHPJasperXMLSubReport->SubReportCheckPoint;
// 		echo $this->SubReportCheckPoint."<br/>";
		$PHPJasperXMLSubReport->MainPageCurrentY=0;
		return $PHPJasperXMLSubReport->maxy;
	}
	

}
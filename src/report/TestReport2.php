<?php
namespace curriculum\report;

include_once('class/tcpdf/tcpdf.php');
include_once("class/PHPJasperXML.inc.php");

class TestReport2 {

	public function geraRelatorio() {
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		
		$rr = new \PHPJasperXML("en");
 		$rr->arrayParameter=array("parameter1"=>1);
		
		$rr->load_xml_file(__DIR__."/Profile.jrxml");
		
		$rr->transferDBtoArray("localhost", "root", "23775811","curriculum_vitae"); 

   		$rr->outpage("I");  	
	}

}
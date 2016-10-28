<?php
namespace curriculum\report;

class TestReport {

	public function geraRelatorio(array $data) {
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		
		$rr = new AdapterPHPJasperXML();
// 		$rr->arrayParameter=array("parameter1"=>1);
		
		$rr->load_xml_file(__DIR__."/Profile.jrxml");
		
		
		$rr->transferDataToArray($data); 

   		$rr->outpage("D");  	
	}

}
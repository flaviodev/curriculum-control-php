<?php

namespace curriculum\report;

include_once("class/PHPJasperXMLSubReport.inc.php");


class AdapterPHPJasperXMLSubReport extends \PHPJasperXMLSubReport {
	
	
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

}
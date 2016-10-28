<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

use curriculum\control\services\ServiceProfileImp;
use curriculum\report\TestReport;
use curriculum\report\TestReport2;
class Teste {
	public function invoke2($object, $function, $jsonData, bool $isCommand=false) {
		if(is_null($object)) {
			$this->response('Servico não existe',404);
		} else {
			if(!is_null($function)) {
				if((int)method_exists($object,$function) > 0) {
					$args = array();
					if(!is_null($jsonData)) {
						$input = json_decode($jsonData,false,JSON_UNESCAPED_UNICODE);
						
						$i=0;
						foreach ($input as $value) {
							if(is_array($value)) {
								$args[$i++] = $value[0];
							} else {
								$args[$i++] = $value;
							}
						}
					}
					
					$reflectionMethod = new \ReflectionMethod($object, $function);
					if($isCommand) {
						return $reflectionMethod->invoke($object,$args);
					} else {
						return $reflectionMethod->invokeArgs($object, $args);
					}
				} else {
					$this->response('Método não existe',404);
				}
			}
		}
	}

	

}

echo "<br>inicio teste";

$teste = new Teste();
$controller = new ServiceProfileImp();

echo "<br><br><br>consulta profile 1<br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke2($controller, "getProfile", $data);
var_dump($resultado);


echo "<br><br><br>alterando profile 1<br>";
$data = '{"profile":[{"id":"1","name":"Flávio de Souza","dateOfBirth":"1981-09-13","document":"1334343"}]}';
$teste->invoke2($controller, "updateProfile", $data);

echo "<br><br><br>consultado profile 1<br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke2($controller, "getProfile", $data);
var_dump($resultado);

echo "<br><br><br>incluindo profile <br>";
$data = '{"profile":[{"id":"1","name":"Maria Clara de Souza e Lima","dateOfBirth":"2016-03-25","document":"1212121"}]}';
$resultado = $teste->invoke2($controller, "createProfile", $data);
var_dump($resultado);

$data = '{"id":"'.$resultado->id.'"}';
echo "<br><br><br>deletando profile incluído <br>";
$resultado = $teste->invoke2($controller, "deleteProfile", $data);

echo "<br><br><br>obtendo lista de profiles <br>";
$resultado = $teste->invoke2($controller, "getProfiles",null);
var_dump($resultado);

echo "<br><br><br>obtendo lista de aq <br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke2($controller, "getAcademicsQualifications",$data);
var_dump($resultado);

echo "<br><br><br>obtendo lista report <br>";
$resultado = $teste->invoke2($controller, "getProfilesReport",null);

// $report = new TestReport();
// $report->geraRelatorio($resultado);



echo "<br><br>fim do teste";


?>
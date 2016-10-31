<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

use curriculum\control\services\ServiceRegisterImp;
use ttm\Config;

class Teste {
	public function invoke($object, $methodName, $jsonData, bool $isCommand=false) {
		if(is_null($object)) {
			$this->response('Requested service/command not found',404);
		} else {
			if(!is_null($methodName)) {
				if((int)method_exists($object,$methodName) > 0) {
					//getting input parameters
					$input = json_decode($jsonData);
	
					$args = array();
					if(!is_null($input)) {
						// creating array of arguements for invonking service
						$i=0;
						foreach ($input as $value) {
							// whether parameter arrived encapsulated on secong level of the input array
							if(is_array($value)) {
								$args[$i++] = $value[0];
							} else {
								$args[$i++] = $value;
							}
						}
					}
					
					// invoking method on service/command
					$reflectionMethod = new \ReflectionMethod($object, $methodName);
					if($isCommand) {
						// on command sets an array of arguments
						return Config::getDataParser()->parseOutputData($reflectionMethod->invoke($object,$args));
					} else {
						// on service the sequence of input arguments should be the
						// same of the method parameters (method signature)
						return Config::getDataParser()->parseOutputData($reflectionMethod->invokeArgs($object, $args));
					}
				} else {
					$this->response('Resource of service/command not found',404);
				}
			}
		}
	}
	

}

echo "<br>inicio teste";

$teste = new Teste();
$controller = new ServiceRegisterImp();


echo "<br><br><br>consulta profile 1<br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke($controller, "getProfile", $data);
var_dump($resultado);


echo "<br><br><br>alterando profile 1<br>";
$data = '{"profile":[{"id":"1","name":"Flávio de Souza","dateOfBirth":"1981-09-13","document":"1334343"}]}';
$teste->invoke($controller, "updateProfile", $data);

echo "<br><br><br>consultado profile 1<br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke($controller, "getProfile", $data);
var_dump($resultado);

echo "<br><br><br>incluindo profile <br>";
$data = '{"profile":[{"id":"1","name":"Maria Clara de Souza e Lima","dateOfBirth":"2016-03-25","document":"1212121"}]}';
$resultado = $teste->invoke($controller, "createProfile", $data);
var_dump($resultado);

$j = json_decode($resultado);
$id = $j->id;
$data = '{"id":"'.$id.'"}';
echo "<br><br><br>deletando profile incluído <br>";
$resultado = $teste->invoke($controller, "deleteProfile", $data);

echo "<br><br><br>obtendo lista de profiles <br>";
$resultado = $teste->invoke($controller, "getProfiles",null);
var_dump($resultado);

echo "<br><br><br>obtendo lista de aq <br>";
$data = '{"id":"1"}';
$resultado = $teste->invoke($controller, "getAcademicsQualifications",$data);
var_dump($resultado);


// $report = new TestReport();
// $report->geraRelatorio($resultado);



echo "<br><br>fim do teste";


?>
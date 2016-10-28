<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

use curriculum\control\services\ServiceRegisterImp;
use ttm\util\Util;
use ttm\util\UtilDate;

class Teste {
	public function invoke($object, $function, $jsonData, bool $isCommand=false) {
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
						$return = $reflectionMethod->invoke($object,$args);
						
						$data = array();
						$data['reply']= $this->filterSendPropertiesReply($return);
						
						return json_encode($data,false,JSON_UNESCAPED_UNICODE);
					} else {
						$return = $reflectionMethod->invokeArgs($object,$args);
						
						$data = array();
						$data['reply']= $this->filterSendPropertiesReply($return);
						
						return json_encode($data,false,JSON_UNESCAPED_UNICODE);
					}
				} else {
					$this->response('Método não existe',404);
				}
			}
		}
	}

	private function filterSendPropertiesReply($data) {
		if(is_array($data) || is_subclass_of($data, \ArrayAccess::class)) {
			$arrayFO = array();
			foreach ($data as $item) {
				array_push($arrayFO, $this->getFilteredObjectSendPropertiesReply($item));
			}
				
			return $arrayFO;
		} else {
			return $this->getFilteredObjectSendPropertiesReply($data);
		}
	}
	
	private function getFilteredObjectSendPropertiesReply($data) {
		if(is_null($data))
			return;
	
			$filteredObject = new \stdClass();
	
			$reflectionObject = new \ReflectionObject($data);
	
			foreach ($reflectionObject->getProperties() as $prop) {
				if(strpos($prop->getDocComment(), "@ttm-DtoAttribute")>-1) {
					$property = $prop->getName();
	
					$function = Util::doMethodName($property,"get");
					
					if((int)method_exists($data,$function) > 0) {
						$reflectionMethod = new \ReflectionMethod($data, $function);
							
						$value = $reflectionMethod->invoke($data, null);
							
						if(is_a($value, \DateTime::class)) {
							$value = UtilDate::dateToString($value);
						}
	
						$filteredObject->$property = $value;
					} else {
						$function = Util::doMethodName($property,"is");
						if((int)method_exists($data,$function) > 0) {
							$reflectionMethod = new \ReflectionMethod($data, $function);
								
							$value = $reflectionMethod->invoke($data, null);
							$filteredObject->$property = $value;
						}
					}
				}
			}
	
			return $filteredObject;
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
$id = $j->reply->id;
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
<?php
namespace curriculum\control;

header('Content-Type: text/html; charset=utf-8');
require '../../vendor/autoload.php';

use ttm\control\AbstractFrontController;

class FrontController extends AbstractFrontController {

	
	public function locateController($interfaceName) {
		$interfaceName='curriculum\\control\\services\\'.$interfaceName;
		$controllerName = $this->getControllerImplementation($interfaceName);
		return new $controllerName();
	}
	
	public function locateCommand($commandName) {
		$commandName = $this->getCommandsImplementation($commandName);
		return new $commandName();
	}
	
	public function getConfigInfo() {
		return Config::getConfig();
	}
	
}

$frontController = new FrontController();
$frontController->processRequest();

?>

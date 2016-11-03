<?php
namespace curriculum\control;

// require file that load the dependencies
require_once  '../../vendor/autoload.php';

use curriculum\Config;
use ttm\control\AbstractRestController;
use ttm\exception\TTMException;

/**
 * @author flaviodev - Flávio de Souza TTM/ITS - fdsdev@gmail.com
 *
 * Class FrontController - Implements AbstractFrontController encapsulating the treatment of
 * service and command requests.
 * 
 * @see \ttm\control\AbstractFrontController
 * 
 * @package curriculum-control-php
 * @namespace curriculum\control
 * @version 1.0
 */
class RestController extends AbstractRestController {
	
	/**
	 * @method locateCommand - Implements the seek of the registred commands
	 *
	 * @param $commandAlias - command alias for locating
	 * @return the instance of required command
	 *
	 * @throws InvalidArgumentException - The command alias can't be null
	 * @throws InvalidArgumentException - No command registred for this command alias
	 * @throws TTMException - Error on instance of the command
	 *
	 * @access public
	 * @since 1.0
	 */
	public function locateCommand($commandAlias) {
		if(is_null($commandAlias)) {
			throw new \InvalidArgumentException("The command alias name can't be null");
		}
	
		//getting the registered commands
		$commands = Config::getControlConfig()->commands;
		$commandName = $commands->$commandAlias;
	
		// whether command not found
		if(is_null($commandName)) {
			throw new \InvalidArgumentException("No command registred for this command alias");
		}
	
		$messageError = "Error on instance of the command: ".$commandName;
		$command = null;
		try {
			$$command = new $commandName();
		} catch (\Exception $e) {
			throw new TTMException($messageError);
		}
	
		if(is_null($command)) {
			throw new TTMException($messageError);
		}
	
		return $command;
	}

	/**
	 * @method solveServiceInterfaceAlias - Implements the solve of the service alias
	 *
	 * @param $serviceInterfaceAlias - service interface alias for solving
	 * @return the service interface name
	 *
	 * @throws InvalidArgumentException - The service interface alias can't be null
	 *
	 * @access public @abstract
	 * @since 1.0
	 */
	public function solveServiceInterfaceAlias($serviceInterfaceAlias) {
		if(is_null($serviceInterfaceAlias)) {
			throw new \InvalidArgumentException("The service interface alias can't be null");
		}
	
		return 'curriculum\\control\\services\\'.$serviceInterfaceAlias;
	}
	
	
	/**
	 * @method locateService - Implements the seek of the registred services
	 *
	 * @param $serviceInterfaceName - service interface name for locating
	 * @return the instance of required service
	 *
	 * @throws InvalidArgumentException - The service interface name can't be null
	 * @throws InvalidArgumentException - No service registred for this service interface
	 * @throws TTMException - Error on instance of the service
	 *
	 * @access public
	 * @since 1.0
	 */
	public function locateService($serviceInterfaceName) {
		if(is_null($serviceInterfaceName)) {
			throw new \InvalidArgumentException("The service interface name can't be null");
		}
		
		// getting registered services
		$services = Config::getControlConfig()->services; 
		$serviceName = $services->$serviceInterfaceName;

		//whether service is not found
		if(is_null($serviceName)) {
			throw new \InvalidArgumentException("No service registered for this service interface");
		}
		
		$messageError = "Error on instance of the service: ".$serviceName;
		$service = null;
		try {
			$service = new $serviceName();
		} catch (\Error $e) {
			throw new TTMException($messageError);
		}
		
		if(is_null($service)) {
			throw new TTMException($messageError);
		}

		return $service;
	}

	public function solveModelAlias($modelAlias) {
		if(is_null($modelAlias)) {
			throw new \InvalidArgumentException("The model alias can't be null");
		}
		
		$model = 'curriculum\\model\\'.$modelAlias;
		if(!class_exists($model)) {
			$model = 'curriculum\\model_emp\\'.$modelAlias;
		}
		
		return $model;
	}
	
	public function getDaoConfig() {
		return Config::getDaoConfig();
	}
}

// when .htaccess redirects the request, the front controller is created and 
// the processeRequest method is invoked 
$frontController = new RestController();
$frontController->processRequest();

?>

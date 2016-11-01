<?php

namespace curriculum\control\services;

use curriculum\Config;
use ttm\control\ServiceHelper;

class ServiceRegisterImp implements ServiceRegister {
	private $helper;
	
	public function __construct() {
		$config = Config::getDaoConfig();
		$this->helper = new ServiceHelper($config);
	}

	public function publishCurriculum($profileId){
		return "curriculum published";
	}
}
<?php

namespace curriculum;

class Config {
	private static $controlConfig=null;
	private static $daoConfig=null;
		
	public static function getControlConfig() {
		if(Config::$controlConfig==null){
			Config::$controlConfig = json_decode(file_get_contents(__DIR__."/controlConfig.json"));
		}
		
		return Config::$controlConfig;
	}
	
	public static function getDaoConfig() {
		if(Config::$daoConfig==null) {
			Config::$daoConfig = json_decode(file_get_contents(__DIR__."/daoConfig.json"),true);
		}
		
		return Config::$daoConfig;
	}
	
}
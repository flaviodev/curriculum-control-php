<?php
namespace curriculum;

class Config {
	private static $config=null;
	private static $configDB=null;
		
	public static function getConfig() {
		if(Config::$config==null)
			Config::$config = json_decode(file_get_contents(__DIR__."/controlConfig.json"));
	
			return Config::$config;
	}
	
	public static function getConfigDB() {
		if(Config::$configDB==null)
			Config::$configDB = json_decode(file_get_contents(__DIR__."/dbConfig.json"),true);
	
			return Config::$configDB;
	}
	
}
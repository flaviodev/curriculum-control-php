<?php
namespace curriculum\control\commands;

use curriculum\model\Profile;
use ttm\control\Command;

class ComandoImprimeDados implements Command{
	public function execute(array $args) {
		$profile = new Profile();
		$profile->setId(88);
		$profile->setName("Flavio de Souza ".$args[0]);
		$profile->setDateOfBirth(new \DateTime());
		$profile->setDocument("322911".$args[1]);
		
		
		return null;
	}
	
	public function __toString() {
		return get_class($this);
	}

}
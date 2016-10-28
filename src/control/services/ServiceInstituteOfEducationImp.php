<?php

namespace curriculum\control\services;

use curriculum\dto\InstituteOfEducationAux;
use curriculum\dto\InstituteOfEducationDTO;
use ttm\control\ServiceHelper;
use curriculum\control\Config;

class ServiceInstituteOfEducationImp implements ServiceInstituteOfEducation {
	private $helper;
	
	public function __construct() {
		$config = Config::getConfigDB();
		$this->helper = new ServiceHelper($config);
	}
	
	public function getInstituteOfEducation(int $id) {
		return $this->helper->getDTO($id);
	}

	public function createInstituteOfEducation($dto) {
		return $this->helper->create($dto);
	}
	
	public function getInstitutesOfEducation():array {
		return $this->helper->getDTOs();
	}
	
	public function updateInstituteOfEducation($dto) {
		$this->helper->update($dto);
	}

	public function deleteInstituteOfEducation(int $id) {
		$this->helper->delete($id);
	}
	
	
}
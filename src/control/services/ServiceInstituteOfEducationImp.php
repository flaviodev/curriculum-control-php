<?php

namespace curriculum\control\services;

use curriculum\dto\InstituteOfEducationAux;
use curriculum\dto\InstituteOfEducationDTO;

class ServiceInstituteOfEducationImp implements ServiceInstituteOfEducation {
	private $aux;
	
	public function __construct() {
		$this->aux = new InstituteOfEducationAux();
	}
	
	public function getInstituteOfEducation(int $id):InstituteOfEducationDTO {
		return $this->aux->getDTO($id);
	}
	
	public function getInstitutesOfEducation():array {
		return $this->aux->getDTOs();
	}
	
	public function updateInstituteOfEducation($dto) {
		$this->aux->update($dto);
	}

	public function deleteInstituteOfEducation(int $id) {
		$this->aux->delete($id);
	}
	
	public function createInstituteOfEducation($dto):InstituteOfEducationDTO {
		return $this->aux->create($dto);
	}
	
}
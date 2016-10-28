<?php

namespace curriculum\control\services;

use curriculum\dto\InstituteOfEducationDTO;

interface  ServiceInstituteOfEducation {
	
	public function getInstituteOfEducation(int $id):InstituteOfEducationDTO;
	
	public function getInstitutesOfEducation():array;
	
	public function updateInstituteOfEducation($dto);
	
	public function deleteInstituteOfEducation(int $id);
	
	public function createInstituteOfEducation($dto):InstituteOfEducationDTO;
	
}
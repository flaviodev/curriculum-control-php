<?php

namespace curriculum\control\services;

interface  ServiceInstituteOfEducation {
	public function getInstituteOfEducation(int $instituteId);
	
	public function getInstitutesOfEducation();

	public function createInstituteOfEducation($instituteId);
	
	public function updateInstituteOfEducation($institute);
	
	public function deleteInstituteOfEducation(int $instituteId);
}
<?php

namespace curriculum\control\services;

use curriculum\dto\ProfileDTO;
use curriculum\dto\AcademicQualificationsDTO;

interface  ServiceProfile {
	
	public function getProfile(int $id):ProfileDTO;
	
	public function getProfiles():array;
	
	public function updateProfile($dto);
	
	public function deleteProfile(int $id);
	
	public function createProfile($dto):ProfileDTO;
	
	public function getAcademicsQualifications($profileId):array;
	
	public function addAcademicQualifications($dto):AcademicQualificationsDTO;
	
	public function updateAcademicQualifications($dto);
	
	public function removeAcademicQualifications(int $id);
	
	public function getProfilesReport():array;
	
}
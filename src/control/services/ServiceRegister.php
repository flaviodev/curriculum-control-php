<?php

namespace curriculum\control\services;

interface  ServiceRegister {
	public function getProfile(int $profileId);
	
	public function getProfiles();

	public function createProfile($profile);
	
	public function updateProfile($profile);
	
	public function deleteProfile(int $profileId);
	
	public function getAcademicsQualifications($profileId);
	
	public function addAcademicQualifications($qualification);
	
	public function updateAcademicQualifications($qualification);
	
	public function removeAcademicQualifications(int $qualificationId);
	
	public function getInstituteOfEducation(int $instituteId);
	
	public function getInstitutesOfEducation();
	
	public function createInstituteOfEducation($instituteId);
	
	public function updateInstituteOfEducation($institute);
	
	public function deleteInstituteOfEducation(int $instituteId);
}
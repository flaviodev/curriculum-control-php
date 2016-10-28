<?php

namespace curriculum\control\services;

interface  ServiceProfile {
	public function getProfile(int $profileId);
	
	public function getProfiles();

	public function createProfile($profile);
	
	public function updateProfile($profile);
	
	public function deleteProfile(int $profileId);
	
	public function getAcademicsQualifications($profileId);
	
	public function addAcademicQualifications($qualification);
	
	public function updateAcademicQualifications($qualification);
	
	public function removeAcademicQualifications(int $qualificationId);
}
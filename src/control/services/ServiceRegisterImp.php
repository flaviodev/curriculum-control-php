<?php

namespace curriculum\control\services;

use curriculum\control\Config;
use curriculum\model\AcademicQualifications;
use curriculum\model\Profile;
use ttm\control\ServiceHelper;

class ServiceProfileImp implements ServiceProfile {
	private $helper;
	
	public function __construct() {
		$config = Config::getConfigDB();
		$this->helper = new ServiceHelper($config);
	}
	
	public function getProfile(int $profileId) {
		return $this->helper->getEntity(Profile::class, $profileId);
	}
	
	public function getProfiles():array {
		return $this->helper->getEntities(Profile::class);
	}

	public function createProfile($profile) {
		return $this->helper->createNewEntity(Profile::class, $profile);
	}
	
	public function updateProfile($profile) {
		$this->helper->updateEntity(Profile::class, $profile);
	}

	public function deleteProfile(int $profileId) {
		$this->helper->delete($profileId);
	}

	public function getAcademicsQualifications($profileId) {
		$profile = $this->helper->getEntity(Profile::class, $profileId);
		return  $profile->getAcademicsQualifications();
	}

	public function addAcademicQualifications($qualification) {
		return $this->helper->createNewEntity(AcademicQualifications::class, $qualification);
	}

	public function updateAcademicQualifications($qualification) {
		$this->helper->updateEntity(AcademicQualifications::class, $qualification);
	}
	
	public function removeAcademicQualifications(int $qualificationId) {
		$this->helper->delete($qualificationId);
	}
	
	
}
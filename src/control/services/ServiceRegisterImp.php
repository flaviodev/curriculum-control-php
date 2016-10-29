<?php

namespace curriculum\control\services;

use curriculum\control\Config;
use curriculum\model\AcademicQualifications;
use curriculum\model\InstituteOfEducation;
use curriculum\model\Profile;
use ttm\control\ServiceHelper;

class ServiceRegisterImp implements ServiceRegister {
	private $helper;
	
	public function __construct() {
		$config = Config::getConfigDB();
		$this->helper = new ServiceHelper($config);
	}
	
	public function getProfiles():array {
		return $this->helper->getEntities(Profile::class);
	}
	
	public function getProfile(int $profileId) {
		return $this->helper->getEntity(Profile::class, $profileId);
	}

	public function createProfile($profile) {
		return $this->helper->createNewEntity(Profile::class, $profile);
	}
	
	public function updateProfile($profile) {
		$this->helper->updateEntity(Profile::class, $profile);
	}

	public function deleteProfile(int $profileId) {
		$this->helper->deleteEntity(Profile::class,$profileId);
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
		$this->helper->deleteEntity(AcademicQualifications::class,$qualificationId);
	}
	
	public function getInstitutesOfEducation() {
		return $this->helper->getEntities(InstituteOfEducation::class);
	}
	
	public function getInstituteOfEducation(int $instituteId) {
		return $this->helper->getEntity(InstituteOfEducation::class, $instituteId);
	}
	
	public function createInstituteOfEducation($institute) {
		return $this->helper->createNewEntity(InstituteOfEducation::class, $institute);
	}
	
	public function updateInstituteOfEducation($institute) {
		$this->helper->updateEntity(InstituteOfEducation::class, $institute);
	}
	
	public function deleteInstituteOfEducation(int $instituteId) {
		$this->helper->deleteEntity(InstituteOfEducation::class, $instituteId);
	}
}
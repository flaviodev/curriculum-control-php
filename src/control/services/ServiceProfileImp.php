<?php

namespace curriculum\control\services;

use curriculum\dto\AcademicQualificationsAux;
use curriculum\dto\AcademicQualificationsDTO;
use curriculum\dto\ProfileAux;
use curriculum\dto\ProfileDTO;
use curriculum\utils\FactotyDTO;

class ServiceProfileImp implements ServiceProfile {
	private $profileAux;
	private $qualificationsAux;
	
	public function __construct() {
		$this->profileAux = new ProfileAux();
		$this->qualificationsAux = new AcademicQualificationsAux();
	}
	
	public function getProfile(int $id):ProfileDTO {
		return $this->profileAux->getDTO($id);
	}
	
	public function getProfiles():array {
		return $this->profileAux->getDTOs();
	}
	
	public function updateProfile($dto) {
		$this->profileAux->update($dto);
	}

	public function deleteProfile(int $id) {
		$this->profileAux->delete($id);
	}
	
	public function createProfile($dto):ProfileDTO {
		return $this->profileAux->create($dto);
	}

	public function addAcademicQualifications($dto):AcademicQualificationsDTO {
		return $this->qualificationsAux->create($dto);
	}

	public function updateAcademicQualifications($dto) {
		$this->qualificationsAux->update($dto);
	}
	
	public function removeAcademicQualifications(int $id) {
		$this->qualificationsAux->delete($id);
	}
	
	public function getAcademicsQualifications($profileId):array {
		$bo = $this->profileAux->getBO($profileId);
		return  $this->qualificationsAux->parseDTOs($bo->getAcademicsQualifications());
	}
	
	public function getProfilesReport():array {
		$bos = $this->profileAux->getBOs();
		return  FactotyDTO::getProfilesFullDTO($bos,$this->profileAux,$this->qualificationsAux);
	}
}
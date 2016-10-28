<?php

namespace curriculum\utils;

use curriculum\dto\report\AcademicQualificationsFullDTO;
use curriculum\dto\report\ProfileFullDTO;
use curriculum\model\AcademicQualifications;
use curriculum\model\Profile;
use curriculum\dto\AcademicQualificationsAux;
use curriculum\dto\ProfileAux;


class FactotyDTO {
	public static function getAcademicQualificationsFullDTO(AcademicQualifications $bo, AcademicQualificationsAux $qualificationsAux):AcademicQualificationsFullDTO {
		if(is_null($bo))
			return null;
	
		$dto = $qualificationsAux->parseDTO($bo);
		$aqf = new AcademicQualificationsFullDTO();
		$aqf->id = $dto->id;
		$aqf->nameOfCourse = $dto->nameOfCourse;
		$aqf->dateOfBegin = $dto->dateOfBegin;
		$aqf->dateOfFinish = $dto->dateOfFinish;
		$aqf->idProfile = $dto->idProfile;
		$aqf->idInstitute = $dto->idInstitute;
		$aqf->instituteOfEducation = $bo->getInstituteOfEducation()->getName();

		return $aqf;
	}
	
	public static function getAcademicsQualificationsFullDTO($bos, AcademicQualificationsAux $qualificationsAux):array {
		if(is_null($bos))
			return null;
	
			$dtos = array();
			foreach($bos as $bo) {
				array_push($dtos, FactotyDTO::getAcademicQualificationsFullDTO($bo, $qualificationsAux));
			}
	
			return $dtos;
	}
	
	
	public static function getProfileFullDTO(Profile $bo, ProfileAux $profileAux, AcademicQualificationsAux $qualificationsAux):ProfileFullDTO {
		if(is_null($bo))
			return null;
	
		$dto = $profileAux->parseDTO($bo);
		$pfd = new ProfileFullDTO();
		$pfd->id = $dto->id;
		$pfd->name = $dto->name;
		$pfd->dateOfBirth = $dto->dateOfBirth;
		$pfd->document = $dto->document;
		$pfd->academicsQualificationsFull = FactotyDTO::getAcademicsQualificationsFullDTO($bo->getAcademicsQualifications(), $qualificationsAux);

		return $pfd;
	}
	
	public static function getProfilesFullDTO($bos, ProfileAux $profileAux, AcademicQualificationsAux $qualificationsAux):array {
		if(is_null($bos))
			return null;
	
		$dtos = array();
		foreach($bos as $bo) {
			array_push($dtos, FactotyDTO::getProfileFullDTO($bo, $profileAux, $qualificationsAux));
		}

		return $dtos;
	}
	
}
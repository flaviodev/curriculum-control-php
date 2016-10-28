<?php

namespace curriculum\dto;

use curriculum\control\Config;
use curriculum\model\AcademicQualifications;
use ttm\dto\AbstractAux;
use ttm\dto\ObjectDTO;
use ttm\model\ObjectBO;
use ttm\util\UtilDate;

class AcademicQualificationsAux extends AbstractAux {

	private $profileAux;
	private $intituteAux;
	
	public function __construct() {
		parent::__construct(AcademicQualifications::class, Config::getConfigDB());
		$this->profileAux = new ProfileAux();
		$this->intituteAux = new InstituteOfEducationAux();
	}
	
	public function parseDTO(ObjectBO $bo):ObjectDTO{
		if (is_null ( $bo ))
			return null;
		
		$dto = new AcademicQualificationsDTO();
		$dto->id = $bo->getId();
		$dto->nameOfCourse = $bo->getNameOfCourse();
		$dto->dateOfBegin = UtilDate::dateToString($bo->getDateOfBegin());
		$dto->dateOfFinish = UtilDate::dateToString($bo->getDateOfFinish());
		$dto->idProfile = $bo->getProfile()->getId();
		$dto->idInstitute = $bo->getInstituteOfEducation()->getId();
		
		return $dto;
	}
	
	protected function parseNewBO($dto):ObjectBO{
		if (is_null($dto))
			return null;
		
		$bo = new AcademicQualifications();
		$bo->setNameOfCourse($dto->nameOfCourse);
		$bo->setDateOfBegin(UtilDate::stringToDate($dto->dateOfBegin));
		$bo->setDateOfFinish(UtilDate::stringToDate($dto->dateOfFinish));
		$bo->setProfile($this->profileAux->getBO($dto->idProfile));
		$bo->setInstituteOfEducation($this->intituteAux->getBO($dto->idInstitute));
		
		return $bo;
	}
	
	protected function updateBO($dto, ObjectBO &$bo) {
		if (is_null($dto))
			throw new \Exception("Object dto cant be null!");
		
		if (is_null($bo))
			throw new \Exception("Object bo cant be null!");
		
		$bo->setNameOfCourse($dto->nameOfCourse);
		$bo->setDateOfBegin(UtilDate::stringToDate($dto->dateOfBegin));
		$bo->setDateOfFinish(UtilDate::stringToDate($dto->dateOfFinish));
		$bo->setProfile($this->profileAux->getBO($dto->idProfile));
		$bo->setInstituteOfEducation($this->intituteAux->getBO($dto->idInstitute));
	}
}

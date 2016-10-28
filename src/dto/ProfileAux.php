<?php

namespace curriculum\dto;

use curriculum\model\Profile;
use ttm\util\UtilDate;
use ttm\dto\AbstractAux;
use ttm\dto\ObjectDTO;
use ttm\model\ObjectBO;
use curriculum\control\Config;

class ProfileAux extends AbstractAux {

	private $qualificationAux;
	
	public function __construct() {
		parent::__construct(Profile::class, Config::getConfigDB());
	}
	
	public function parseDTO(ObjectBO $bo):ObjectDTO{
		if (is_null ( $bo ))
			return null;
		
		$dto = new ProfileDTO();
		$dto->id = $bo->getId();
		$dto->name = $bo->getName();
		$dto->dateOfBirth = UtilDate::dateToString($bo->getDateOfBirth());
		$dto->document = $bo->getDocument();
		
		return $dto;
	}
	
	protected function parseNewBO($dto):ObjectBO{
		if (is_null($dto))
			return null;
		
		$bo = new Profile();
		$bo->setName($dto->name);
		$bo->setDateOfBirth(UtilDate::stringToDate($dto->dateOfBirth));
		$bo->setDocument($dto->document);
		
		return $bo;
	}
	
	protected function updateBO($dto, ObjectBO &$bo) {
		if (is_null($dto))
			throw new \Exception("Object dto cant be null!");
		
		if (is_null($bo))
			throw new \Exception("Object bo cant be null!");
		
		$bo->setName ($dto->name);
		$bo->setDateOfBirth (UtilDate::stringToDate($dto->dateOfBirth));
		$bo->setDocument ($dto->document);
	}
	
}
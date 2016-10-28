<?php

namespace curriculum\dto;

use curriculum\control\Config;
use curriculum\model\InstituteOfEducation;
use curriculum\model\Profile;
use ttm\dto\AbstractAux;
use ttm\dto\ObjectDTO;
use ttm\model\ObjectBO;

class InstituteOfEducationAux extends AbstractAux {
	
	public function __construct() {
		parent::__construct(InstituteOfEducation::class, Config::getConfigDB());
	}
	
	protected function parseDTO(ObjectBO $bo):ObjectDTO{
		if (is_null ( $bo ))
			return null;
		
		$dto = new InstituteOfEducationDTO();
		$dto->id = $bo->getId();
		$dto->name = $bo->getName();
		
		return $dto;
	}
	
	protected function parseNewBO($dto):ObjectBO{
		if (is_null($dto))
			return null;
		
		$bo = new Profile();
		$bo->setName($dto->name);
		
		return $bo;
	}
	
	protected function updateBO($dto, ObjectBO &$bo) {
		if (is_null($dto))
			throw new \Exception("Object dto cant be null!");
		
		if (is_null($bo))
			throw new \Exception("Object bo cant be null!");
		
		$bo->setName ($dto->name);
	}
}
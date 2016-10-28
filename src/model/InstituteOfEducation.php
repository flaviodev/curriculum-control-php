<?php

namespace curriculum\model;


use ttm\model\ObjectBOIntId;

/**
 *
 * @Entity
 * @Table(name="institute_of_education")
 */
class InstituteOfEducation extends ObjectBOIntId {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="institute_id")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string", name="name")
	 */
	protected $name;

	
	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id) {
		$this->id = $id;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	
	
}
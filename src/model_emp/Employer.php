<?php

namespace curriculum\model_emp;

use ttm\model\Model;

/**
 *
 * @Entity
 */
class Employer extends Model {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $name;

	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	
	
}
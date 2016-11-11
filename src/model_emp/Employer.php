<?php
namespace curriculum\model_emp;

use ttm\model\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
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
	 * @OneToMany(targetEntity="EmployerStrings", mappedBy="employer")
	 */
	protected $employersStrings;
	
	public function __construct() {
		$this->employersStrings = new ArrayCollection();
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getEmployersStrings() {
		return $this->employersStrings;
	}

	public function setEmployersStrings($employersStrings) {
		$this->employersStrings = $employersStrings;
	}
}
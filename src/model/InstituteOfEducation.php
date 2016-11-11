<?php
namespace curriculum\model;

use ttm\model\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class InstituteOfEducation extends Model {

	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer")
	 */
	protected  $id;
	
	/**
	 * @OneToMany(targetEntity="InstituteOfEducationStrings", mappedBy="instituteOfEducation")
	 */
	protected $institutesOfEducationStrings;
	
	public function __construct() {
		$this->institutesOfEducationStrings = new ArrayCollection();
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getInstitutesOfEducationStrings() {
		return $this->institutesOfEducationStrings;
	}
	
	public function setInstitutesOfEducationStrings($institutesOfEducationStrings) {
		$this->institutesOfEducationStrings = $institutesOfEducationStrings;
	}
}
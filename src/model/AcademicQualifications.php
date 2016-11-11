<?php
namespace curriculum\model;

use ttm\model\Model;

/**
 * @Entity
 */
class AcademicQualifications extends Model {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $nameOfCourse;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date")
	 */
	protected $dateOfBegin;

	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date")
	 */
	protected $dateOfFinish;
	
	/**
	 * @ManyToOne(targetEntity="Profile", inversedBy="academicsQualifications")
	 * @JoinColumn(name="idProfile", referencedColumnName="id")
	 */
	protected $profile;

	/**
	 * @ManyToOne(targetEntity="InstituteOfEducation")
	 * @JoinColumn(name="idInstituteOfEducation", referencedColumnName="id")
	 */
	protected $instituteOfEducation;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
		
	public function getNameOfCourse():string {
		return $this->nameOfCourse;
	}
	
	public function setNameOfCourse(string $nameOfCourse) {
		$this->nameOfCourse = $nameOfCourse;
	}
	
	public function getDateOfBegin():\DateTime {
		return $this->dateOfBegin;
	}
	
	public function setDateOfBegin(\DateTime $dateOfBegin) {
		$this->dateOfBegin = $dateOfBegin;
	}
	
	public function getDateOfFinish():\DateTime {
		return $this->dateOfFinish;
	}
	
	public function setDateOfFinish(\DateTime $dateOfFinish) {
		$this->dateOfFinish = $dateOfFinish;
	}
	
	public function getProfile():Profile {
		return $this->profile;
	}

	public function setProfile(Profile $profile) {
		$this->profile = $profile;
	}
	public function getInstituteOfEducation():InstituteOfEducation {
		return $this->instituteOfEducation;
	}
	
	public function setInstituteOfEducation(InstituteOfEducation $instituteOfEducation) {
		$this->instituteOfEducation = $instituteOfEducation;
	}
}
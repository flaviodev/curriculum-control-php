<?php

namespace curriculum\model;


use ttm\model\Model;

/**
 *
 * @Entity
 * @Table(name="academic_qualifications")
 */
class AcademicQualifications extends Model {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="acad_qual_id")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string", name="name_of_course")
	 */
	protected $nameOfCourse;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date", name="date_of_begin")
	 */
	protected $dateOfBegin;
	

	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date", name="date_of_finish")
	 */
	protected $dateOfFinish;
	
	
	/**
	 * @ManyToOne(targetEntity="Profile", inversedBy="academicsQualifications")
	 * @JoinColumn(name="profile_id", referencedColumnName="profile_id")
	 */
	protected $profile;
	

	/**
	 * @ManyToOne(targetEntity="InstituteOfEducation")
	 * @JoinColumn(name="institute_id", referencedColumnName="institute_id")
	 */
	protected $instituteOfEducation;
	
	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id) {
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
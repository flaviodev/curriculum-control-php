<?php
namespace curriculum\model;

use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class AcademicQualificationsStrings extends ModelLocaleStrings {

	/**
	 * @Id @ManyToOne(targetEntity="AcademicQualifications", inversedBy="localeStrings")
	 */
	protected  $academicQualifications;
	
	/**
	 * @ttm-DtoAttribute
	 * @ttm-DtoCompositeFirstToParent
	 * @Id @Column(type="string")
	 */
	protected  $locale;
	
	/**
	 * @ttm-DtoAttribute
	 * @ttm-DtoCompositeFirstToParent
	 * @Column(type="string")
	 */
	protected $nameOfCourse;
	
	public function __construct($academicQualifications, $locale) {
		$this->academicQualifications = $academicQualifications;
		$this->locale = $locale;
	}
	
	public function getId() {
		return array("academicQualifications" => $this->academicQualifications, "locale" => $this->getLocale());
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->academicQualifications = $compositeId["academicQualifications"];
			$this->locale = $compositeId["locale"];
		}
	}
	
	public function getAcademicQualifications():AcademicQualifications {
		return $this->academicQualifications;
	}
	
	public function setAcademicQualifications(AcademicQualifications $academicQualifications) {
		$this->academicQualifications = $academicQualifications;
	}
	
	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getNameOfCourse():string {
		return $this->nameOfCourse;
	}
	
	public function setNameOfCourse(string $nameOfCourse) {
		$this->nameOfCourse = $nameOfCourse;
	}
}
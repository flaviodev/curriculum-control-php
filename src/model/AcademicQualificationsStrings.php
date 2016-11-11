<?php
namespace curriculum\model;

use ttm\model\ModelLocale;

/**
 * @Entity
 */
class AcademicQualificationsStrings extends ModelLocale {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 */
	protected  $idAcademicQualifications;
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="string")
	 */
	protected  $locale;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $nameOfCourse;
	
	/**
	 * @ManyToOne(targetEntity="AcademicQualifications", inversedBy="academicsQualificationsStrings")
	 * @JoinColumn(name="idAcademicQualifications", referencedColumnName="id")
	 */
	protected  $academicQualifications;
	
	public function __construct($idAcademicQualifications, $locale) {
		$this->idAcademicQualifications = $idAcademicQualifications;
		$this->locale = $locale;
	}
	
	public function getId() {
		return ["id"=> $this->idAcademicQualifications, "locale" => $this->locale];
	}
	
	public function setId($idAcademicQualifications, $locale) {
		$this->idAcademicQualifications = $idAcademicQualifications;
		$this->locale = $locale;
	}
	
	public function getNameOfCourse():string {
		return $this->nameOfCourse;
	}
	
	public function setNameOfCourse(string $nameOfCourse) {
		$this->nameOfCourse = $nameOfCourse;
	}
	
	public function getIdAcademicQualifications():int {
		return $this->idAcademicQualifications;
	}
	
	public function setIdAcademicQualifications(int $idAcademicQualifications) {
		$this->idAcademicQualifications = $idAcademicQualifications;
	}
	
	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getAcademicQualifications():AcademicQualifications {
		return $this->academicQualifications;
	}
	
	public function setAcademicQualifications(AcademicQualifications $academicQualifications) {
		$this->academicQualifications = $academicQualifications;
		return $this;
	}
}
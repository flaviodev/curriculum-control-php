<?php
namespace curriculum\model;



use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class AcademicQualificationsStrings extends ModelLocaleStrings {
	
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
	 * @ttm-DtoCompositeFirstToParent
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
		$compositeId = new \stdClass();
		$compositeId->idAcademicQualifications = $this->idAcademicQualifications;
		$compositeId->locale = $this->getLocale();
	
		return $compositeId;
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->idAcademicQualifications = $compositeId->idAcademicQualifications;
			$this->locale = $compositeId->locale;
		}
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
	
	public function getNameOfCourse():string {
		return $this->nameOfCourse;
	}
	
	public function setNameOfCourse(string $nameOfCourse) {
		$this->nameOfCourse = $nameOfCourse;
	}

	public function getAcademicQualifications():AcademicQualifications {
		return $this->academicQualifications;
	}
	
	public function setAcademicQualifications(AcademicQualifications $academicQualifications) {
		$this->academicQualifications = $academicQualifications;
		return $this;
	}
}
<?php
namespace curriculum\model;

use ttm\model\ModelLocale;

/**
 * @Entity
 */
class InstituteOfEducationStrings extends ModelLocale {

	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 */
	protected  $idInstituteOfEducation;

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
	protected $name;
	
	/**
	 * @ManyToOne(targetEntity="InstituteOfEducation", inversedBy="institutesOfEducationStrings")
	 * @JoinColumn(name="idInstituteOfEducation", referencedColumnName="id")
	 */
	protected  $instituteOfEducation;

	public function __construct($idInstituteOfEducation, $locale) {
		$this->idInstituteOfEducation = $idInstituteOfEducation;
		$this->locale = $locale;
	}
	
	public function getId() {
		return ["id"=> $this->idInstituteOfEducation, "locale" => $this->locale];
	}
	
	public function setId($idInstituteOfEducation, $locale) {
		$this->idInstituteOfEducation = $idInstituteOfEducation;
		$this->locale = $locale;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getIdInstituteOfEducation():int {
		return $this->idInstituteOfEducation;
	}
	
	public function setIdInstituteOfEducation(int $idInstituteOfEducation) {
		$this->idInstituteOfEducation = $idInstituteOfEducation;
	}
	
	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getInstituteOfEducation():InstituteOfEducation {
		return $this->instituteOfEducation;
	}
	
	public function setInstituteOfEducation(InstituteOfEducation $instituteOfEducation) {
		$this->instituteOfEducation = $instituteOfEducation;
	}
}
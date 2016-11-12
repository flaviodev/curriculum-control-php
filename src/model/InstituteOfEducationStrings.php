<?php
namespace curriculum\model;



use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class InstituteOfEducationStrings extends ModelLocaleStrings {

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
	 * @ttm-DtoCompositeFirstToParent
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
		$compositeId = new \stdClass();
		$compositeId->idInstituteOfEducation = $this->idInstituteOfEducation;
		$compositeId->locale = $this->getLocale();
	
		return $compositeId;
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->idInstituteOfEducation = $compositeId->idInstituteOfEducation;
			$this->locale = $compositeId->locale;
		}
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
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getInstituteOfEducation():InstituteOfEducation {
		return $this->instituteOfEducation;
	}
	
	public function setInstituteOfEducation(InstituteOfEducation $instituteOfEducation) {
		$this->instituteOfEducation = $instituteOfEducation;
	}
}
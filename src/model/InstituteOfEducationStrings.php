<?php
namespace curriculum\model;



use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class InstituteOfEducationStrings extends ModelLocaleStrings {

	/**
	 * @Id @ManyToOne(targetEntity="InstituteOfEducation", inversedBy="localeStrings")
	 */
	protected  $instituteOfEducation;
	
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
	protected $name;

	public function __construct($instituteOfEducation, $locale) {
		$this->instituteOfEducation = $instituteOfEducation;
		$this->locale = $locale;
	}
	
	public function getId() {
		return array("instituteOfEducation" => $this->instituteOfEducation, "locale" => $this->getLocale());
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->instituteOfEducation = $compositeId["instituteOfEducation"];
			$this->locale = $compositeId["locale"];
		}
	}
	
	public function getInstituteOfEducation():InstituteOfEducation {
		return $this->instituteOfEducation;
	}
	
	public function setInstituteOfEducation(InstituteOfEducation $instituteOfEducation) {
		$this->instituteOfEducation = $instituteOfEducation;
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

}
<?php
namespace curriculum\model_emp;

use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class EmployerStrings extends ModelLocaleStrings {
	
	/**
	 * @Id @ManyToOne(targetEntity="Employer", inversedBy="localeStrings")
	 */
	protected  $employer;
	
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
	
	public function __construct($employer, $locale) {
		$this->employer = $employer;
		$this->locale = $locale;
	}
	
	public function getId() {
		return array("employer" => $this->employer, "locale" => $this->getLocale());
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->employer = $compositeId["employer"];
			$this->locale = $compositeId["locale"];
		}
	}

	public function getEmployer():Employer {
		return $this->employer;
	}
	
	public function setEmployer(Employer $employer) {
		$this->employer = $employer;
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
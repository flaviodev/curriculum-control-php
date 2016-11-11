<?php
namespace curriculum\model_emp;

use ttm\model\ModelLocale;

/**
 * @Entity
 */
class EmployerStrings extends ModelLocale {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 */
	protected  $idEmployer;
	
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
	 * @ManyToOne(targetEntity="Employer", inversedBy="employersStrings")
	 * @JoinColumn(name="idEmployer", referencedColumnName="id")
	 */
	protected  $employer;
	
	public function __construct($idEmployer, $locale) {
		$this->idEmployer = $idEmployer;
		$this->locale = $locale;
	}
	
	public function getId() {
		return ["id"=> $this->ididEmployer, "locale" => $this->locale];
	}
	
	public function setId($idEmployer, $locale) {
		$this->idEmployer = $idEmployer;
		$this->locale = $locale;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getIdEmployer():int {
		return $this->idEmployer;
	}
	
	public function setIdEmployer(int $idEmployer) {
		$this->idEmployer = $idEmployer;
	}
	
	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getEmployer():Employer {
		return $this->employer;
	}
	
	public function setEmployer(Employer $employer) {
		$this->employer = $employer;
	}
}
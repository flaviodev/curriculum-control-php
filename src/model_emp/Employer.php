<?php
namespace curriculum\model_emp;

use Doctrine\Common\Collections\ArrayCollection;
use ttm\model\ModelLocale;

/**
 * @Entity
 */
class Employer extends ModelLocale {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @OneToMany(targetEntity="EmployerStrings", mappedBy="employer")
	 * @JoinColumn(name="employer_id", referencedColumnName="id", onDelete="CASCADE")
	 */
	protected $localeStrings;
	
	public function __construct() {
		$this->localeStrings = new ArrayCollection();
	}
	
	public function getLocaleStrings() {
		return $this->localeStrings;
	}
	
	public function setLocaleStrings($localeStrings) {
		$this->localeStrings = $localeStrings;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
}
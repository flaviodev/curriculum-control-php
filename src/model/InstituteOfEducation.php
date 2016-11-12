<?php
namespace curriculum\model;

use Doctrine\Common\Collections\ArrayCollection;
use ttm\model\Model;
use ttm\model\ModelLocale;

/**
 * @Entity
 */
class InstituteOfEducation extends ModelLocale {

	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @OneToMany(targetEntity="InstituteOfEducationStrings", mappedBy="instituteOfEducation")
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
<?php
namespace curriculum\model;

use Doctrine\Common\Collections\ArrayCollection;
use ttm\model\Model;
use ttm\model\ModelLocale;

/**
 * @Entity
 */
class Profile extends ModelLocale {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date")
	 */
	protected $dateOfBirth;
	
	/**
	 * @OneToMany(targetEntity="AcademicQualifications", mappedBy="profile")
	 */
	protected $academicsQualifications;

	/**
	 * @ttm-DtoAttribute
	 * @OneToMany(targetEntity="ProfileStrings", mappedBy="profile")
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
	
	public function getDateOfBirth():\DateTime {
		return $this->dateOfBirth;
	}
	
	public function setDateOfBirth(\DateTime $dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}
	
	public function getAcademicsQualifications() {
		return $this->academicsQualifications;
	}
	
	public function setAcademicsQualifications($academicsQualifications) {
		$this->academicsQualifications = $academicsQualifications;
	}
}
<?php
namespace curriculum\model;

use ttm\model\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Profile extends Model {
	
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
	 * @OneToMany(targetEntity="ProfileStrings", mappedBy="profile")
	 */
	protected $profilesStrings;
	
	/**
	 * @OneToMany(targetEntity="AcademicQualifications", mappedBy="profile")
	 */
	protected $academicsQualifications;

	public function __construct() {
		$this->profilesStrings = new ArrayCollection();
		$this->academicsQualifications = new ArrayCollection();
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
	
	public function getProfilesStrings() {
		return $this->profilesStrings;
	}
	
	public function setProfilesStrings($profilesStrings) {
		$this->profilesStrings = $profilesStrings;
	}
	
	public function getAcademicsQualifications() {
		return $this->academicsQualifications;
	}
	
	public function setAcademicsQualifications($academicsQualifications) {
		$this->academicsQualifications = $academicsQualifications;
	}
}
<?php

namespace curriculum\model;


use ttm\model\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @Entity
 * @Table(name="profile")
 */
class Profile extends Model {
	
	public function __construct() {
		$this->academicsQualifications = new ArrayCollection();
	}
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="profile_id")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string", name="name")
	 */
	protected $name;
	
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date", name="date_of_birth")
	 */
	protected $dateOfBirth;
	
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string", name="document")
	 */
	protected $document;
	
	/**
	 * @OneToMany(targetEntity="AcademicQualifications", mappedBy="profile")
	 */
	protected $academicsQualifications;
	
	
	public function getId():int {
		return $this->id;
	}
	
	public function setId(int $id) {
		$this->id = $id;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getDateOfBirth():\DateTime {
		return $this->dateOfBirth;
	}
	
	public function setDateOfBirth(\DateTime $dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}
	
	public function getDocument():string {
		return $this->document;
	}
	
	public function setDocument(string $document) {
		$this->document = $document;
	}
	
	public function getAcademicsQualifications() {
		return $this->academicsQualifications;
	}
	
	public function setAcademicsQualifications($academicsQualifications) {
		$this->academicsQualifications = $academicsQualifications;
	}
	
	
	
	
}
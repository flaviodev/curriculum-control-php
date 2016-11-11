<?php
namespace curriculum\model;

use ttm\model\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Profile extends Model {
	
	public function __construct() {
		$this->academicsQualifications = new ArrayCollection();
	}
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer")
	 */
	protected  $id;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $name;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="date")
	 */
	protected $dateOfBirth;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $document;
	
	/**
	 * @OneToMany(targetEntity="AcademicQualifications", mappedBy="Profile")
	 */
	protected $academicsQualifications;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
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
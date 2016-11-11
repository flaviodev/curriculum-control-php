<?php
namespace curriculum\model;

use ttm\model\ModelLocale;

/**
 * @Entity
 */
class ProfileStrings extends ModelLocale {
	
	/**
	 * @ttm-DtoAttribute
	 * @Id
	 * @Column(type="integer")
	 */
	protected  $idProfile;
	
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
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $document;
	
	/**
	 * @ManyToOne(targetEntity="Profile", inversedBy="profilesStrings")
	 * @JoinColumn(name="idProfile", referencedColumnName="id")
	 */
	protected  $profile;
	
	public function __construct($idProfile, $locale) {
		$this->idProfile = $idProfile;
		$this->locale = $locale;
	}
	
	public function getId() {
		return ["id"=> $this->idProfile, "locale" => $this->locale];
	}
	
	public function setId($idProfile, $locale) {
		$this->idProfile = $idProfile;
		$this->locale = $locale;
	}
	
	public function getName():string {
		return $this->name;
	}
	
	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getDocument():string {
		return $this->document;
	}
	
	public function setDocument(string $document) {
		$this->document = $document;
	}
	
	public function getIdProfile():int {
		return $this->idProfile;
	}
	
	public function setIdProfile(int $idProfile) {
		$this->idProfile = $idProfile;
	}
	
	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getProfile():Profile {
		return $this->profile;
	}
	
	public function setProfile(Profile $profile) {
		$this->profile = $profile;
	}
}
<?php
namespace curriculum\model;

use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class ProfileStrings extends ModelLocaleStrings {
	
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
	 * @ttm-DtoCompositeFirstToParent
	 * @Column(type="string")
	 */
	protected $name;

	/**
	 * @ttm-DtoAttribute
	 * @ttm-DtoCompositeFirstToParent
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
		$compositeId = new \stdClass();
		$compositeId->idProfile = $this->getIdProfile();
		$compositeId->locale = $this->getLocale();
		
		return $compositeId;
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->idProfile = $compositeId->idProfile;
			$this->locale = $compositeId->locale;
		}
	}

	public function getIdProfile() {
		return $this->idProfile;
	}
	public function setIdProfile($idProfile) {
		$this->idProfile = $idProfile;
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
	
	public function getDocument():string {
		return $this->document;
	}
	
	public function setDocument(string $document) {
		$this->document = $document;
	}
	
	public function getProfile():Profile {
		return $this->profile;
	}
	
	public function setProfile(Profile $profile) {
		$this->profile = $profile;
	}
}
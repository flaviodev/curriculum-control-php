<?php
namespace curriculum\model;

use ttm\model\ModelLocaleStrings;

/**
 * @Entity
 */
class ProfileStrings extends ModelLocaleStrings {

	/**
	 * @Id @ManyToOne(targetEntity="Profile", inversedBy="localeStrings")
	 */
	protected  $profile;
	
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

	/**
	 * @ttm-DtoAttribute
	 * @ttm-DtoCompositeFirstToParent
	 * @Column(type="string")
	 */
	protected $document;
	
	public function __construct($profile, $locale) {
		$this->profile = $profile;
		$this->locale = $locale;
	}
	
	public function getId() {
		return array("profile" => $this->profile, "locale" => $this->getLocale());
	}
	
	public function setId($compositeId) {
		if(!is_null($compositeId)) {
			$this->profile = $compositeId["profile"];
			$this->locale = $compositeId["locale"];
		}
	}

	public function getProfile():Profile {
		return $this->profile;
	}
	
	public function setProfile(Profile $profile) {
		$this->profile = $profile;
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
}
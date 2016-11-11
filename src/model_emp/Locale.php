<?php
namespace curriculum\model_emp;

use ttm\model\Model;

/**
 * @Entity
 */
class Locale extends Model {
	
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
	protected $description;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $language;
	
	/**
	 * @ttm-DtoAttribute
	 * @Column(type="string")
	 */
	protected $country;
	
	public function getId() {
		return $this->locale;
	}
	
	public function setId($locale) {
		$this->locale = $locale;
	}

	public function getLocale():string {
		return $this->locale;
	}
	
	public function setLocale(string $locale) {
		$this->locale = $locale;
	}
	
	public function getDescription():string {
		return $this->description;
	}
	
	public function setDescription(string $description) {
		$this->description = $description;
	}
	
	public function getLanguage():string {
		return $this->language;
	}
	
	public function setLanguage(string $language) {
		$this->language = $language;
	}
	
	public function getCountry():string {
		return $this->country;
	}
	
	public function setCountry(string $country) {
		$this->country = $country;
	}
}
<?php

namespace bstmpl\model\layout;

use n2n\web\dispatch\Dispatchable;
use n2n\context\RequestScoped;

class bsExampleForm implements Dispatchable, RequestScoped  {
	
	protected $firstname;
	protected $lastname;
	protected $checkMeOut;
	protected $zip;
	protected $city;
	protected $country;
	
	public function getCheckMeOut() {
		return $this->checkMeOut;
	}

	public function setCheckMeOut($checkMeOut) {
		$this->checkMeOut = $checkMeOut;
	}

	public function getFirstname() {
		return $this->firstname;
	}

	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	public function getLastname() {
		return $this->lastname;
	}

	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	public function getZip() {
		return $this->zip;
	}

	public function setZip($zip) {
		$this->zip = $zip;
	}

	public function getCity() {
		return $this->city;
	}

	public function setCity($city) {
		$this->city = $city;
	}

	public function getCountry() {
		return $this->country;
	}

	public function setCountry($country) {
		$this->country = $country;
	}
}


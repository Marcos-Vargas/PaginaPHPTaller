<?php

class Affiliates {

	private $firstNames;
	private $lastNames;
	private $birthday;
	private $typeDoc;
	private $numDoc;
	private $city;
	private $department;
	private $cell;


	public function __construct($firstNames,$lastNames,$birthday,$typeDoc,$numDoc,$city,$department,$cell)
	{
		$this->firstNames = $firstNames;
		$this->lastNames = $lastNames;
		$this->birthday = $birthday;
		$this->typeDoc = $typeDoc;
		$this->numDoc = $numDoc;
		$this->city = $city;
		$this->department = $department;
		$this->cell = $cell;
	}

	

	/**
	 * Get the value of firstNames
	 */ 
	public function getFirstNames()
	{
		return $this->firstNames;
	}

	/**
	 * Set the value of firstNames
	 *
	 * @return  self
	 */ 
	public function setFirstNames($firstNames)
	{
		$this->firstNames = $firstNames;

		return $this;
	}

	/**
	 * Get the value of lastNames
	 */ 
	public function getLastNames()
	{
		return $this->lastNames;
	}

	/**
	 * Set the value of lastNames
	 *
	 * @return  self
	 */ 
	public function setLastNames($lastNames)
	{
		$this->lastNames = $lastNames;

		return $this;
	}

	/**
	 * Get the value of birthday
	 */ 
	public function getBirthday()
	{
		return $this->birthday;
	}

	/**
	 * Set the value of birthday
	 *
	 * @return  self
	 */ 
	public function setBirthday($birthday)
	{
		$this->birthday = $birthday;

		return $this;
	}

	/**
	 * Get the value of typeDoc
	 */ 
	public function getTypeDoc()
	{
		return $this->typeDoc;
	}

	/**
	 * Set the value of typeDoc
	 *
	 * @return  self
	 */ 
	public function setTypeDoc($typeDoc)
	{
		$this->typeDoc = $typeDoc;

		return $this;
	}

	/**
	 * Get the value of numDoc
	 */ 
	public function getNumDoc()
	{
		return $this->numDoc;
	}

	/**
	 * Set the value of numDoc
	 *
	 * @return  self
	 */ 
	public function setNumDoc($numDoc)
	{
		$this->numDoc = $numDoc;

		return $this;
	}

	/**
	 * Get the value of city
	 */ 
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Set the value of city
	 *
	 * @return  self
	 */ 
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Get the value of department
	 */ 
	public function getDepartment()
	{
		return $this->department;
	}

	/**
	 * Set the value of department
	 *
	 * @return  self
	 */ 
	public function setDepartment($department)
	{
		$this->department = $department;

		return $this;
	}

	/**
	 * Get the value of cell
	 */ 
	public function getCell()
	{
		return $this->cell;
	}

	/**
	 * Set the value of cell
	 *
	 * @return  self
	 */ 
	public function setCell($cell)
	{
		$this->cell = $cell;

		return $this;
	}
}




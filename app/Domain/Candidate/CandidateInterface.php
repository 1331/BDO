<?php

namespace App\Domain\Candidate;

interface CandidateInterface {

    /**
     * Gets the id of the candidate
	 * @return int
     */
    public function getId();

    /**
     * Gets the CBO of the candidate
	 * @return int
     */
    public function getCbo();

    /**
     * Gets if candidate is deficiency
	 * @return int
     */
    public function getDeficiency();

    /**
     * Gets the user change
	 * @return int
     */
    public function getUserChange();

    /**
     * Gets the user inclusion
	 * @return int
     */
    public function getUserInclusion();

    /**
     * Gets the neighborhood of candidate
	 * @return int
     */
    public function getNeighborhood();

    /**
     * Gets the name of candidate
	 * @return string
     */
    public function getName();

    /**
     * Gets the email of candidate
	 * @return string
     */
    public function getEmail();

    /**
     * Gets the phone fixed of candidate
	 * @return string
     */
    public function getPhoneFixed();

    /**
     * Gets the phone mobile of candidate
	 * @return string
     */
    public function getPhoneMobile();

    /**
     * Gets the marital status of candidate
	 * @return int
     */
    public function getMaritalStatus();

    /**
     * Gets the date Birth of candidate 
	 * @return Carbon\Carbon
     */
    public function getDateBirth();

    /**
     * Gets the genre of candidate
	 * @return int
     */
    public function getGenre();

    /**
     * Gets the nationality of candidate
	 * @return string
     */
    public function getNationality();

    /**
     * Gets the profession of candidate
	 * @return string
     */
    public function getProfession();

    /**
     * Gets the CEP of candidate
	 * @return string
     */
    public function getCep();

    /**
    * Gets the public place of candidate
	 * @return string
     */
    public function getPublicPlace();

    /**
     * Gets the number of the house of candidate
	 * @return string
     */
    public function getHouseNumber();

    /**
     * Gets the complement of candidate
	 * @return string
     */
    public function getComplement();

    /**
     * Gets the district of candidate
	 * @return string
     */
    public function getDistrict();

    /**
     * Gets the city of candidate
	 * @return int
     */
    public function getCity();

    /**
     * Gets the date register of candidate
	 * @return Carbon\Carbon
     */
    public function getDateRegister();

    /**
     * Gets the date expired of candidate
	 * @return Carbon\Carbon
     */
    public function getDateExpired();

    /**
     * Gets the date change
	 * @return Carbon\Carbon
     */
    public function getDateChange();

    /**
     * Gets the objective of candidate
	 * @return string
     */
    public function getObjective();

    /**
     * Gets the CPF of candidate
	 * @return string
     */
    public function getCpf();

    /**
     * Gets the RG of candidate
	 * @return string
     */
    public function getRg();

    /**
     * Gets the CTPS of candidate
	 * @return string
     */
    public function getCtps();

    /**
     * Gets the number PIS of candidate
	 * @return string
     */
    public function getNumberPis();

    /**
     * Gets the number serie of candidate
	 * @return string
     */
    public function getNumberSerie();

    /**
     * Gets the state CTPS
	 * @return int
     */
    public function getStateCtps();

    /**
     * Gets the login portal
	 * @return string
     */
    public function getLoginPortal();

    /**
     * Gets the password portal
	 * @return string
     */
    public function getPasswordPortal();

    /**
     * Gets the Internal
	 * @return int
     */
    public function isInternal();

    /**
     * Gets the CNH 
	 * @return string
     */
    public function getCnh();

    /**
     * Gets the quantity Reminder
	 * @return int
     */
    public function getQuantityReminder();

    /**
    * Gets the family bag
	 * @return int
     */
    public function isFamilyBag();

    /**
     * Gets the number NIS
	 * @return string
     */
    public function getNumberNis();

    /**
     * Gets if candidate is active
	 * @return int
     */
    public function isActive();

    /**
     * Gets the tab Experience
	 * @return int
     */
    public function hasTabPreviousExperience();

    /**
     * Gets the tab qualification
	 * @return int
     */
    public function hasTabQualification();

    /**
     * Gets the tab information
	 * @return int
     */
    public function hasTabAcademicEducation();
  
}
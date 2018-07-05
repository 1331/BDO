<?php

namespace App\Domain\Vacancy;

interface VacancyInterface{
    
    /**
     * Gets the id of the vacancy
	 * @return int
     */
    public function getId();

    /**
     * Gets the company of the vacancy
	 * @return int
     */
    public function getCompany();

    /**
     * Gets the profession requered in vacancy
	 * @return int
     */
    public function getProfession();

    /**
     * Gets the description of the vacancy
	 * @return string
     */
    public function getDescription();

    /**
     * Gets the salary of the vacancy
	 * @return double
     */
    public function getSalary();

    /**
     * Gets the additional of the vacancy
	 * @return int
     */
    public function getAdditional();

    /**
     * Gets the benefits about the vacancy
	 * @return int
     */
    public function getBenefit();

    /**
     * Gets the id of visit
	 * @return string
     */
    public function getNote();

    /**
     * Gets the number of vacancy pf the Opportunities
	 * @return int
     */
    public function getNumberJobsOpportunities();

    /**
     * Gets the status of the vacancy
	 * @return int
     */
    public function getStatus();

    /**
     * Gets the email
	 * @return int
     */
    public function getShowEmail();

    /**
     * Gets the nome
	 * @return int
     */
    public function getShowName();

    /**
     * Gets the phone
	 * @return int
     */
    public function getShowPhone();

    /**
     * Gets the genre required in vacancy
	 * @return int
     */
    public function getGenre();

    /**
     * Gets the date of register
	 * @return Carbom\Carbon
     */
    public function getDateRegister();

    /**
     * Gets the response if a vacancy allows people with deficiency
	 * @return int
     */
    public function getDisabledPeople();

    /**
     * Gets the id of the marital status, in case you have
	 * @return int
     */
    public function getMaritalStatus();

    /**
     * Gets the age minimium for the vacancy
	 * @return int
     */
    public function getAge();

    /**
     * Gets the need Experience
	 * @return int
     */
    public function getNeedExperience();

    /**
     * Gets the CNH
	 * @return string
     */
    public function getDriverLicense();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

<?php

namespace BDO\Domain\VacancyCandidate;

interface VacancyCandidateInterface{

    /**
     * Gets the id of the vacancy
	 * @return int
     */
    public function getId();

    /**
     * Gets the company of the vacancy
	 * @return int
     */
    public function getVacancy();

    /**
     * Gets the profession requered in vacancy
	 * @return int
     */
    public function getCandidate();

    /**
     * Gets the status of the candidate in vacancy
	 * @return string
     */
    public function isStatus();

    /**
     * Gets the date of change status
	 * @return Carbon\Carbon
     */
    public function getDateStatus();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

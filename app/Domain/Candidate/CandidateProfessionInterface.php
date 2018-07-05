<?php

namespace App\Domain\Candidate;

interface CandidateProfessionInterface {

    /**
     * Gets the Id
	 * @return int
     */
    public function getId();

    /**
     * Gets the Candidate
	 * @return \App\Infrastructure\Eloquent\Candidate\Candidate
     */
    public function getCandidate();

    /**
     * Gets the \App\Infrastructure\Eloquent\Profession\Profession
	 * @return int
     */
    public function getProfession();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}
<?php
namespace BDO\Domain\Candidate;

interface CandidatePreviousExperienceInterface {

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
     * Gets the UserChange
	 * @return App\Infrastructure\Eloquent\User\User
     */
    public function getUserChange();

    /**
     * Gets the UserInclusion
	 * @return App\Infrastructure\Eloquent\User\User
     */
    public function getUserInclusion();

    /**
     * Gets the Date Statrt
	 * @return \Carbon\Carbon
     */
    public function getDateStart();

    /**
     * Gets the DateEnd
	 * @return \Carbon\Carbon
     */
    public function getDateEnd();

    /**
     * Gets the name company
	 * @return string
     */
    public function getNameCompany();

    /**
     * Gets the description activies
	 * @return string
     */
    public function getDescriptionActivities();

    /**
     * Gets the DateInclusion
	 * @return \Carbon\Carbon
     */
    public function getDateInclusion();

    /**
     * Gets the DateChange
	 * @return \Carbon\Carbon
     */
    public function getDateChange();

    /**
     * Gets the has previous experience
	 * @return string
     */
    public function hasPreviousExperience();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();
}

<?php
namespace BDO\Domain\Candidate;

interface CandidateQualificationInterface {

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
     * Gets the DescriptionQualification
	 * @return string
     */
    public function getDescriptionQualification();

    /**
     * Gets the DateEnd
	 * @return \Carbon\Carbon
     */
    public function getDateEnd();

    /**
     * Gets the AmountHour
	 * @return int
     */
    public function getAmountHour();

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
     * Gets the Has qualification
	 * @return string
     */
    public function hasQualification();

    /**
     * Gets the Name Institution
	 * @return string
     */
    public function getNameInstitution();

    /**
     * Gets the is pronatec
	 * @return string
     */
    public function isPronatec();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();
}

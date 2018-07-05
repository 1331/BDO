<?php 
namespace App\Domain\Candidate;

interface CandidateAcademicEducationInterface {

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
     * Gets the AcademicEducation
	 * @return App\Infrastructure\Eloquent\AcademicEducation\AcademicEducation
     */
    public function getAcademicEducation();

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
     * Gets the DateEnd
	 * @return \Carbon\Carbon
     */
    public function getDateEnd();

    /**
     * Gets the NameSchool
	 * @return string
     */
    public function getNameSchool();

    /**
     * Gets the NameCitySchool
	 * @return string
     */
    public function getNameCitySchool();
    
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
     * Gets the Course
	 * @return string
     */
    public function getCourse();
    
    /**
     * Gets the AcademicSemester
	 * @return int
     */
    public function getAcademicSemester();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();  
}

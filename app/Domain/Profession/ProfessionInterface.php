<?php 

namespace App\Domain\Profession;

interface ProfessionInterface {
    
    /**
     * Gets the id of the profession
	 * @return int
     */
    public function getId();

    /**
     * Gets the name of the profession
	 * @return string
     */
    public function getName();

    /**
     * Gets if the profession is active
	 * @return bool
     */
    public function isActive();

    /**
     * Gets the date of the inclusion
	 * @return Carbon\Carbon
     */
    public function getDateInclusion();

    /**
     * Gets the user which includ the profession
	 * @return User
     */
    public function getUserInclusion();

    /**
     * Gets the user which change the profession
	 * @return User
     */
    public function getUserChange();

    /**
     * Gets the date of the change
	 * @return Carbon\Carbon
     */
    public function getDateChange();

    /**
     * Gets the description of the profession
	 * @return string
     */
    public function getDescription();

    /**
     * Gets the date of moderation
	 * @return Carbon\Carbon
     */
    public function getModeration();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

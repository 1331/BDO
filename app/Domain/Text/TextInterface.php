<?php
namespace BDO\Domain\Text;

interface TextInterface {

    /**
     * Gets the id of Text
	 * @return int
     */
    public function getId();

    /**
     * Gets the userInclusion of Text
	 * @return  App\Infrastructure\Eloquent\User\User
     */
    public function getUserInclusion();

    /**
     * Gets the userChange of Text
	 * @return App\Infrastructure\Eloquent\User\User
     */
    public function getUserChange();

    /**
     * Gets the Date inclusion of Text
	 * @return Carbon\Carbon
     */
    public function getDateInclusion();

    /**
     * Gets the date change of Text
	 * @return Carbon\Carbon
     */
    public function getDateChange();

    /**
     * Gets if text is active
	 * @return bool
     */
    public function isStatus();

    /**
     * Gets the title of Text
	 * @return string
     */
    public function getTitle();

    /**
     * Gets the content of the Text
	 * @return string
     */
    public function getContent();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

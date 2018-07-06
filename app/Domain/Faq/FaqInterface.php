<?php
namespace BDO\Domain\Faq;

interface FaqInterface {

    /**
     * Gets the id of FAQ
	 * @return int
     */
    public function getId();

    /**
     * Gets the userInclusion of FAQ
	 * @return  App\Infrastructure\Eloquent\User\User
     */
    public function getUserInclusion();

    /**
     * Gets the userChange of FAQ
	 * @return App\Infrastructure\Eloquent\User\User
     */
    public function getUserChange();

    /**
     * Gets the Date inclusion of FAQ
	 * @return Carbon\Carbon
     */
    public function getDateInclusion();

    /**
     * Gets the date change of FAQ
	 * @return Carbon\Carbon
     */
    public function getDateChange();

    /**
     * Gets if question is active of FAQ
	 * @return bool
     */
    public function isStatus();

    /**
     * Gets the question of FAQ
	 * @return string
     */
    public function getQuestion();

    /**
     * Gets the Answer of question of the FAQ
	 * @return string
     */
    public function getAnswer();

    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

<?php

namespace App\Domain\Contact;

interface ContactInterface {

    /**
     * Gets the id of the contact
	 * @return int
     */
    public function getId();

    /**
     * Gets the name of contact
	 * @return string
     */
    public function getName();

    /**
     * Gets the email of contact
	 * @return string
     */
    public function getEmail();

    /**
     * Gets the phone of contact
	 * @return string
     */
    public function getPhone();

    /**
     * Gets the phone mobile of contact
	 * @return string
     */
    public function getSubject();

    /**
     * Gets the CPF of contact
	 * @return string
     */
    public function getCpf();

    /**
     * Gets the marital status of contact
	 * @return int
     */
    public function getMessageContent();

    /**
     * Gets the date insert
	 * @return Carbon\Carbon
     */
    public function getDateInsert();
 
}
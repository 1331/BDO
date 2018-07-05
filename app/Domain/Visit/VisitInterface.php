<?php 
namespace App\Domain\Visit;


interface VisitInterface{

    /**
     * Gets the id of visit
	 * @return int
     */
    public function getId();

    /**
     * Gets the ip of visit
	 * @return string
     */
    public function getIp();

    /**
     * Gets the date of visit
	 * @return \Carbon\Carbon
     */
    public function getDate();


    /**
     * Gets an array with the datas formated for view
	 * @return \Illuminate\Support\Collection
     */
    public function toArray();

}

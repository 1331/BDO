<?php
namespace App\Mapper;

use App\Repositories\Visit\VisitRepositoryInterface;


class VisitMapper{

    /** @var VisitRepositoryInterface */
    private $visitRepository;
    
    public function __construct(VisitRepositoryInterface $visitRepository){
        $this->visitRepository = $visitRepository;
    }

    private $attributes = array(
        "id"                => "id_visita",
        "ip"                => "ip_visita",
        "date"              => "dt_visita",
    );

    public function mapper($arrayModel){
        $objectVisit = $this->visitRepository->newInstanceEmpty();
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectVisit->${'columnBase'} = $value;
        }
        return $objectVisit;
    }

}
<?php
namespace BDO\Services\Visit;

use BDO\Mapper\VisitMapper;
use BDO\Repositories\Visit\VisitRepositoryInterface;


class VisitService{

    /** @var VisitRepositoryInterface */
    private $visitRepository;

    /** @var VisitMapper */
    private $visitMapper;

    public function __construct(VisitRepositoryInterface $visitRepository,VisitMapper $visitMapper){
        $this->visitRepository = $visitRepository;
        $this->visitMapper = $visitMapper;
    }

    public function create(Array $visitData){
        $visit = $this->visitMapper->mapper($visitData);


        if(empty($visit->getIp()))
            throw new \DomainException("Deve ser informado o IP do visitante");

        return $this->visitRepository->create($visit);

    }

    public function totalVisitors(){
        return $this->visitRepository->count();
    }
}

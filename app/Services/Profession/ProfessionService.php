<?php
namespace BDO\Services\Profession;

use BDO\Mapper\ProfessionMapper;
use BDO\Repositories\Profession\ProfessionRepositoryInterface;

class ProfessionService{

    /** @var ProfessionRepositoryInterface */
    private $professionRepository;

    /** @var ProfessionMapper */
    private $professionMapper;

    public function __construct(ProfessionRepositoryInterface $professionRepository, ProfessionMapper $professionMapper){
        $this->professionRepository = $professionRepository;
        $this->professionMapper = $professionMapper;
    }

    public function create(Array $professionData){

        $profession = $this->professionMapper->mapper($professionData);
        $profession = $this->validateData($profession);

        return $this->professionRepository->create($profession);
    }

    public function findProfessionById($id){
        return $this->professionRepository->findById($id);
    }

    public function findProfessionByName($name){
        return $this->professionRepository->findByName($name);
    }

    public function findByStatus($status){
        return $this->professionRepository->findByStatus($status);
    }

    private function validateData($profession){
        if(empty($profession->getName()))
            throw new \DomainException("Nome da Profissão é obrigatório.");

        return $profession;
    }

}

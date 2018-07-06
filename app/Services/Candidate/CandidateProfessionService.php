<?php
namespace BDO\Services\Candidate;

use BDO\Mapper\CandidateProfessionMapper;
use BDO\Repositories\Candidate\CandidateProfessionRepositoryInterface;

class CandidateProfessionService{

    /** @var CandidateProfessionRepositoryInterface */
    private $candidateProfessionRepository;

    /** @var CandidateProfessionMapper */
    private $candidateProfessionMapper;

    public function __construct(CandidateProfessionRepositoryInterface $candidateProfessionRepository, CandidateProfessionMapper $candidateProfessionMapper){
        $this->candidateProfessionRepository = $candidateProfessionRepository;
        $this->candidateProfessionMapper = $candidateProfessionMapper;
    }

    public function findJobRole($id){
        return $this->candidateProfessionRepository->findByCandidate($id);
    }

    public function removeJobRole($id){
        return $this->candidateProfessionRepository->remove($id);
    }

    public function attachJobRole(Array $candidateProfessionData){
        $candidateProfession = $this->candidateProfessionMapper->mapper($candidateProfessionData);

        if(is_array($candidateProfession)){
            return $this->attachMultipleJobRole($candidateProfession);
        }else{
            return $this->attachSingleJobRole($candidateProfession);
        }
    }

    public function attachSingleJobRole($candidateProfession){
        $candidateProfession = $this->validateData($candidateProfession);
        return $this->candidateProfessionRepository->create($candidateProfession);
    }

    public function attachMultipleJobRole($candidateProfession){
        $id = array();
        foreach($candidateProfession as $object){
            $id[] = $this->candidateProfessionRepository->create($this->validateData($object));
        }
        if(count($id))
            return json_encode($id);

        throw new \DomainException("Informe quais os cargos pretendido pelo candidato.");
    }

    private function validateData($candidate){
        if(empty($candidate->getCandidate()))
            throw new \DomainException("Informe o ID do candidato.");

        if(empty($candidate->getProfession()))
            throw new \DomainException("Informe quais os cargos pretendido pelo candidato.");

        return $candidate;
    }

}

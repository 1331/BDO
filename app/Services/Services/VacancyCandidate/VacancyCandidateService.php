<?php
namespace App\Services\VacancyCandidate;

use App\Repositories\VacancyCandidate\VacancyCandidateRepositoryInterface;

class VacancyCandidateService{

    /** @var VacancyCandidateRepositoryInterface */
    private $vacancyCandidateRepository;

    public function __construct(VacancyCandidateRepositoryInterface $vacancyCandidateRepository){
        $this->vacancyCandidateRepository = $vacancyCandidateRepository;
    }

    public function create(Array $vacancyCandidate){
        return $this->vacancyCandidateRepository->create();
    }

    public function findProcessesCandidate($idCandidate){
        return $this->vacancyCandidateRepository->findProcessesCandidate($idCandidate);
    }

    public function findAll(){
        return $this->vacancyCandidateRepository->all();
    }
   
}
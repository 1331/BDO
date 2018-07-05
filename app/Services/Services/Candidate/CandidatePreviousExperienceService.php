<?php
namespace App\Services\Candidate;

use App\Domain\Tabs\Tabs;
use App\Mapper\CandidatePreviousExperienceMapper;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\Candidate\CandidatePreviousExperienceRepositoryInterface;

class CandidatePreviousExperienceService{

    /** @var CandidatePreviousExperienceRepositoryInterface */
    private $candidatePreviousExperienceRepository;

    /** @var CandidatePreviousExperienceMapper */
    private $candidatePreviousExperienceMapper;

    /** @var CandidateRepositoryInterface */
    private $candidateRepository;

    public function __construct(CandidatePreviousExperienceRepositoryInterface $candidatePreviousExperienceRepository, CandidatePreviousExperienceMapper $candidatePreviousExperienceMapper, CandidateRepositoryInterface $candidateRepository){
        $this->candidatePreviousExperienceRepository = $candidatePreviousExperienceRepository;
        $this->candidatePreviousExperienceMapper = $candidatePreviousExperienceMapper;
        $this->candidateRepository = $candidateRepository;
    }

    public function findPreviousExperience($id){
        return $this->candidatePreviousExperienceRepository->findByCandidate($id);
    }

    public function removePreviousExperience($id){
        return $this->candidatePreviousExperienceRepository->remove($id);
    }

    public function attachPreviousExperience(Array $candidatePreviousExperienceData){
        $candidatePreviousExperience = $this->candidatePreviousExperienceMapper->mapper($candidatePreviousExperienceData);
        $candidatePreviousExperience = $this->validateData($candidatePreviousExperience);
        $id = $this->candidatePreviousExperienceRepository->create($candidatePreviousExperience);
        $this->candidateRepository->activeTabs(Tabs::PREVIOUS_EXPERIENCE, $candidatePreviousExperience->getCandidate()->getId());
        return $id;
    }

    private function validateData($candidate){
        if(empty($candidate->getCandidate()))
            throw new \DomainException("ID do Candidato não recebido.");

        if(empty($candidate->getNameCompany()))
            throw new \DomainException("Nome da empresa obrigatório.");

        return $candidate;
    }
   
}
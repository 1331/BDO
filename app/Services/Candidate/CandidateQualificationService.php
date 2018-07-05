<?php
namespace App\Services\Candidate;

use App\Domain\Tabs\Tabs;
use App\Mapper\CandidateQualificationMapper;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\Candidate\CandidateQualificationRepositoryInterface;

class CandidateQualificationService{

    /** @var CandidateQualificationRepositoryInterface */
    private $candidateQualificationRepository;

    /** @var CandidateQualificationMapper */
    private $candidateQualificationMapper;

    /** @var CandidateRepositoryInterface */
    private $candidateRepository;

    public function __construct(CandidateQualificationRepositoryInterface $candidateQualificationRepository, CandidateQualificationMapper $candidateQualificationMapper, CandidateRepositoryInterface $candidateRepository){
        $this->candidateQualificationRepository = $candidateQualificationRepository;
        $this->candidateQualificationMapper = $candidateQualificationMapper;
        $this->candidateRepository = $candidateRepository;
    }

    public function findQualification($id){
        return $this->candidateQualificationRepository->findByCandidate($id);
    }

    public function removeQualification($id){
        return $this->candidateQualificationRepository->remove($id);
    }

    public function attachQualification(Array $candidateQualificationData){
        $candidateQualification = $this->candidateQualificationMapper->mapper($candidateQualificationData);
        $candidateQualification = $this->validateData($candidateQualification);
        $id = $this->candidateQualificationRepository->create($candidateQualification);
        $this->candidateRepository->activeTabs(Tabs::QUALIFICATION, $candidateQualification->getCandidate()->getId());
        return $id;
    }

    private function validateData($candidate){
        if(empty($candidate->getCandidate()))
            throw new \DomainException("ID do Candidato não recebido.");

        if(empty($candidate->getDescriptionQualification()))
            throw new \DomainException("Descrição é obrigatório.");

        if(empty($candidate->getNameInstitution()))
            throw new \DomainException("Instituição é obrigatório.");

        if(empty($candidate->isPronatec()))
            throw new \DomainException("Informar se curso foi feito pelo Pronatec.");

        return $candidate;
    }
   
}
<?php
namespace BDO\Services\Candidate;

use BDO\Domain\Tabs\Tabs;
use BDO\Mapper\CandidateAcademicEducationMapper;
use BDO\Repositories\Candidate\CandidateRepositoryInterface;
use BDO\Repositories\Candidate\CandidateAcademicEducationRepositoryInterface;

class CandidateAcademicEducationService{

    /** @var CandidateAcademicEducationRepositoryInterface */
    private $candidateAcademicEducationRepository;

    /** @var CandidateAcademicEducationMapper */
    private $candidateAcademicEducationMapper;

    /** @var CandidateRepositoryInterface */
    private $candidateRepository;

    public function __construct(CandidateAcademicEducationRepositoryInterface $candidateAcademicEducationRepository, CandidateAcademicEducationMapper $candidateAcademicEducationMapper, CandidateRepositoryInterface $candidateRepository){
        $this->candidateAcademicEducationRepository = $candidateAcademicEducationRepository;
        $this->candidateAcademicEducationMapper = $candidateAcademicEducationMapper;
        $this->candidateRepository = $candidateRepository;
    }

    public function findAcademicEducation($id){
        return $this->candidateAcademicEducationRepository->findByCandidate($id);
    }

    public function removeAcademicEducation($id){
        return $this->candidateAcademicEducationRepository->remove($id);
    }

    public function attachAcademicEducation(Array $candidateAcademicEducationData){
        $candidateAcademicEducation = $this->candidateAcademicEducationMapper->mapper($candidateAcademicEducationData);
        $candidateAcademicEducation = $this->validateData($candidateAcademicEducation);
        $id = $this->candidateAcademicEducationRepository->create($candidateAcademicEducation);
        $this->candidateRepository->activeTabs(Tabs::ACADEMIC_EDUCATION, $candidateAcademicEducation->getCandidate()->getId());
        return $id;
    }

    private function validateData($candidate){
        // IDs das formações completas, estas exigem campos obrigatorios
        $academicEducationDone = Array(3,5,8,9,10);

        // IDs das formações em curso ou imcompletas, estas não exigem todos campos
        $academicEducationProgress = Array(2,4,6,7,11,12);

        // ID Analfabeto, esta não exige o preenchimento dos outros campos
        $academicEducationIlliterate = 1;

        if(empty($candidate->getCandidate()))
            throw new \DomainException("ID do Candidato não recebido.");

        if(empty($candidate->getAcademicEducation()))
            throw new \DomainException("Escolaridade inválida.");

        if($candidate->getAcademicEducation()->getId() != $academicEducationIlliterate ){
            if(in_array($candidate->getAcademicEducation()->getId(), $academicEducationDone) ){
                if(empty($candidate->getDateEnd()))
                    throw new \DomainException("Data de Término é obrigatório.");
            }

            if(empty($candidate->getNameSchool()))
                throw new \DomainException("Nome da escola é obrigatório.");

            if(empty($candidate->getNameCitySchool()))
                throw new \DomainException("Cidade da escola é obrigatório.");

        }

        return $candidate;
    }

}

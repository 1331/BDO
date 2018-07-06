<?php
namespace BDO\Repositories\Candidate;

use BDO\Infrastructure\Eloquent\Candidate\CandidateAcademicEducation;

interface CandidateAcademicEducationRepositoryInterface{

    public function create(CandidateAcademicEducation $candidateAcademicEducation);
    public function remove($id);
    public function findOrNew($id);
    public function findByCandidate($idCandidate);
    public function newInstanceEmpty();
}

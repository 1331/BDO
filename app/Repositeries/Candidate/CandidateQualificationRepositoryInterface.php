<?php
namespace App\Repositories\Candidate;

use App\Infrastructure\Eloquent\Candidate\CandidateQualification;

interface CandidateQualificationRepositoryInterface{
   
    public function create(CandidateQualification $candidateQualification);
    public function remove($id);
    public function findOrNew($id);
    public function findByCandidate($idCandidate);
    public function newInstanceEmpty();
}
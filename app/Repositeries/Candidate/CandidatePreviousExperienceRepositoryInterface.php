<?php
namespace App\Repositories\Candidate;

use App\Infrastructure\Eloquent\Candidate\CandidatePreviousExperience;

interface CandidatePreviousExperienceRepositoryInterface{
   
    public function create(CandidatePreviousExperience $candidatePreviousExperience);
    public function remove($id);
    public function findOrNew($id);
    public function findByCandidate($idCandidate);
    public function newInstanceEmpty();
}
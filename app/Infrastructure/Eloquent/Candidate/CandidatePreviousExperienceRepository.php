<?php
namespace App\Infrastructure\Eloquent\Candidate;

use App\Infrastructure\Eloquent\Candidate\CandidatePreviousExperience;
use App\Repositories\Candidate\CandidatePreviousExperienceRepositoryInterface;

class CandidatePreviousExperienceRepository implements CandidatePreviousExperienceRepositoryInterface{

  /** @var CandidatePreviousExperience */
  private $eloquent;

  public function __construct(CandidatePreviousExperience $eloquent){
    $this->eloquent = $eloquent;
  }
  
public function create(CandidatePreviousExperience $candidatePreviousExperience){
    $candidatePreviousExperience->save();
    return $candidatePreviousExperience->id_experiencia;
  }

  public function remove($id){
    $candidatePreviousExperience = $this->findOrNew($id);
    return $candidatePreviousExperience->delete();
  }

  public function findOrNew($id = null){
    if($id)
      return $this->eloquent->findOrFail($id);
    
    return $this->eloquent->newInstance();
  }

  public function findByCandidate($idCandidate){
    return $this->eloquent->where('id_candidato', $idCandidate)->get();
  }

  public function newInstanceEmpty(){
    return $this->eloquent->newInstance();
  }
  
}
<?php
namespace App\Infrastructure\Eloquent\Candidate;

use Carbon\Carbon;
use App\Repositories\Candidate\CandidateAcademicEducationRepositoryInterface;


class CandidateAcademicEducationRepository implements CandidateAcademicEducationRepositoryInterface{
  /** @var CandidateAcademicEducation */
  private $eloquent;

  public function __construct(CandidateAcademicEducation $eloquent){
    $this->eloquent = $eloquent;
  }
  
public function create(CandidateAcademicEducation $candidateAcademicEducation){
    $candidateAcademicEducation->save();
    return $candidateAcademicEducation->id_candidato_formacao;
  }

  public function remove($id){
    $candidateAcademicEducation = $this->findOrNew($id);
    return $candidateAcademicEducation->delete();
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
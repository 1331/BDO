<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use BDO\Infrastructure\Eloquent\Candidate\CandidateQualification;
use BDO\Repositories\Candidate\CandidateQualificationRepositoryInterface;

class CandidateQualificationRepository implements CandidateQualificationRepositoryInterface{

  /** @var CandidateQualification */
  private $eloquent;

  public function __construct(CandidateQualification $eloquent){
    $this->eloquent = $eloquent;
  }

public function create(CandidateQualification $candidateQualification){
    $candidateQualification->save();
    return $candidateQualification->id_qualificacao;
  }

  public function remove($id){
    $candidateQualification = $this->findOrNew($id);
    return $candidateQualification->delete();
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

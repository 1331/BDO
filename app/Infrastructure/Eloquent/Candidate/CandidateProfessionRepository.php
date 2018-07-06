<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use Carbon\Carbon;
use BDO\Repositories\Candidate\CandidateProfessionRepositoryInterface;
use BDO\Infrastructure\Eloquent\Candidate\CandidateProfession;


class CandidateProfessionRepository implements CandidateProfessionRepositoryInterface{
  /** @var CandidateProfession */
  private $eloquent;

  public function __construct(CandidateProfession $eloquent){
    $this->eloquent = $eloquent;
  }

public function create(CandidateProfession $candidateProfession){
    $candidateProfession->save();
    return $candidateProfession->id_candidatoprofissao;
  }

  public function remove($id){
    $candidateProfession = $this->findOrNew($id);
    return $candidateProfession->delete();
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

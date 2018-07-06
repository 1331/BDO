<?php
namespace BDO\Infrastructure\Eloquent\VacancyCandidate;

use BDO\Repositories\VacancyCandidate\VacancyCandidateRepositoryInterface;


class VacancyCandidateRepository implements VacancyCandidateRepositoryInterface{
  /** @var VacancyCandidate */
  private $eloquent;

  public function __construct(VacancyCandidate $eloquent){
    $this->eloquent = $eloquent;
  }

  public function all() {
    return $this->eloquent->all();
  }

  public function findProcessesCandidate($idCandidate){
    $query = $this->eloquent->where('id_candidato', '=', $idCandidate)->orderBy('dt_status', 'desc')->get();
    return $query;
  }

  public function find($id){
    return $this->eloquent->findOrFail($id);
  }

  public function count(){
    return $this->eloquent->count();
  }

  public function create(){
    $vacancyCandidate = $this->eloquent->newInstance();
    $vacancyCandidate->save();
    return 'TODO';
  }
}

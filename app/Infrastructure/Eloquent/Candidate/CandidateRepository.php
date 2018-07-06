<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use Carbon\Carbon;
use BDO\Domain\Tabs\Tabs;
use BDO\Domain\Status\Status;
use BDO\Domain\Candidate\CandidateStatus;
use BDO\Repositories\Candidate\CandidateRepositoryInterface;

class CandidateRepository implements CandidateRepositoryInterface{
  /** @var Candidate */
  private $eloquent;

  public function __construct(Candidate $eloquent){
    $this->eloquent = $eloquent;
  }

  public function all() {
    return $this->eloquent->all();
  }

  public function find($id){
    return $this->eloquent->findOrFail($id);
  }

  public function create(Candidate $candidate){
    $candidate = $this->createDates($candidate);
    $candidate->ao_interno = CandidateStatus::STAY;
    $candidate->save();
    return $candidate->id_candidato;
  }

  public function findOrNew($id = null){
    if($id)
      return $this->find($id);

    return $this->eloquent->newInstance();
  }

  public function findLogin(Candidate $login){
    $query = $this->eloquent->where('ds_loginportal', '=', $login->getLoginPortal())
                            ->where('pw_senhaportal', '=', $login->getPasswordPortal())
                            ->first();
    return $query;
  }

  public function count(){
    $query = $this->eloquent->count();
    return $query;
  }

  public function activeTabs($class, $id){
    $candidate = $this->find($id);

    if($class == Tabs::QUALIFICATION){
      $candidate->ao_abaqualificacao = Status::ACTIVE;

    }else if($class == Tabs::ACADEMIC_EDUCATION){
      $candidate->ao_abaformacao = Status::ACTIVE;

    }else if($class == Tabs::PREVIOUS_EXPERIENCE){
      $candidate->ao_abaexperiencia = Status::ACTIVE;
    }

    if($candidate->ao_abaqualificacao == Status::ACTIVE && $candidate->ao_abaformacao == Status::ACTIVE && $candidate->ao_abaexperiencia == Status::ACTIVE){
      $candidate->ao_ativo = Status::ACTIVE;
    }

    return $candidate->save();
  }

  private function createDates($candidate){
    if(empty($candidate->getId())){
      $candidate->dt_cadastro = Carbon::now();
    }

    $candidate->dt_alteracao = Carbon::now();
    $candidate->dt_validade = Carbon::now()->addDays(61)->endOfDay();
    return $candidate;
  }

}

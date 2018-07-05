<?php
namespace App\Infrastructure\Eloquent\Profession;

use Carbon\Carbon;
use App\Domain\Profession\ProfessionStatus;
use App\Repositories\Profession\ProfessionRepositoryInterface;


class ProfessionRepository implements ProfessionRepositoryInterface{
  /** @var Profession */
  private $eloquent;

  public function __construct(Profession $eloquent){
    $this->eloquent = $eloquent;
  }

  public function findByStatus($status) {
    return $this->eloquent->where('ao_ativo', $status)->get();
  }

  public function findById($id){
    return $this->eloquent->findOrFail($id);
  }

  public function findByName($name){
    $name = rawurldecode($name);
    return $this->eloquent->where('nm_profissao', 'LIKE', "%$name%")->get();
  }
      
  public function create(Profession $profession){
    $profession->dt_inclusao = Carbon::now();
    $profession->dt_alteracao = Carbon::now();
    $profession->ao_ativo = ProfessionStatus::VALIDATION;
    $profession->save();
    return $profession->id_profissao;
  }

  public function newInstanceEmpty(){
    return $this->eloquent->newInstance();
  }

}
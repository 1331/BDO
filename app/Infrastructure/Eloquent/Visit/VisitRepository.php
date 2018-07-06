<?php
namespace BDO\Infrastructure\Eloquent\Visit;

use Carbon\Carbon;
use BDO\Repositories\Visit\VisitRepositoryInterface;


class VisitRepository implements VisitRepositoryInterface{
  /** @var Visit */
  private $eloquent;

  public function __construct(Visit $eloquent){
    $this->eloquent = $eloquent;
  }

  public function all() {
    return $this->eloquent->all();
  }

  public function find($id){
    return $this->eloquent->findOrFail($id);
  }

  public function count(){
    return $this->eloquent->count();
  }

  public function create(Visit $visit){
    $visit->dt_visita = Carbon::now();
    $visit->save();
    return $visit->id_visita;
  }

  public function newInstanceEmpty(){
    return $this->eloquent->newInstance();
  }
}

<?php
namespace BDO\Infrastructure\Eloquent\Vacancy;

use BDO\Repositories\Vacancy\VacancyRepositoryInterface;


class VacancyRepository implements VacancyRepositoryInterface{
  /** @var Vacancy */
  private $eloquent;

  public function __construct(Vacancy $eloquent){
    $this->eloquent = $eloquent;
  }

  public function all() {
    return $this->eloquent->all();
  }

  public function findVacanciesActive(){
    $query = $this->eloquent->where('ao_ativo', '=', 'S')->whereNotNull('qt_vaga')->get();
    return $query;

  }
  public function find($id){
    return $this->eloquent->findOrFail($id);
  }

  public function create(){
    $vacancy = $this->eloquent->newInstance();
    $vacancy->save();
    return 'TODO';
  }

  public function count(){
    $query = $this->eloquent->join('profissao', function($join){
      $join->on('profissao.id_profissao',  '=',  'vaga.id_profissao')
        ->where('profissao.ao_ativo', '=', 'S')
        ->where('vaga.ao_ativo', '=', 'S');
    })->sum('vaga.qt_vaga');

    return $query;
  }
}

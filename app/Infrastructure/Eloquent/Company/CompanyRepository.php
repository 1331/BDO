<?php
namespace BDO\Infrastructure\Eloquent\Company;

use BDO\Repositories\Company\CompanyRepositoryInterface;


class CompanyRepository implements CompanyRepositoryInterface{
  /** @var Company */
  private $eloquent;

  public function __construct(Company $eloquent){
    $this->eloquent = $eloquent;
  }

  public function all() {
    // TODO : montar function
  }

  public function find($id){
    // TODO : montar function
  }

  public function count(){
    return $this->eloquent->count();
  }

}

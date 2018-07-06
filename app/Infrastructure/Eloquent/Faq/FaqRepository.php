<?php
namespace BDO\Infrastructure\Eloquent\Faq;

use Carbon\Carbon;
use App\Domain\Faq\FaqStatus;
use BDO\Repositories\Faq\FaqRepositoryInterface;


class FaqRepository implements FaqRepositoryInterface{
  /** @var Faq */
  private $eloquent;

  public function __construct(Faq $eloquent){
    $this->eloquent = $eloquent;
  }

  public function findAll(){
    return $this->eloquent->findAll();
  }

  public function findByStatus($status) {
    return $this->eloquent->where('ao_ativo', $status)->get();
  }

}

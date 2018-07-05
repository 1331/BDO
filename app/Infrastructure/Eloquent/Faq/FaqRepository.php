<?php
namespace App\Infrastructure\Eloquent\Faq;

use Carbon\Carbon;
use App\Domain\Faq\FaqStatus;
use App\Repositories\Faq\FaqRepositoryInterface;


class FaqRepository implements FaqRepositoryInterface{
  /** @var Faq */
  private $eloquent;

  public function __construct(Faq $eloquent){
    $this->eloquent = $eloquent;
  }

  public function findAll(){
    return $this->eloquent->findAll();
  }

  public function findByStatus($status) {print_r("teste");exit();
    return $this->eloquent->where('ao_ativo', $status)->get();
  }

}

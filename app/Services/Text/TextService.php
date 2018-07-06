<?php
namespace BDO\Services\Text;

use BDO\Repositories\Text\TextRepositoryInterface;

class TextService{

    /** @var TextRepositoryInterface */
    private $textRepository;

    public function __construct(TextRepositoryInterface $textRepository){
        $this->textRepository = $textRepository;
    }

    public function findAll(){
        return $this->textRepository->findAll();
    }

    public function findByStatus($status){
        return $this->textRepository->findByStatus($status);
    }
}

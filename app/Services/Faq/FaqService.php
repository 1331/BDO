<?php
namespace App\Services\Faq;

use App\Repositories\Faq\FaqRepositoryInterface;

class FaqService{

    /** @var FaqRepositoryInterface */
    private $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository){
        $this->faqRepository = $faqRepository;
    }

    public function findAll(){
        return $this->faqRepository->findAll();
    }

    public function findByStatus($status){
        return $this->faqRepository->findByStatus($status);
    }
}
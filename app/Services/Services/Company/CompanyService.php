<?php
namespace App\Services\Company;

use App\Repositories\Company\CompanyRepositoryInterface;


class CompanyService{

    /** @var CompanyRepositoryInterface */
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository){
        $this->companyRepository = $companyRepository;
    }

    public function amountCompany(){
        return $this->companyRepository->count();
    }
}
<?php
namespace App\Services\Vacancy;

use App\Repositories\Vacancy\VacancyRepositoryInterface;

class VacancyService{

    /** @var VacancyRepositoryInterface */
    private $vacancyRepository;

    public function __construct(VacancyRepositoryInterface $vacancyRepository){
        $this->vacancyRepository = $vacancyRepository;
    }

    public function create(Array $vacancy){
        return $this->vacancyRepository->create();

    }

    public function findVacancy($id){
        return $this->vacancyRepository->find($id);
    }

    public function findVacancyActive(){
        return $this->vacancyRepository->findVacanciesActive();
    }

    public function findAll(){
        return $this->vacancyRepository->all();
    }

    public function sumVacancyActive(){
        return $this->vacancyRepository->count();
    }
   
}
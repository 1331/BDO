<?php
namespace BDO\Repositories\Vacancy;

interface VacancyRepositoryInterface{

    public function all();
    public function find($id);
    public function create();
    public function count();
}

<?php
namespace App\Repositories\Visit;

use App\Infrastructure\Eloquent\Visit\Visit;

interface VisitRepositoryInterface{
   
    public function all();
    public function find($id);
    public function count();
    public function create(Visit $visit);
}
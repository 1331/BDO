<?php
namespace App\Repositories\Profession;

use App\Infrastructure\Eloquent\Profession\Profession;

interface ProfessionRepositoryInterface{
   
    public function findByStatus($status);
    public function findById($id);
    public function findByName($name);
    public function create(Profession $profession);
    public function newInstanceEmpty();
}
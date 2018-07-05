<?php
namespace App\Repositories\Text;

use App\Infrastructure\Eloquent\Text\Text;

interface TextRepositoryInterface{
   
    public function findAll();
    public function findByStatus($status);
}
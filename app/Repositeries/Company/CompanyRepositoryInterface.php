<?php
namespace App\Repositories\Company;

use App\Infrastructure\Eloquent\Company\Company;

interface CompanyRepositoryInterface{
   
    public function all();
    public function find($id);
    public function count();
}
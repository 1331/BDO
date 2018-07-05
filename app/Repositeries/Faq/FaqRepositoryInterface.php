<?php
namespace App\Repositories\Faq;

use App\Infrastructure\Eloquent\Faq\Faq;

interface FaqRepositoryInterface{
   
    public function findAll();
    public function findByStatus($status);
}
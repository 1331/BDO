<?php
namespace BDO\Repositories\Faq;

interface FaqRepositoryInterface{

    public function findAll();
    public function findByStatus($status);
}

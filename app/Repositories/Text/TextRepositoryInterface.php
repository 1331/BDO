<?php
namespace BDO\Repositories\Text;

use BDO\Infrastructure\Eloquent\Text\Text;

interface TextRepositoryInterface{

    public function findAll();
    public function findByStatus($status);
}

<?php
namespace BDO\Repositories\Visit;

use BDO\Infrastructure\Eloquent\Visit\Visit;

interface VisitRepositoryInterface{

    public function all();
    public function find($id);
    public function count();
    public function create(Visit $visit);
}

<?php
namespace BDO\Repositories\Company;

interface CompanyRepositoryInterface{

    public function all();
    public function find($id);
    public function count();
}

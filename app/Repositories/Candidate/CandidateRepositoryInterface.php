<?php
namespace BDO\Repositories\Candidate;

use BDO\Infrastructure\Eloquent\Candidate\Candidate;

interface CandidateRepositoryInterface{

    public function all();
    public function find($id);
    public function create(Candidate $candidate);
    public function count();
    public function activeTabs($class, $id);
}

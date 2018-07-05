<?php
namespace App\Repositories\Candidate;

use App\Infrastructure\Eloquent\Candidate\Candidate;

interface CandidateRepositoryInterface{
   
    public function all();
    public function find($id);
    public function create(Candidate $candidate);
    public function count();
    public function activeTabs($class, $id);
}
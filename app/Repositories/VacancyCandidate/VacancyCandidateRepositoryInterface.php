<?php
namespace BDO\Repositories\VacancyCandidate;

interface VacancyCandidateRepositoryInterface{

    public function all();
    public function find($id);
    public function create();
    public function findProcessesCandidate($idCandidate);
}

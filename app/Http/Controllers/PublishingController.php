<?php

namespace BDO\Http\Controllers;

use Illuminate\Http\Request;
use BDO\Repositories\Company\CompanyRepositoryInterface;
use BDO\Repositories\Vacancy\VacancyRepositoryInterface;
use BDO\Repositories\VacancyCandidate\VacancyCandidateRepositoryInterface;
use BDO\Repositories\Visit\VisitRepositoryInterface;
use BDO\Services\Candidate\CandidateService;

class PublishingController extends Controller{

	/** @var CompanyRepositoryInterface */
    private $companyRepository;

	/** @var VisitRepositoryInterface */
    private $visitRepository;

	/** @var VacancyRepositoryInterface */
    private $vacancyRepository;

	/** @var CandidateService */
    private $candidateService;

	public function __construct(
		CompanyRepositoryInterface $companyRepository,
		VisitRepositoryInterface $visitRepository,
		VacancyRepositoryInterface $vacancyRepository,
		CandidateService $candidateService
	){
		$this->companyRepository  = $companyRepository;
		$this->visitRepository    = $visitRepository;
		$this->vacancyRepository  = $vacancyRepository;
		$this->candidateService   = $candidateService;
    }

	public function index()
    {
	   $company    = $this->companyRepository->count();
	   $visit      = substr(strrev( chunk_split($this->visitRepository->count(),3,".")), 1);
	   $vacancy    = $this->vacancyRepository->count();
	   $curriculum = $this->candidateService->count();print_r($vacancyCandidate);exit();
       return view('publishing.index', compact('company', 'visit','vacancy'));
    }
}
?>

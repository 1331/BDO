<?php

namespace BDO\Providers;

use Illuminate\Support\ServiceProvider;
use BDO\Infrastructure\Eloquent\Candidate\CandidateRepository;
use BDO\Infrastructure\Eloquent\Company\CompanyRepository;
use BDO\Infrastructure\Eloquent\Faq\FaqRepository;
use BDO\Infrastructure\Eloquent\Vacancy\VacancyRepository;
use BDO\Infrastructure\Eloquent\VacancyCandidate\VacancyCandidateRepository;
use BDO\Infrastructure\Eloquent\Visit\VisitRepository;
use BDO\Repositories\Candidate\CandidateRepositoryInterface;
use BDO\Repositories\Company\CompanyRepositoryInterface;
use BDO\Repositories\Faq\FaqRepositoryInterface;
use BDO\Repositories\Visit\VisitRepositoryInterface;
use BDO\Repositories\Vacancy\VacancyRepositoryInterface;
use BDO\Services\Candidate\CandidateService;


class InjectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
		$this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
		$this->app->bind(VisitRepositoryInterface::class, VisitRepository::class);
		$this->app->bind(VacancyRepositoryInterface::class, VacancyRepository::class);
		$this->app->bind(VacancyCandidateRepositoryInterface::class, VacancyCandidateRepository::class);
		// $this->app->bind(CandidateService::class, CandidateRepository ::class);
		$this->app->bind(CandidateRepositoryInterface::class, CandidateService::class);
		$this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
    }
}
?>

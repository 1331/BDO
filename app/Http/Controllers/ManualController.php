<?php

namespace BDO\Http\Controllers;

use Illuminate\Http\Request;
use BDO\Domain\Faq\FaqStatus;
use BDO\Repositories\Faq\FaqRepositoryInterface;

class ManualController extends Controller{

	/** @var FaqRepositoryInterface */
    private $faqRepository;

	public function __construct(FaqRepositoryInterface $faqRepository){
		$this->faqRepository = $faqRepository;

    }

	public function faq(){
		$CommonQuestions = $this->faqRepository->findByStatus(FaqStatus::ACTIVE);
		return view('manuals.faq', compact('CommonQuestions'));
	}

	public function privacy(){
		return view('manuals.privacy');
	}
}

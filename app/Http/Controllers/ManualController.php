<?php

namespace BDO\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Faq\FaqStatus;
use App\Services\Faq\FaqService;

class ManualController extends Controller{

	/** @var FaqService */
    private $faqService;

	public function __construct(FaqService $faqService){
        $this->faqService = $faqService;
print_r("teste");exit();
    }

	public function faq(){
		$CommonQuestions = $this->faqService->findByStatus(FaqStatus::ACTIVE);
		return view('manuals.faq', compact('CommonQuestions'));
	}
}

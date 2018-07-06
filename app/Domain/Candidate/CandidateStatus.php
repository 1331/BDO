<?php

namespace BDO\Domain\Candidate;

class CandidateStatus{

	// Activation of candidate
	const ACTIVE = 'S';
	const INACTIVE = 'N';
	const OLD = 'A';

	// Solicitation of to exchange password
	const EXCHANGE = 'S';
	const STAY = 'N';
}
?>

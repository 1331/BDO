<?php

namespace BDO\Infrastructure\Eloquent\VacancyCandidate;

use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\Vacancy\Vacancy;
use BDO\Infrastructure\Eloquent\Candidate\Candidate;
use BDO\Domain\VacancyCandidate\VacancyCandidateInterface;

class VacancyCandidate extends Model implements VacancyCandidateInterface
{

    protected $table = 'vagacandidato';

    protected $primaryKey = 'id_vagacandidato';

    public $timestamps = false;

    protected $dates = ['dt_status'];

    protected $witch = ['vacancy', 'candidate'];

    public function vacancy(){
        return $this->hasOne(Vacancy::class, 'id_vaga', 'id_vaga');
    }

    public function candidate(){
        return $this->hasOne(Candidate::class, 'id_candidato', 'id_candidato');
    }

    public function getId(){
        return $this->id_vagacandidato;
    }

    public function getVacancy(){
        return $this->vacancy;
    }

    public function getCandidate(){
        return $this->candidate;
    }

    public function isStatus(){
        return $this->ao_status;
    }

    public function getDateStatus(){
        return $this->dt_status;
    }

    public function toArray(){
        return [
            'id'           => $this->getId(),
            'vacancy'      => $this->getVacancy(),
            'candidate'    => $this->getCandidate(),
            'status'       => $this->isStatus(),
            'dateStatus'   => $this->getDateStatus()->toDateString(),
        ];
    }


}

// if($status == 'E'){
//     return 'Encaminhado';
// }else if($status == 'D'){
//     return 'Dispensado';
// }else if($status == 'C'){
//     return 'Contratado';
// }else if($status == 'P'){
//     return 'Pré-selecionado';
// }else if($status == 'B'){
//     return 'Baixa automática';
// }

<?php 
namespace App\Infrastructure\Eloquent\Candidate;

use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\User\User;
use App\Infrastructure\Eloquent\Candidate\Candidate;
use App\Domain\Candidate\CandidateQualificationInterface;

class CandidateQualification extends Model implements CandidateQualificationInterface {

    protected $table = 'candidatoqualificacao';

    protected $primaryKey = 'id_qualificacao';

    public $timestamps = false;

    protected $dates = ['dt_termino', 'dt_inclusao', 'dt_alteracao'];

    public $witch = ['candidate','userChange', 'userInclusion'];

    public function candidate(){ 
        return $this->hasOne(Candidate::class, 'id_candidato', 'id_candidato'); 
    } 

    public function userChange(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioalteracao');
    }

    public function userInclusion(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioinclusao');
    }

    public function getId(){
        return $this->id_qualificacao;
    }

    public function getCandidate(){
        return $this->candidate;
    } 

    public function getUserChange(){
        return $this->userChange;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getDescriptionQualification(){
        return $this->ds_qualificacao;
    }

    public function getDateEnd(){
        return $this->dt_termino;
    }

    public function getAmountHour(){
        return $this->qtd_horas;
    }
    
    public function getDateInclusion(){
        return $this->dt_inclusao;
    }
    
    public function getDateChange(){
        return $this->dt_alteracao;
    }
    
    public function hasQualification(){
        return $this->ao_qualificacao;
    }
    
    public function getNameInstitution(){
        return $this->nm_instituicao;
    }

    public function isPronatec(){
        return $this->ao_pronatec;
    }

    public function toArray(){
        return [
            'id'                        => $this->getId(),
            'candidate'                 => $this->getCandidate()->getId(),
            'descriptionQualification'  => $this->getDescriptionQualification(),
            'dateEnd'                   => ($this->getDateEnd() ? $this->getDateEnd()->toDateString() : ''),
            'amountHour'                => $this->getAmountHour(),
            'hasQualification'          => $this->hasQualification(),
            'nameInstitution'           => $this->getNameInstitution(),
            'isPronatec'                => $this->isPronatec()
        ];
    }

}

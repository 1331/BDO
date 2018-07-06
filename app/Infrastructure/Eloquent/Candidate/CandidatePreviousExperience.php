<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\User\User;
use BDO\Infrastructure\Eloquent\Candidate\Candidate;
use BDO\Domain\Candidate\CandidatePreviousExperienceInterface;

class CandidatePreviousExperience extends Model implements CandidatePreviousExperienceInterface {

    protected $table = 'candidatoexperiencia';

    protected $primaryKey = 'id_experiencia';

    public $timestamps = false;

    protected $dates = ['dt_inicio', 'dt_termino', 'dt_inclusao', 'dt_alteracao'];

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
        return $this->id_experiencia;
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

    public function getDateStart(){
        return $this->dt_inicio;
    }

    public function getDateEnd(){
        return $this->dt_termino;
    }

    public function getNameCompany(){
        return $this->nm_empresa;
    }

    public function getDescriptionActivities(){
        return $this->ds_atividades;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }

    public function hasPreviousExperience(){
        return $this->ao_experiencia;
    }

    public function toArray(){
        return [
            'id'                    => $this->getId(),
            'candidate'             => $this->getCandidate()->getId(),
            'dateStart'             => ($this->getDateStart() ? $this->getDateStart()->toDateString() : ''),
            'dateEnd'               => ($this->getDateEnd() ? $this->getDateEnd()->toDateString() : ''),
            'nameCompany'           => $this->getNameCompany(),
            'descriptionActivities' => $this->getDescriptionActivities(),
            'hasPreviousExperience' => $this->hasPreviousExperience(),
        ];
    }

}

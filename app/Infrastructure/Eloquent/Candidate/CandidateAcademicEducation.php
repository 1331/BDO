<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\User\User;
use BDO\Infrastructure\Eloquent\Candidate\Candidate;
use BDO\Domain\Candidate\CandidateAcademicEducationInterface;
use BDO\Infrastructure\Eloquent\AcademicEducation\AcademicEducation;

class CandidateAcademicEducation extends Model implements CandidateAcademicEducationInterface {

    protected $table = 'candidatoformacao';

    protected $primaryKey = 'id_candidato_formacao';

    public $timestamps = false;

    protected $dates = ['dt_termino', 'dt_inclusao', 'dt_alteracao'];

    public $witch = ['candidate', 'profession','userChange', 'userInclusion'];

    public function candidate(){
        return $this->hasOne(Candidate::class, 'id_candidato', 'id_candidato');
    }

    public function academicEducation(){
        return $this->hasOne(AcademicEducation::class, 'id_formacao', 'id_formacao');
    }

    public function userChange(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioalteracao');
    }

    public function userInclusion(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioinclusao');
    }

    public function getId(){
        return $this->id_candidato_formacao;
    }

    public function getCandidate(){
        return $this->candidate;
    }

    public function getAcademicEducation(){
        return $this->academicEducation;
    }

    public function getUserChange(){
        return $this->userChange;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getDateEnd(){
        return $this->dt_termino;
    }

    public function getNameSchool(){
        return $this->nm_escola;
    }

    public function getNameCitySchool(){
        return $this->ds_cidadeescola;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }

    public function getCourse(){
        return $this->ds_curso;
    }

    public function getAcademicSemester(){
        return $this->ds_semestre;
    }

    public function toArray(){
        return [
            'id'                => $this->getId(),
            'candidate'         => $this->getCandidate()->getId(),
            'academicEducation' => $this->getAcademicEducation(),
            'dateEnd'           => ($this->getDateEnd() ? $this->getDateEnd()->toDateString() : ''),
            'nameSchool'        => $this->getNameSchool(),
            'nameCitySchool'    => $this->getNameCitySchool(),
            'course'            => $this->getCourse(),
            'academicSemester'  => $this->getAcademicSemester()
        ];
    }

}

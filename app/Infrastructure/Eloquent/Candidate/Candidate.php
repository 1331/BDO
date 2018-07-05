<?php

namespace App\Infrastructure\Eloquent\Candidate;

use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\Cbo\Cbo;
use App\Infrastructure\Eloquent\City\City;
use App\Infrastructure\Eloquent\User\User;
use App\Domain\Candidate\CandidateInterface;
use App\Infrastructure\Eloquent\State\State;
use App\Infrastructure\Eloquent\Deficiency\Deficiency;
use App\Infrastructure\Eloquent\Neighborhood\Neighborhood;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Candidate extends Model implements CandidateInterface, JWTSubject, AuthenticatableContract, AuthorizableContract{
    use Authenticatable, Authorizable;

    protected $table = 'candidato';

    protected $primaryKey = 'id_candidato';

    public $timestamps = false;

    protected $dates = ['dt_nascimento', 'dt_cadastro', 'dt_validade', 'dt_alteracao'];

    protected $witch = ['cbo', 'deficiency', 'neighborhood', 'city', 'stateCtps', 'userChange', 'userInclusion'];

    public function cbo(){ 
        return $this->hasOne(Cbo::class, 'id_cbo', 'id_cbo'); 
    } 
    
    public function deficiency(){ 
        return $this->hasOne(Deficiency::class, 'id_deficiencia', 'id_deficiencia'); 
    }

    public function neighborhood(){
        return $this->hasOne(Neighborhood::class, 'id_bairro', 'id_bairro');
    }

    public function stateCtps(){
        return $this->hasOne(State::class, 'id_estado', 'id_estadoctps');
    }

    public function city(){
        return $this->hasOne(City::class, 'id_cidade', 'id_cidade');
    }

    public function userChange(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioalteracao');
    }

    public function userInclusion(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioinclusao');
    }

    public function getCbo(){
        return $this->cbo;
    }

    public function getDeficiency(){
        return $this->deficiency;
    }

    public function getUserChange(){
        return $this->userChange;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getNeighborhood(){
        return $this->neighborhood;
    }

    public function getId(){
        return $this->id_candidato;
    }
    
    public function getName(){
        return $this->nm_candidato;
    }

    public function getEmail(){
        return $this->ds_email;
    }

    public function getPhoneFixed(){
        return $this->nr_telefone;
    }

    public function getPhoneMobile(){
        return $this->nr_celular;
    }

    public function getMaritalStatus(){
        return $this->ds_estado_civil;
    }

    public function getDateBirth(){
        return $this->dt_nascimento;
    }

    public function getGenre(){
        return $this->ao_sexo;
    }

    public function getNationality(){
        return $this->ds_nacionalidade;
    }

    public function getProfession(){
        return $this->ds_profissao;
    }

    public function getCep(){
        return $this->nr_cep;
    }

    public function getPublicPlace(){
        return $this->ds_logradouro;
    }

    public function getHouseNumber(){
        return $this->nr_logradouro;
    }

    public function getComplement(){
        return $this->ds_complemento;
    }

    public function getDistrict(){
        return $this->ds_bairro;
    }
    
    public function getCity(){
        return $this->city;
    }

    public function getDateRegister(){
        return $this->dt_cadastro;
    }

    public function getDateExpired(){
        return $this->dt_validade;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }

    public function getObjective(){
        return $this->ds_objetivo;
    }

    public function getCpf(){
        return $this->nr_cpf;
    }

    public function getRg(){
        return $this->nr_rg;
    }

    public function getCtps(){
        return $this->nr_ctps;
    }

    public function getNumberPis(){
        return $this->nr_pis;
    }

    public function getNumberSerie(){
        return $this->nr_serie;
    }

    public function getStateCtps(){
        return $this->stateCtps;
    }

    public function getLoginPortal(){
        return $this->ds_loginportal;
    }

    public function getPasswordPortal(){
        return $this->pw_senhaportal;
    }

    public function isInternal(){
        return $this->ao_interno;
    }

    public function getCnh(){
        return $this->ds_cnh;
    }

    public function getQuantityReminder(){
        return $this->qt_lembrete;
    }

    public function isFamilyBag(){
        return $this->ao_bolsafamilia;
    }

    public function getNumberNis(){
        return $this->nr_nis;
    }

    public function isActive(){
        return $this->ao_ativo;
    }

    public function hasTabPreviousExperience(){
        return $this->ao_abaexperiencia;
    }

    public function hasTabQualification(){
        return $this->ao_abaqualificacao;
    }

    public function hasTabAcademicEducation(){
        return $this->ao_abaformacao;
    }

    public function toArray(){
        return [
            'id'                        => $this->getId(),
            'name'                      => $this->getName(),
            'email'                     => $this->getEmail(),
            'cpf'                       => $this->getCpf(),
            'rg'                        => $this->getRg(),
            'ctps'                      => $this->getCtps(),
            'numberPis'                 => $this->getNumberPis(),
            'numberSerie'               => $this->getNumberSerie(),
            'stateCtps'                 => $this->getStateCtps(),
            'cnh'                       => $this->getCnh(),
            'phone'                     => $this->getPhoneFixed(),
            'cellPhone'                 => $this->getPhoneMobile(),
            'maritalStatus'             => $this->getMaritalStatus(),
            'genre'                     => $this->getGenre(),
            'nationality'               => $this->getNationality(),
            'objective'                 => $this->getObjective(),
            'hasFamilyBag'              => $this->isFamilyBag(),
            'hasTabPreviousExperience'  => $this->hasTabPreviousExperience(),
            'hasTabQualification'       => $this->hasTabQualification(),
            'hasTabAcademicEducation'   => $this->hasTabAcademicEducation(),
            'isActive'                  => $this->isActive(),
            'dateBirth'                 => $this->getDateBirth()->toDateString(),
            'loginPortal'               => $this->getLoginPortal(),
            'passwordPortal'            => $this->getPasswordPortal(), 
            'cbo'                       => $this->getCbo(),
            'deficiency'                => $this->getDeficiency(),
            'houseNumber'               => $this->getHouseNumber(),
            'publicPlace'               => $this->getPublicPlace(),
            'complement'                => $this->getComplement(),
            'neighborhood'              => $this->getNeighborhood(),
            'district'                  => $this->getDistrict(),
            'city'                      => $this->getCity(),
            'cep'                       => $this->getCep(),
            'userInclusion'             => $this->getUserInclusion(),
            'userChange'                => $this->getUserChange(),
        ];
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    public function getAuthPassword(){
        return password_hash($this->getPasswordPortal(), PASSWORD_BCRYPT);
    }
}
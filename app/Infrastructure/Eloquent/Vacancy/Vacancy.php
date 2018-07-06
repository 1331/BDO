<?php

namespace BDO\Infrastructure\Eloquent\Vacancy;

use Illuminate\Database\Eloquent\Model;
use BDO\Domain\Vacancy\VacancyInterface;
use BDO\Infrastructure\Eloquent\Company\Company;
use BDO\Infrastructure\Eloquent\Profession\Profession;

class Vacancy extends Model implements VacancyInterface
{

    protected $table = 'vaga';

    protected $primaryKey = 'id_vaga';

    public $timestamps = false;

    protected $dates = ['dt_cadastro'];

    protected $witch = ['profession', 'company'];

    public function profession(){
        return $this->hasOne(Profession::class, 'id_profissao', 'id_profissao');
    }

    public function company(){
        return $this->hasOne(Company::class, 'id_empresa', 'id_empresa');
    }

    public function getId(){
        return $this->id_vaga;
    }

    public function getCompany(){
        return $this->company;
    }

    public function getProfession(){
        return $this->profession;
    }

    public function getDescription(){
        return $this->ds_atribuicao;
    }

    public function getSalary(){
        return $this->nr_salario;
    }

    public function getAdditional(){
        return $this->ds_adicional;
    }

    public function getBenefit(){
        return $this->ds_beneficio;
    }

    public function getNote(){
        return $this->ds_observacao;
    }

    public function getNumberJobsOpportunities(){
        return $this->qt_vaga;
    }

    public function getStatus(){
        return $this->ao_ativo;
    }

    public function getShowEmail(){
        return $this->ao_exibeemail;
    }

    public function getShowName(){
        return $this->ao_exibenome;
    }

    public function getShowPhone(){
        return $this->ao_exibetelefone;
    }

    public function getGenre(){
        return $this->ao_sexo;
    }

    public function getDateRegister(){
        return $this->dt_cadastro;
    }

    public function getDisabledPeople(){
        return $this->ao_deficiente;
    }

    public function getMaritalStatus(){
        return $this->ds_estado_civil;
    }

    public function getAge(){
        return $this->ds_idade;
    }

    public function getNeedExperience(){
        return $this->ao_experiencia;
    }

    public function getDriverLicense(){
        return $this->ds_cnh;
    }

    public function toArray(){
        return [
            'id'                        => $this->getId(),
            'company'                   => $this->getCompany(),
            'title'                     => $this->getProfession()->getName(),
            'description'               => $this->getDescription(),
            'salary'                    => $this->getSalary(),
            'additional'                => $this->getAdditional(),
            'benefits'                  => $this->getBenefit(),
            'note'                      => $this->getNote(),
            'numberJobsOpportunities'   => $this->getNumberJobsOpportunities(),
            'status'                    => $this->getStatus(),
            'showEmail'                 => $this->getShowEmail(),
            'showName'                  => $this->getShowName(),
            'showPhone'                 => $this->getShowPhone(),
            'genre'                     => $this->getGenre(),
            'registrationDate'          => $this->getDateRegister()->toDateString(),
            'disabledPeople'            => $this->getDisabledPeople(),
            'maritalStatus'             => $this->getMaritalStatus(),
            'age'                       => $this->getAge(),
            'needExperience'             => $this->getNeedExperience(),
            'driverLicense'             => $this->getDriverLicense(),
        ];
    }


}

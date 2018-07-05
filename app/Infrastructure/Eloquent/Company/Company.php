<?php
namespace App\Infrastructure\Eloquent\Company;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Company\CompanyInterface;
use App\Infrastructure\Eloquent\Regions\Polygon;
use App\Infrastructure\Eloquent\Company\CompanyType;
use App\Infrastructure\Eloquent\Regions\MicroRegion;
use App\Infrastructure\Eloquent\Company\AmountEmployee;
use App\Infrastructure\Eloquent\ActivyBranch\ActivyBranch;

class Company extends Model implements CompanyInterface{

    protected $table = 'empresa';

    public $timestamps = false;

    protected $dates = ['dt_fundacao', 'dt_nascimento', 'dt_cadastro'];

    protected $witch = ['city', 'activyBranch', 'companyType', 'amountEmployee', 'microRegion', 'polygon'];

    public function city(){
        return $this->hasOne(City::class, 'id_cidade', 'id_cidade');
    }

    public function activyBranch(){
        return $this->hasOne(ActivyBranch::class, 'id_ramoatividade', 'id_ramoatividade');
    }

    public function companyType(){
        return $this->hasOne(CompanyType::class, 'id_empresatipo', 'id_empresatipo');
    }

    public function amountEmployee(){
        return $this->hasOne(AmountEmployee::class, 'id_quantidadefuncionario', 'id_quantidadefuncionario');
    }
    
    public function microRegiao(){
        return $this->hasOne(MicroRegion::class, 'id_microregiao', 'id_microregiao');
    }

    public function polygon(){
        return $this->hasOne(Polygon::class, 'id_poligono', 'id_poligono');
    }

    public function getId(){
        return $this->id_empresa;
    }

    public function getName(){
        return $this->nm_razaosocial;
    }

    public function getNameFantasy(){
        return $this->nm_fantasia;
    }

    public function getCnpj(){
        return $this->nr_cnpj;
    }

    public function getNameContact(){
        return $this->nm_contato;
    }

    public function getPhoneCompany(){
        return $this->nr_telefoneempresa;
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

    public function getCity(){
        return $this->city;
    }

    public function getEmail(){
        return $this->ds_email;
    }

    public function getSite(){
        return $this->ds_site;
    }

    public function getStateRegistration(){
        return $this->nr_inscricaoestadual;
    }

    public function getMunicipalRegistartioin(){
        return $this->nr_inscricaomunicipal;
    }

    public function getDateFoundation(){
        return $this->dt_fundacao;
    }

    public function isRelease(){
        return $this->ao_liberacao;
    }

    public function getPasswordPortal(){
        return $this->pw_senhaportal;
    }

    public function isInternal(){
        return $this->ao_internal;
    }

    public function getActivyBranch(){
        return $this->activyBranch;
    }

    public function getCompanyType(){
        return $this->companyType;
    }

    public function getAmountEmployee(){
        return $this->amountEmployee;
    }

    public function getOwnerName(){
        return $this->nm_proprietario;
    }

    public function getJobRole(){
        return $this->ds_cargo;
    }

    public function getCpf(){
        return $this->nr_cpf;
    }

    public function getDateBirth(){
        return $this->dt_nascimento;
    }

    public function getCellPhone(){
        return $this->nr_celular;
    }

    public function getOwnerEmail(){
        return $this->ds_emailproprietario;
    }

    public function isStatus(){
        return $this->ao_status;
    }

    public function isRecruiter(){
        return $this->ao_recrutador;
    }

    public function getMicroRegion(){
        return $this->microRegion;
    }

    public function getPolygon(){
        return $this->polygon;
    }

    public function getDateRegister(){
        return $this->dt_cadastro;
    }

    public function isSeal(){
        return $ths->ao_selo;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nameFantasy' => $this->getNameFantasy(),
            'cnpj' => $this->getCnpj(),
            'contact' => $this->getNameContact(),
            'phoneCompany' => $this->getPhoneCompany(),
            'email' => $this->getEmail(),
            'site' => $this->getSite(),
            'activyBranch' => $this->getActivyBranch(),
            'companyType' => $this->getCompanyType(),
            'AmountEmployee' => $this->getAmountEmployee(),
            'status' => $this->isStatus(),
            'dateRegister' => $this->getDateRegister()->toDateString(),
        ];
    }



}

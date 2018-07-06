<?php
namespace BDO\Mapper;

use BDO\Util\FormatDate;
use BDO\Repositories\Candidate\CandidateRepositoryInterface;


class CandidateMapper{

    /** @var CandidateRepositoryInterface */
    private $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository){
        $this->candidateRepository = $candidateRepository;
    }

    private $attributes = array(
        "id"                        => "id_candidato",
        "name"                      => "nm_candidato",
        "email"                     => "ds_email",
        "cpf"                       => "nr_cpf",
        "dateBirth"                 => "dt_nascimento",
        "loginPortal"               => "ds_loginportal",
        "passwordPortal"            => "pw_senhaportal",
        "cbo"                       => "id_cbo",
        "deficiency"                => "id_deficiencia",
        "neighborhood"              => "id_bairro",
        "district"                  => "ds_bairro",
        "city"                      => "id_cidade",
        "stateCtps"                 => "id_estadoctps",
        "userInclusion"             => "id_usuarioinclusao",
        "userChange"                => "id_usuarioalteracao",
        "phoneFixed"                => "nr_telefone",
        "phoneMobile"               => "nr_celular",
        "maritalStatus"             => "ds_estado_civil",
        "genre"                     => "ao_sexo",
        "nationality"               => "ds_nacionalidade",
        "profession"                => "ds_profissao",
        "cep"                       => "nr_cep",
        "public_place"              => "ds_logradouro",
        "houseNumber"               => "nr_logradouro",
        "complement"                => "ds_complemento",
        "dateRegister"              => "dt_cadastro",
        "dateExpired"               => "dt_validade",
        "dateChange"                => "dt_alteracao",
        "objective"                 => "ds_objetivo",
        "rg"                        => "nr_rg",
        "ctps"                      => "nr_ctps",
        "numberPis"                 => "nr_pis",
        "numberSerie"               => "nr_serie",
        "stateCtps"                 => "id_estadoctps",
        "internal"                  => "ao_interno",
        "cnh"                       => "ds_cnh",
        "quantityReminder"          => "qt_lembrete",
        "familyBag"                 => "ao_bolsafamilia",
        "numberNis"                 => "nr_nis",
        "isActive"                  => "ao_ativo",
        "hasTabPreviousExperience"  => "ao_abaexperiencia",
        "hasTabQualification"       => "ao_abaqualificacao",
        "hasTabAcademicEducation"   => "ao_abaformacao"
    );

    public function mapper($arrayModel){
        $id = ( empty($arrayModel['id']) ? null : $arrayModel['id'] );
        $objectCandidate = $this->candidateRepository->findOrNew($id);
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];

            //If attribute is a date, then use function to format a date in american standard
            if(strpos($columnBase,'dt_') !== false){
                $value = FormatDate::getDateUs($value);
            }

            $objectCandidate->${'columnBase'} = strtoupper($value);

            // If attribute is an password, keep formattion
            if($columnBase == 'pw_senhaportal'){
                $objectCandidate->${'columnBase'} = $value;
            }
        }
        return $objectCandidate;
    }

}

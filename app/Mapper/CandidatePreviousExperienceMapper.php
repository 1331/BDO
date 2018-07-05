<?php
namespace App\Mapper;

use App\Repositories\Candidate\CandidatePreviousExperienceRepositoryInterface;

class CandidatePreviousExperienceMapper{

    /** @var CandidatePreviousExperienceRepositoryInterface */
    private $candidatePreviousExperienceRepository;
    
    public function __construct(CandidatePreviousExperienceRepositoryInterface $candidatePreviousExperienceRepository){
        $this->candidatePreviousExperienceRepository = $candidatePreviousExperienceRepository;
    }

    private $attributes = array(
        "id"                    => "id_experiencia",
        "userChange"            => "id_usuarioalteracao", 
        "userInclusion"         => "id_usuarioinclusao",
        "candidate"             => "id_candidato",
        "dateStart"             => "dt_inicio",
        "dateEnd"               => "dt_termino",
        "nameCompany"           => "nm_empresa",
        "descriptionActivities" => "ds_atividades",
        "dateInclusion"         => "dt_inclusao",
        "dateChange"            => "dt_alteracao",
        "hasPreviousExperience" => "ao_experiencia",
    );

    public function mapper($arrayModel){
        $id = ( empty($arrayModel['id']) ? null : $arrayModel['id'] );
        $objectCandidatPreviousExperience = $this->candidatePreviousExperienceRepository->findOrNew($id);
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectCandidatPreviousExperience->${'columnBase'} = $value;
        }
        return $objectCandidatPreviousExperience;
    }

}
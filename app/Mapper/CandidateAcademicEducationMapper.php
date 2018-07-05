<?php
namespace App\Mapper;

use App\Repositories\Candidate\CandidateAcademicEducationRepositoryInterface;


class CandidateAcademicEducationMapper{

    /** @var CandidateAcademicEducationRepositoryInterface */
    private $candidateAcademicEducationRepository;
    
    public function __construct(CandidateAcademicEducationRepositoryInterface $candidateAcademicEducationRepository){
        $this->candidateAcademicEducationRepository = $candidateAcademicEducationRepository;
    }

    private $attributes = array(
        "id"                => "id_candidato_formacao",
        "candidate"         => "id_candidato",
        "academicEducation" => "id_formacao",
        "userChange"        => "id_usuarioalteracao", 
        "userInclusion"     => "id_usuarioinclusao",
        "dateEnd"           => "dt_termino",
        "nameSchool"        => "nm_escola",
        "nameCitySchool"    => "ds_cidadeescola",
        "dateInclusion"     => "dt_inclusao",
        "dateChange"        => "dt_alteracao",
        "course"            => "ds_curso",
        "academicSemester"  => "ds_semestre",
    );

    public function mapper($arrayModel){
        $id = ( empty($arrayModel['id']) ? null : $arrayModel['id'] );
        $objectCandidatAcademicEducation = $this->candidateAcademicEducationRepository->findOrNew($id);
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectCandidatAcademicEducation->${'columnBase'} = $value;
        }
        return $objectCandidatAcademicEducation;
    }

}
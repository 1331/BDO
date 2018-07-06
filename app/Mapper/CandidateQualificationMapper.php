<?php
namespace BDO\Mapper;

use BDO\Repositories\Candidate\CandidateQualificationRepositoryInterface;

class CandidateQualificationMapper{

    /** @var CandidateQualificationRepositoryInterface */
    private $candidateQualificationRepository;

    public function __construct(CandidateQualificationRepositoryInterface $candidateQualificationRepository){
        $this->candidateQualificationRepository = $candidateQualificationRepository;
    }

    private $attributes = array(
        "id"                        => "id_qualificacao",
        "candidate"                 => "id_candidato",
        "userChange"                => "id_usuarioalteracao",
        "userInclusion"             => "id_usuarioinclusao",
        "descriptionQualification"  => "ds_qualificacao",
        "dateEnd"                   => "dt_termino",
        "amountHour"                => "qtd_horas",
        "dateInclusion"             => "dt_inclusao",
        "dateChange"                => "dt_alteracao",
        "hasQualification"          => "ao_qualificacao",
        "nameInstitution"           => "nm_instituicao",
        "isPronatec"                => "ao_pronatec",
    );

    public function mapper($arrayModel){
        $id = ( empty($arrayModel['id']) ? null : $arrayModel['id'] );
        $objectCandidatQualification = $this->candidateQualificationRepository->findOrNew($id);
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectCandidatQualification->${'columnBase'} = $value;
        }
        return $objectCandidatQualification;
    }

}

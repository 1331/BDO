<?php
namespace App\Mapper;

use App\Repositories\Candidate\CandidateProfessionRepositoryInterface;

class CandidateProfessionMapper{

    /** @var CandidateProfessionRepositoryInterface */
    private $candidateProfessionRepository;
    
    public function __construct(CandidateProfessionRepositoryInterface $candidateProfessionRepository){
        $this->candidateProfessionRepository = $candidateProfessionRepository;
    }

    private $attributes = array(
        "id"            => "id_candidatoprofissao",
        "profession"    => "id_profissao",
        "candidate"     => "id_candidato",
    );

    public function mapper($arrayModel){
        if(isset($arrayModel['profession'])){
            if(is_array($arrayModel['profession'])){
                $collectionCandidateProfession = array();
                foreach($arrayModel['profession'] as $idProfession){
                    $objectCandidateProfession = $this->candidateProfessionRepository->newInstanceEmpty();
                    $objectCandidateProfession->id_candidato = $arrayModel['candidate'];        
                    $objectCandidateProfession->id_profissao = $idProfession;     
                    $collectionCandidateProfession[] = $objectCandidateProfession;
                }
                return $collectionCandidateProfession;
            }
        }

        $id = ( empty($arrayModel['id']) ? null : $arrayModel['id'] );
        $objectCandidateProfession = $this->candidateProfessionRepository->findOrNew($id);
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectCandidateProfession->${'columnBase'} = $value;
        }
        return $objectCandidateProfession;
    }

}
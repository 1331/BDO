<?php
namespace BDO\Mapper;

use BDO\Repositories\Profession\ProfessionRepositoryInterface;


class ProfessionMapper{

    /** @var ProfessionRepositoryInterface */
    private $professionRepository;

    public function __construct(ProfessionRepositoryInterface $professionRepository){
        $this->professionRepository = $professionRepository;
    }

    private $attributes = array(
        "id"            => "id_profissao",
        "name"          => "nm_profissao",
        "active"        => "ao_ativo",
        "dateInclusion" => "dt_inclusao",
        "userInclusion" => "id_usuarioinclusao",
        "dateChange"    => "dt_alteracao",
        "userChange"    => "id_usuarioalteracao",
        "description"   => "ds_profissao",
        "moderation"    => "dt_moderacao",
    );

    public function mapper($arrayModel){
        $objectProfession = $this->professionRepository->newInstanceEmpty();
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectProfession->${'columnBase'} = $value;
        }
        return $objectProfession;
    }

}

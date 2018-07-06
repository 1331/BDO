<?php
namespace BDO\Mapper;

use BDO\Repositories\Contact\ContactRepositoryInterface;


class ContactMapper{

    /** @var ContactRepositoryInterface */
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository){
        $this->contactRepository = $contactRepository;
    }

    private $attributes = array(
        "id"                => "id_contato",
        "name"              => "nm_contato",
        "email"             => "ds_email",
        "phone"             => "nr_telefone",
        "subject"           => "ds_assunto",
        "cpf"               => "nr_cpf",
        "messageContent"    => "ds_mensagem",
        "dateInsert"        => "dt_cadastro",
    );

    public function mapper($arrayModel){
        if(isset($arrayModel["subject"]))
            $arrayModel["subject"] = $this->translateSubject($arrayModel["subject"]);

        $objectContact = $this->contactRepository->newInstanceEmpty();
        foreach($arrayModel as $key => $value){
            $columnBase = $this->attributes[$key];
            $objectContact->${'columnBase'} = strtoupper($value);
        }

        return $objectContact;
    }

    private function translateSubject($subject){
        switch ($subject) {
            case 'information':
                return "INFORMAÇÃO";

            case 'claims':
                return "RECLAMAÇÃO";

            case 'suggestion':
                return "SUGESTÃO";

            case 'conductLine':
                return "LINHA DE CONDUTA";

            case 'forgotPassword':
                return "ESQUECI MINHA SENHA";

            default:
                return "OUTROS";
        }
    }

}

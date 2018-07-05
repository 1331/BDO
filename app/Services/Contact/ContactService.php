<?php
namespace App\Services\Contact;

use App\Mapper\ContactMapper;
use App\Repositories\Contact\ContactRepositoryInterface;

class ContactService{

    /** @var ContactRepositoryInterface */
    private $contactRepository;

    /** @var ContactMapper */
    private $contactMapper;

    public function __construct(ContactRepositoryInterface $contactRepository, ContactMapper $contactMapper){
        $this->contactRepository = $contactRepository;
        $this->contactMapper = $contactMapper;
    }

    public function sendMessage(Array $contactData){

        $contact = $this->contactMapper->mapper($contactData);
        $contact = $this->validateMessage($contact);
        return $this->contactRepository->sendMessage($contact);
    }

    public function findMessageById($id){
        return $this->contactRepository->find($id);
    }

    public function findAll(){
        return $this->contactRepository->all();
    }

    private function validateMessage($contact){
        if(empty($contact->getName()))
            throw new \DomainException("Nome é obrigatório.");
        
        if(empty($contact->getEmail()))
            throw new \DomainException("Email é obrigatório.");

        if(empty($contact->getSubject()))
            throw new \DomainException("Assunto é obrigatório.");

        if(empty($contact->getMessageContent()))
            throw new \DomainException("Deve haver conteudo na mensagem."); 

        return $contact;
    }   
}
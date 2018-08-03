<?php
namespace BDO\Services\Candidate;

use Ixudra\Curl\Facades\Curl;
use BDO\Mapper\CandidateMapper;
use BDO\Infrastructure\Eloquent\Candidate\Candidate;
use BDO\Repositories\Candidate\CandidateRepositoryInterface;

class CandidateService{

    /** @var CandidateRepositoryInterface */
    private $candidateRepository;

    /** @var CandidateMapper */
    private $candidateMapper;

    public function __construct(CandidateRepositoryInterface $candidateRepository, CandidateMapper $candidateMapper){
        $this->candidateRepository = $candidateRepository;
        $this->candidateMapper = $candidateMapper;
    }

    public function create(Array $candidateData){
        $candidate = $this->candidateMapper->mapper($candidateData);
        $candidate = $this->validateRegisterBasic($candidate);

        return $this->candidateRepository->create($candidate);
    }

    public function findCandidate($id){
        return $this->candidateRepository->find($id);
    }

    public function findAll(){
        return $this->candidateRepository->all();
    }

    public function login(Array $loginData){
        $candidateLogin = $this->candidateMapper->mapper($loginData);
        $candidateLogin = $this->validateLoginData($candidateLogin);
        $result = $this->candidateRepository->findLogin($candidateLogin);
        if(empty($result)){
            throw new \DomainException("Login Inválido");
        }
        return $result;
    }

    public function amountCandidate(){ 
        return $this->candidateRepository->count();
    }

    public function addPhotoProfile(Array $photoData){
        if(!isset($photoData['id'])){
            throw new \DomainException("Falha ao encontrar o candidato.");
        }

        if(!isset($photoData['base64'])){
            throw new \DomainException("Falha no carregamento da foto.");
        }

        define('UPLOAD_DIR', 'tempPhotos/');
        $id = $photoData['id'];
        $img = $photoData['base64'];
        $img = str_replace('data:image/jpg;base64,', '', $img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = UPLOAD_DIR . $id . '.jpg';
        $success = file_put_contents($file, $data);

        // $response = Curl::to('http://10.105.1.37:9000/publico/controle/ControleCandidato.php?op=upload')
        // ->withFile( 'teste', '\workspace\BdoMobileWS\public\tempPhotos\teste.jpg', 'image/jpg', 'teste')
        // ->post();

        if($success)
            return true;
        throw new \DomainException("Falha no upload da foto.");
    }

    public function findPhotoProfile($id){
        define('UPLOAD_DIR', 'tempPhotos/');
        if(!file_exists(UPLOAD_DIR . $id . '.jpg'))
            throw new \DomainException("Candidato não possui foto.");

        $img = file_get_contents(UPLOAD_DIR . $id . '.jpg');
        return (base64_encode($img));
    }

    private function validateRegisterBasic($candidate){
        if(empty($candidate->getName()))
            throw new \DomainException("Nome é obrigatório");

        if(empty($candidate->getEmail()))
            throw new \DomainException("Email é obrigatório");

        if(empty($candidate->getCpf()))
            throw new \DomainException("CPF é obrigatório.");

        if(empty($candidate->getDateBirth()))
            throw new \DomainException("Data de nascimento é obrigatório.");

        if(empty($candidate->getLoginPortal()))
            throw new \DomainException("Nome de usuário é obrigatório.");

        if(empty($candidate->getPasswordPortal()))
            throw new \DomainException("Senha do usuario é obrigatório.");

        return $candidate;
    }

    private function validateLoginData($candidate){
        if(empty($candidate->getLoginPortal()))
            throw new \DomainException("Nome de usuario inválido.");

        if(empty($candidate->getPasswordPortal()))
            throw new \DomainException("Senha inválida.");

        return $candidate;
    }

}

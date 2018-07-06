<?php
namespace BDO\Infrastructure\Eloquent\Candidate;

use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\Candidate\Candidate;
use BDO\Infrastructure\Eloquent\Profession\Profession;
use BDO\Domain\Candidate\CandidateProfessionInterface;

class CandidateProfession extends Model implements CandidateProfessionInterface {

    protected $table = 'candidatoprofissao';

    protected $primaryKey = 'id_candidatoprofissao';

    public $timestamps = false;

    public $witch = ['candidate', 'profession'];

    public function candidate(){
        return $this->hasOne(Candidate::class, 'id_candidato', 'id_candidato');
    }

    public function profession(){
        return $this->hasOne(Profession::class, 'id_profissao', 'id_profissao');
    }

    public function getId(){
        return $this->id_candidatoprofissao;
    }

    public function getCandidate(){
        return $this->candidate;
    }

    public function getProfession(){
        return $this->profession;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'candidate' => $this->getCandidate()->getId(),
            'profession' => $this->getProfession(),
        ];
    }

}

<?php 
namespace App\Infrastructure\Eloquent\Faq;

use App\Domain\Faq\FaqInterface;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\User\User;

class Faq extends Model implements FaqInterface {

    protected $table = 'pergunta';

    protected $primaryKey = 'id_pergunta';

    public $timestamps = false;

    protected $dates = ['dt_inclusao', 'dt_alteracao'];

    protected $witch = ['userChange', 'userInclusion'];

    public function userChange(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioalteracao');
    }

    public function userInclusion(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioinclusao');
    }

    public function getId(){
        return $this->id_pergunta;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getUserChange(){
        return $this->userChange;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }

    public function isStatus(){
        return $this->ao_ativo;
    }

    public function getQuestion(){
        return $this->ds_pergunta;
    } 

    public function getAnswer(){
        return $this->ds_resposta;
    } 

    public function toArray(){
        return [
            'id'        => $this->getId(),
            'question'  => $this->getQuestion(),
            'answer'    => $this->getAnswer(),
            'status'    => $this->isStatus(),
        ];
    }

}

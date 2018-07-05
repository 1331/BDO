<?php 
namespace App\Infrastructure\Eloquent\Deficiency;

use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Eloquent\User\User;

class Deficiency extends Model {

    protected $table = 'deficiencia';

    protected $primaryKey = 'id_deficiencia';

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
        return $this->id_deficiencia;
    }

    public function getName(){
        return $this->nm_deficiencia;
    } 

    public function getUserChange(){
        return $this->userChange;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }  

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'userInclusion' => $this->getUserInclusion(),
            'dateInclusion' => $this->getDateInclusion(),
            'userChange' => $this->getUserChange(),
            'dateChange' => $this->getDateChange(),
        ];
    }

}

<?php
namespace BDO\Infrastructure\Eloquent\User;

use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\Role\Role;
use BDO\Infrastructure\Eloquent\Secretariat\Secretariat;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract{
    use Authenticatable, Authorizable;

    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $dates = ['dt_inclusao', 'dt_alteracao', 'dt_ativacao'];

    protected $witch = ['role', 'secretariat'];

    public function role(){
        return $this->hasOne(Role::class, 'id_perfil', 'id_perfil');
    }

    public function secretariat(){
        return $this->hasOne(Secretariat::class, 'id_secretaria', 'id_secretaria');
    }

    public function getId(){
        return $this->id_usuario;
    }

    public function getName(){
        return $this->nm_usuario;
    }

    public function getRole(){
        return $this->role;
    }

    public function getEmail(){
        return $this->ds_email;
    }

    public function getPassword(){
        return $this->pw_senha;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getDateChange(){
        return $this->dt_alteracao;
    }

    public function isControl(){
        return $this->ao_controle;
    }

    public function getDateActivation(){
        return $this->dt_ativacao;
    }

    public function getLogin(){
        return $this->ds_login;
    }

    public function isChangePassword(){
        return $this->ao_trocasenha;
    }

    public function getSecretariat(){
        return $this->secretariat;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'role' => $this->getRole(),
            'email' => $this->getEmail(),
            'dateInclusion' => ($this->getDateInclusion() ? $this->getDateInclusion()->toDateString() : ''),
            'dateChange' => ($this->getDateChange() ? $this->getDateChange()->toDateString() : ''),
            'dateActivation' => ($this->getDateActivation() ? $this->getDateActivation()->toDateString() : ''),
            'secretariat' => $this->getSecretariat()
        ];
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    public function getAuthPassword(){
        return password_hash($this->pw_senha, PASSWORD_BCRYPT);
    }
}

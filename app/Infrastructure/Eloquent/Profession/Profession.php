<?php
namespace BDO\Infrastructure\Eloquent\Profession;

use BDO\Domain\Status\Status;
use Illuminate\Database\Eloquent\Model;
use BDO\Infrastructure\Eloquent\User\User;
use BDO\Domain\Profession\ProfessionInterface;
use BDO\Infrastructure\Eloquent\Vacancy\Vacancy;

class Profession extends Model implements ProfessionInterface
{

    protected $table = 'profissao';

    public $timestamps = false;

    protected $dates = ['dt_inclusao', 'dt_alteracao', 'dt_moderacao'];

    protected $primaryKey = 'id_profissao';

    public function userInclusion(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioinclusao');
    }

    public function userChange(){
        return $this->hasOne(User::class, 'id_usuario', 'id_usuarioalteracao');
    }

    public function vacancies(){
        return $this->hasMany(Vacancy::class, 'id_profissao', 'id_profissao');
    }

    public function getId(){
        return $this->id_profissao;
    }

    public function getName(){
        return $this->nm_profissao;
    }

    public function isActive(){
        return $this->ao_ativo;
    }

    public function getDateInclusion(){
        return $this->dt_inclusao;
    }

    public function getUserInclusion(){
        return $this->userInclusion;
    }

    public function getUserChange(){
        return $this->userChange;
    }

    public function getDateChange(){
        return $this->dt_inclusao;
    }

    public function getDescription(){
        return $this->ds_profissao;
    }

    public function getModeration(){
        return $this->dt_moderacao;
    }

    public function getVacancyAvailable(){
        return $this->vacancies->reduce(function ($sum, $vacancy) {
            if($vacancy->getStatus() == Status::ACTIVE)
                return $sum + $vacancy->getNumberJobsOpportunities();
            else
                return $sum +0;
        });
    }

    public function toArray(){
        return [
            'id'                => $this->getId(),
            'name'              => $this->getName(),
            'active'            => $this->isActive(),
            // 'dateInclusion'     => ($this->getDateInclusion() ? $this->getDateInclusion()->toDateString() : ''),
            // 'userInclusion'     => $this->getUserInclusion(),
            // 'dateChange'        => ($this->getDateChange() ? $this->getDateChange()->toDateString() : ''),
            // 'userChange'        => $this->getUserChange(),
            'description'       => $this->getDescription(),
            // 'moderation'        => ($this->getModeration() ? $this->getModeration()->toDateString() : ''),
            'vacancyAvailable'  => $this->getVacancyAvailable()
        ];
    }

}

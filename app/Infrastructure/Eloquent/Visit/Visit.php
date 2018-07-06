<?php
namespace BDO\Infrastructure\Eloquent\Visit;

use Carbon\Carbon;
use BDO\Domain\Visit\VisitInterface;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model implements VisitInterface {

    protected $table = 'visita';

    public $timestamps = false;

    protected $dates = ['dt_visita'];

    protected $primaryKey = 'id_visita';

    public function getId(){
        return $this->id_visita;
    }

    public function getIp(){
        return $this->ip_visita;
    }

    public function getDate(){
        return $this->dt_visita;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'ip' => $this->getIp(),
            'date' => $this->getDate(),
        ];
    }
}

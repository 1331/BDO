<?php
namespace BDO\Infrastructure\Eloquent\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model {

    protected $table = 'empresatipo';

    protected $primaryKey = 'id_empresatipo';

    public $timestamps = false;


    public function getId(){
        return $this->id_empresatipo;
    }

    public function getName(){
        return $this->nm_empresatipo;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}

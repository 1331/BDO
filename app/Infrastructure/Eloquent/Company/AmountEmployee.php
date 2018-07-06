<?php
namespace BDO\Infrastructure\Eloquent\Company;

use Illuminate\Database\Eloquent\Model;

class AmountEmployee extends Model {

    protected $table = 'quantidadefuncionario';

    protected $primaryKey = 'id_quantidadefuncionario';

    public $timestamps = false;


    public function getId(){
        return $this->id_quantidadefuncionario;
    }

    public function getName(){
        return $this->nm_quantidadefuncionario;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}

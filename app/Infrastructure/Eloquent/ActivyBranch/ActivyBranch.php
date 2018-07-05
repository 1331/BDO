<?php 
namespace App\Infrastructure\Eloquent\ActivyBranch;

use Illuminate\Database\Eloquent\Model;

class ActivyBranch extends Model {

    protected $table = 'ramoatividade';

    protected $primaryKey = 'id_ramoatividade';

    public $timestamps = false;


    public function getId(){
        return $this->id_ramoatividade;
    }

    public function getName(){
        return $this->nm_ramoatividade;
    } 

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}

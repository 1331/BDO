<?php 
namespace App\Infrastructure\Eloquent\Regions;

use Illuminate\Database\Eloquent\Model;

class MicroRegion extends Model {

    protected $table = 'microregiao';

    protected $primaryKey = 'id_microregiao';

    public $timestamps = false;


    public function getId(){
        return $this->id_microregiao;
    }

    public function getName(){
        return $this->nm_microregiao;
    } 

    public function getQuadrant(){
        return $this->id_quadrante;
    } 

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'quadrant' => $this->getQuadrant(),
        ];
    }

}

<?php 
namespace App\Infrastructure\Eloquent\Regions;

use Illuminate\Database\Eloquent\Model;

class Polygon extends Model {

    protected $table = 'poligono';

    protected $primaryKey = 'id_poligonos';

    public $timestamps = false;


    public function getId(){
        return $this->id_poligono;
    }

    public function getName(){
        return $this->nm_poligono;
    } 

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}

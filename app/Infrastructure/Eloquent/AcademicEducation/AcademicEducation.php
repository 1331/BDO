<?php 
namespace App\Infrastructure\Eloquent\AcademicEducation;

use Illuminate\Database\Eloquent\Model;

class AcademicEducation extends Model {

    protected $table = 'formacao';

    protected $primaryKey = 'id_formacao';

    public $timestamps = false;


    public function getId(){
        return $this->id_formacao;
    }

    public function getName(){
        return $this->nm_formacao;
    } 

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

}

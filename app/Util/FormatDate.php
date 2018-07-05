<?php

namespace App\Util;

use Carbon\Carbon;


class FormatDate{

    public function __construct(){}
    
    public static function getDateUs($date){
        if(count(explode('-', $date)) == 3 ){
            return $date;
        }else if(count(explode('/', $date)) == 3 ){
            return Carbon::createFromFormat('d/m/Y', $date);
        }
    }
}

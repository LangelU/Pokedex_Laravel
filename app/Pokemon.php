<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
   public function Pokemon_Primarytype(){
        return $this->hasOne('App\PrimaryType', 'prymary_type');
    }

    public function Pokemon_SecondaryType(){
        return $this->hasOne('App\SecondaryType', 'secondary_type');
    }
}

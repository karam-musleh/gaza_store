<?php
namespace App\Traits ;

trait Trans{
    // Accessor method
    // trans_name
    function getTransNameAttribute()  {
        return json_decode($this->name ,true)[app()->getLocale()] ;

    }

    function getNameEnAttribute()  {
        //  return json_decode($this->name, true)[app()->getLocale()] ;
        return json_decode($this->name ,true)['en']??'' ;
    }


    function getNameArAttribute()  {
        return json_decode($this->name ,true)['ar']??'' ;
    }

    function getTransDescriptionAttribute()  {
            return json_decode($this->description ,true)[app()->getLocale()] ;

    }

    function getDescriptionEnAttribute()  {
        return json_decode($this->description ,true)['en']??'' ;

    }

    function getDescriptionArAttribute()  {
        return json_decode($this->description ,true)['ar']??'' ;

    }
}



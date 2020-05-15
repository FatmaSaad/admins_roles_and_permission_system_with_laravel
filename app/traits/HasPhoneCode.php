<?php
namespace  App\Traits;


trait  HasPhoneCode{
    /**
     * Boot the has password trait for a model.
     *
     * @return void
     */
    public static function bootHasPhoneCode()
    {

        static::creating(function ($user) {
            $user->mobile_code =  mt_rand(10000, 99999);
        });



    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Company extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

    protected $guarded =[];


    public function Employer()
    {
        return $this->hasMany('App\Models\Contact_Persone', 'company_id');
    }

}

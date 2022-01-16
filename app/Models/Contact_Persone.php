<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact_Persone extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['first_name','last_name'];

    protected $guarded =[];

    public function Company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

}

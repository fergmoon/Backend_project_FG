<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected $primarykey = "id";
    protected $fillable = ["name","last_name","id_number","company_name","city"];


    // $table->enum("type",["CC","NIT"]);

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $table = "users";
    protected $primarykey = "id";
    protected $fillable = ["name","last_name","phone","e_mail","user_name","password"];    

}

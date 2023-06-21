<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactHobby extends Model
{
    use HasFactory;
    protected $table = 'contact_hobby';
    protected $fillable = ['contact_id','hobby_id'];
}

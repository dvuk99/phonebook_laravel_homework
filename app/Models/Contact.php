<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name','last_name','email','city_id'];

    public function hobbies(): BelongsToMany{
        return $this->belongsToMany(Hobby::class);
    }
    public function city(): BelongsTo{
        return $this->belongsTo(City::class);
    }
}

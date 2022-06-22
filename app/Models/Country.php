<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable=["country_code","name"];

    public function state()
    {
        return $this->hasMany(State::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'birth_date', 'cpf', 'phone_number', 'email'];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}

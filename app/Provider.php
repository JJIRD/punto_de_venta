<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name', 'email', 'ruc_number', 'phone', 'address'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

class District extends Model
{
    protected $fillable = ['name'];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}

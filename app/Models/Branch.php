<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBranch;

class Branch extends Model
{
    protected $fillable = ['name'];


    public function subBranches()
    {
        return $this->hasMany(SubBranch::class, 'branch_id');
    }

}

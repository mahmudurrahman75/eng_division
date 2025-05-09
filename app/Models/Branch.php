<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBranch;
use App\Models\District;

class Branch extends Model
{
    protected $fillable = ['name'];


    public function subBranches()
    {
        return $this->hasMany(SubBranch::class, 'branch_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}

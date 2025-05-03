<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBranchMeasurement extends Model
{
    protected $fillable = ['name', 'branchName', 'remarks'];
}

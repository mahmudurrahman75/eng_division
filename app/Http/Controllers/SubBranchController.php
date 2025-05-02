<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubBranch;

class SubBranchController extends Controller
{
    public function get_all_subBranch() {
        $sub_branch = SubBranch::all();
        return $this->response('all subbranch fetch successfully', true, $sub_branch, 200);
    }
}

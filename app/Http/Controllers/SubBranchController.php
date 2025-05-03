<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\SubBranch;
use Illuminate\Support\Facades\Validator;
use function Illuminate\Database\Query\orderBy;

class SubBranchController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:sub_branches,name',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed',false,$validator->errors(),422);
        }

        // Create the branch
        $sub_branch = SubBranch::create([
            'name' => $request->name,
        ]);

        return $this->response('SubBranch created successfully.',true,$sub_branch,200);
    }


    public function get_all_subBranch() {
        $sub_branch = SubBranch::all();
        return $this->response('all subbranch fetch successfully', true, $sub_branch, 200);
    }

    public function update(Request $request, $id)
    {
        $subBranch = SubBranch::find($id);

        if (!$subBranch) {
            return $this->response('SubBranch not found.', false, null, 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:sub_branches,name,' . $id,
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed', false, $validator->errors(), 422);
        }

        // Update the sub-branch
        $subBranch->name = $request->name;
        $subBranch->save();

        return $this->response('SubBranch updated successfully.', true, $subBranch, 200);
    }


    public function delete($id)
    {
        $subBranch = SubBranch::find($id);

        if (!$subBranch) {
            return $this->response('SubBranch not found.', false, null, 404);
        }

        $subBranch->delete();

        return $this->response('SubBranch deleted successfully.', true, null, 200);
    }



}

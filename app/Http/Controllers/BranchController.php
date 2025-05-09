<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;

class BranchController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:branches,name',
            'district_id' => 'required|exists:districts,id',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed', false, $validator->errors(), 422);
        }

        // Create the branch
        $branch = Branch::create([
            'name' => $request->name,
            'district_id' => $request->district_id,
        ]);

        return $this->response('Branch created successfully.', true, $branch, 200);
    }



    public function get_all_branch() {
        // Eager load the district relationship
        $branches = Branch::with('district')->get();

        // Transform the data to include district_name
        $results = $branches->map(function($branch) {
            return [
                'id' => $branch->id,
                'name' => $branch->name,
                'district_id' => $branch->district_id,
                'district_name' => $branch->district ? $branch->district->name : null,
                'created_at' => $branch->created_at,
                'updated_at' => $branch->updated_at,
            ];
        });

        return $this->response('All Branch Retrieved Successfully', true, $results, 200);
    }



    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return $this->response('Branch not found.', false, null, 404);
        }

        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:branches,name,' . $id,
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed', false, $validator->errors(), 422);
        }

        $branch->name = $request->name;
        $branch->save();

        return $this->response('Branch updated successfully.', true, $branch, 200);
    }

    public function delete($id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return $this->response('Branch not found.', false, null, 404);
        }

        $branch->delete();

        return $this->response('Branch deleted successfully.', true, null, 200);
    }


}

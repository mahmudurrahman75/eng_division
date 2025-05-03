<?php

namespace App\Http\Controllers;
use App\Models\SubBranchMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubBranchMeasurementController extends Controller
{

    public function create(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:sub_branch_measurements,name',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation failed', false, $validator->errors(), 422);
        }

        // Handle checkbox for remarks (true/false)
        $remarks = $request->has('remarks') ? 1 : 0;

        // Create the sub-branch measurement
        $subBranchMeasurement = SubBranchMeasurement::create([
            'name' => $request->name,
            'branchName' => $request->branchName,
            'remarks' => $remarks,
        ]);

        return $this->response('Sub-branch measurement created successfully', true, $subBranchMeasurement, 200);
    }

}

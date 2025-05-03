<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchMeasurement;
use Illuminate\Support\Facades\Validator;

class BranchMeasurementController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:branch_measurements,name',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation failed', false, $validator->errors(), 422);
        }

        $remarks = $request->has('remarks') ? 1 : 0;

        $measurement = BranchMeasurement::create([
            'name' => $request->name,
            'remarks' => $remarks,
        ]);

        return $this->response('Branch measurement created successfully', true, $measurement, 200);
    }


    //Get All Data
    public function get_all_branch_measurement()
    {
        $measurements = BranchMeasurement::all();

        return $this->response('All branch measurements retrieved successfully', true, $measurements, 200);
    }


    public function update(Request $request, $id)
    {
        // Find the record by ID
        $measurement = BranchMeasurement::find($id);

        if (!$measurement) {
            return $this->response('Branch measurement not found', false, null, 404);
        }

        // Validate input (allow same name if it belongs to this record)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:branch_measurements,name,' . $id,
        ]);

        if ($validator->fails()) {
            return $this->response('Validation failed', false, $validator->errors(), 422);
        }

        // Update remarks checkbox value
        $remarks = $request->has('remarks') ? 1 : 0;

        // Update record
        $measurement->update([
            'name' => $request->name,
            'remarks' => $remarks,
        ]);

        return $this->response('Branch measurement updated successfully', true, $measurement, 200);
    }


    //Delete
    public function delete($id)
    {
        $measurement = BranchMeasurement::find($id);

        if (!$measurement) {
            return $this->response('Branch measurement not found', false, null, 404);
        }

        $measurement->delete();

        return $this->response('Branch measurement deleted successfully', true, null, 200);
    }






}

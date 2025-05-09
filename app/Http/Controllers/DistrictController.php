<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistrictController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:districts,name',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed',false,$validator->errors(),422);
        }

        // Create the branch
        $branch = District::create([
            'name' => $request->name,
        ]);

        return $this->response('District created successfully.',true,$branch,200);
    }
}

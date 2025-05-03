<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:vendors,name',
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed',false,$validator->errors(),422);
        }

        // Create the branch
        $vendor = Vendor::create([
            'name' => $request->name,
        ]);

        return $this->response('$vendor created successfully.',true,$vendor,200);
    }

    //Get All Data
    public function get_all_vendor() {
        $vendor = Vendor::all();
        return $this->response('all vendor fetch successfully', true, $vendor, 200);
    }


    //Update
    public function update(Request $request, $id)
    {
        // Find the vendor
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return $this->response('Vendor not found.', false, null, 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:vendors,name,' . $vendor->id,
        ]);

        if ($validator->fails()) {
            return $this->response('Validation Failed', false, $validator->errors(), 422);
        }

        // Update vendor data
        $vendor->name = $request->name;
        $vendor->save();

        return $this->response('Vendor updated successfully.', true, $vendor, 200);
    }


    public function delete($id)
    {
        // Find the vendor by ID
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return $this->response('Vendor not found.', false, null, 404);
        }

        // Delete the vendor
        $vendor->delete();

        return $this->response('Vendor deleted successfully.', true, null, 200);
    }





}

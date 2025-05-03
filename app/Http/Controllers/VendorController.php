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

    public function get_all_vendor() {
        $vendor = Vendor::all();
        return $this->response('all vendor fetch successfully', true, $vendor, 200);
    }


}

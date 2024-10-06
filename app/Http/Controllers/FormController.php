<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;

class FormController extends Controller
{
     // Untuk menampilkan form (opsional)
     public function create()
     {
         return view('index'); 
     }
 
     // Untuk menyimpan data
     public function store(Request $request)
     {
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'age' => 'required|integer|min:1|max:120',
        'gender' => 'required|in:male,female',
        'customer-type' => 'required|in:single,bulk',
        'productbuy' => 'nullable|string|in:tococochips,alcoco,copa,cocofe',
        'bulk-quantity' => 'nullable|integer|min:10',
        'producttry.*' => 'nullable|string|in:tococochips,alcoco,copa,cocofe',
        'message' => 'nullable|string|max:1000',
        'frequency' => 'required|in:weekly,monthly,new-product'
    ]);

    $formData = new FormData();
    $formData->name = $request->input('name');
    $formData->phone = $request->input('phone');
    $formData->email = $request->input('email');
    $formData->age = $request->input('age');
    $formData->gender = $request->input('gender');
    $formData->customer_type = $request->input('customer-type');
    
    if ($request->input('customer-type') === 'single') {
        $formData->product_buy = $request->input('productbuy');
    }
    
    if ($request->input('customer-type') === 'bulk') {
        $formData->bulk_quantity = $request->input('bulk-quantity');
    }

    $formData->product_try = json_encode($request->input('producttry'));
    $formData->message = $request->input('message');
    $formData->frequency = $request->input('frequency');
    
    // Simpan data
    $formData->save();

    // Redirect atau response
    return redirect()->back()->with('success', 'Form submitted successfully!');
}

}

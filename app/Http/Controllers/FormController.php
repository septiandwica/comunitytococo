<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // Untuk menampilkan form (opsional)
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
        'frequency' => 'required|in:weekly,monthly,new-product'
    ]);

// Cek jika email sudah pernah melakukan submit sebelumnya
$existingOrder = FormData::where('email', $request->input('email'))->first();
if ($existingOrder) {
    return redirect()->back()->withErrors([
        'email' => 'Email sudah pernah digunakan silahkan gunakan email lain'
    ])->withInput();
}

// Jika tidak ada entri yang ditemukan, lanjutkan dengan menyimpan data
$formData = new FormData();
$formData->name = $request->input('name');
$formData->phone = $request->input('phone');
$formData->email = $request->input('email');
$formData->age = $request->input('age');
$formData->gender = $request->input('gender');
$formData->customer_type = $request->input('customer-type');

$points = 0;

// Perhitungan poin untuk pesanan single
if ($request->input('customer-type') === 'single') {
    $productBuy = $request->input('productbuy');
    $formData->product_buy = $productBuy;

    switch ($productBuy) {
        case 'alcoco':
            $points = 25;
            break;
        case 'tococochips':
            $points = 20;
            break;
        case 'copa':
            $points = 15;
            break;
        case 'cocofe':
            $points = 10;
            break;
    }
}

// Perhitungan poin untuk pesanan bulk
if ($request->input('customer-type') === 'bulk') {
    $bulkQuantity = $request->input('bulk-quantity');
    $formData->bulk_quantity = $bulkQuantity;
    $points = 15 * $bulkQuantity;
}

$formData->product_try = json_encode($request->input('producttry'));
$formData->frequency = $request->input('frequency');
$formData->points = $points; // Menyimpan poin ke database

// Simpan data
$formData->save();


// Redirect atau response
$whatsappNumber = '+6281392385176'; // Ganti dengan nomor WhatsApp yang sesuai

return redirect()->route('contribution.show', ['id' => $formData->id])
    ->with('success', [
        'message' => 'Selamat! Anda berhasil melakukan kontribusi.',
        'points' => $points, // Ganti dengan jumlah poin yang didapat
        'exchange_link' => 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode('Saya ingin menukarkan ' . $points . ' poin saya.')
    ]);
}

}

<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use GuzzleHttp\Client; // Import Guzzle client
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContributionController extends Controller
{
    // Halaman landing page
    public function showContribution($id)
    {
        // Ambil data form berdasarkan ID
        $formData = FormData::findOrFail($id);
    
        // Hitung total penjualan dari semua pelanggan (single dan bulk)
        $totalSingleSales = FormData::where('customer_type', 'single')->count(); // Total semua single purchases
        $totalBulkSales = FormData::where('customer_type', 'bulk')->sum('bulk_quantity'); // Total grosir
        $totalSales = $totalSingleSales + $totalBulkSales; // Gabungkan total dari single dan bulk
    
        // Hitung kontribusi pelanggan saat ini
        if ($totalSales > 0) {
            if ($formData->customer_type === 'single') {
                $contributionPercentage = (1 / $totalSales) * 100;
            } elseif ($formData->customer_type === 'bulk') {
                $contributionPercentage = ($formData->bulk_quantity / $totalSales) * 100;
            } else {
                $contributionPercentage = 0;
            }
        } else {
            $contributionPercentage = 0;
        }
    
        // Tentukan peringkat loyalitas berdasarkan kontribusi
        $loyaltyRank = $this->calculateLoyaltyRank($contributionPercentage);
    
        // Ambil semua data form dan kelompokkan berdasarkan email dan nama, tanpa duplikat
        $customerContributions = FormData::select('email', 'name', 'points')
            ->selectRaw('SUM(CASE WHEN customer_type = "single" THEN 1 ELSE 0 END) AS single_count')
            ->selectRaw('SUM(CASE WHEN customer_type = "bulk" THEN bulk_quantity ELSE 0 END) AS bulk_count')
            ->groupBy('email', 'name', 'points') // Group by email, name, dan points untuk menghindari duplikasi
            ->get();
    
        // Hitung total kontribusi untuk setiap email tanpa duplikat
        $customersWithContribution = [];
        foreach ($customerContributions as $customer) {
            $totalCustomerSales = $customer->single_count + $customer->bulk_count;
    
            if ($totalSales > 0) {
                $customerContribution = ($totalCustomerSales / $totalSales) * 100;
                $customersWithContribution[$customer->email] = [ // Gunakan email sebagai kunci unik untuk menghindari duplikasi
                    'email' => $customer->email,
                    'name' => $customer->name,
                    'points' => $customer->points,
                    'contribution' => $customerContribution,
                    'loyaltyRank' => $this->calculateLoyaltyRank($customerContribution)
                ];
            }
        }
    
        // Sort by contribution and take the top 3
        usort($customersWithContribution, function($a, $b) {
            return $b['contribution'] <=> $a['contribution'];
        });
    
        $top3Customers = array_slice($customersWithContribution, 0, 3);
    
        // Fetch external data
        $externalData = $this->fetchExternalData(); // Call method to fetch external data
    
        // Kirim data ke view
        return view('contribution', [
            'formData' => $formData,
            'contribution' => $contributionPercentage,
            'loyaltyRank' => $loyaltyRank,
            'top3Customers' => $top3Customers,
            'externalData' => $externalData, // Pass external data to the view
        ]);
    }
    
    // Fungsi untuk menghitung peringkat loyalitas
    private function calculateLoyaltyRank($contributionPercentage)
    {
        if ($contributionPercentage >= 75) {
            return 'Master Pengupas Kelapa'; // Peringkat tertinggi
        } elseif ($contributionPercentage >= 50) {
            return 'Petani Kelapa Berpengalaman'; // Peringkat menengah
        } elseif ($contributionPercentage >= 25) {
            return 'Petani Pemula'; // Peringkat rendah
        } else {
            return 'Pendukung Kelapa'; // Peringkat dasar
        }
    }

    // Method untuk mengambil data dari API eksternal
    private function fetchExternalData()
    {
        // Buat client Guzzle
        
        // Mengambil data dari API eksternal
        try {
            $response = Http::get('http://tococoindonesia.com/blogs'); // Ganti dengan endpoint API yang sesuai
            return $response->json(); // Kembalikan data yang diambil
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return []; // Kembalikan array kosong jika gagal
        }
    }
}

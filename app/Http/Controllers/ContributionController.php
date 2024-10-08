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
        // Fetch form data by ID
        $formData = FormData::findOrFail($id);
        
        // Calculate total points from all customers
        $totalPoints = FormData::sum('points');

        // Calculate customer contribution percentage
        $customerContributionPercent = ($formData->points / $totalPoints) * 100;

        // Assume there are 50 impacted farmers
        $farmersImpacted = 50;

        // Calculate how many farmers benefited
        $farmersBenefited = ($customerContributionPercent / 100) * $farmersImpacted;

        // Fetch external blog data
        $externalData = $this->fetchExternalData();


        // Calculate loyalty rank based on points
        $loyaltyRank = $this->calculateLoyaltyRank($formData->points);

        // Get the top 3 customers (for demonstration, we will fetch from the same table)
        $top3Customers = FormData::orderBy('points', 'desc')->take(3)->get();

        
        return view('contribution', [
            'formData' => $formData,
            'customerContributionPercent' => $customerContributionPercent,
            'farmersBenefited' => $farmersBenefited,
            'loyaltyRank' => $loyaltyRank,
            'top3Customers' => $top3Customers,
            'blogs' => $externalData['blogs'], // Pass blogs data to the view
            'products' => $externalData['products'], // Pass products data to the view
        ]);
    }
    
    private function fetchExternalData()
    {
        try {
            // Fetch data from the blogs API
            $blogsResponse = Http::get('https://tococoindonesia.com/api/blogs');
            $blogsData = $blogsResponse->json();
    
            // Fetch data from the products API
            $productsResponse = Http::get('http://tococoindonesia.com/api/products');
            $productsData = $productsResponse->json();
    
            // Return both data sets in an associative array
            return [
                'blogs' => $blogsData['data'] ?? [], // Use the null coalescing operator in case 'data' is missing
                'products' => $productsData['data'] ?? [], // Use the null coalescing operator in case 'data' is missing
            ];
        } catch (\Exception $e) {
            // Handle error if it occurs
            return [
                'blogs' => [],
                'products' => [],
            ]; // Return empty arrays if the API call fails
        }
    }
    
    private function calculateLoyaltyRank($points)
    {
        if ($points >= 500) {
            return 'Master Pengupas Kelapa';
        } elseif ($points >= 300) {
            return 'Petani Kelapa Berpengalaman';
        } elseif ($points >= 100) {
            return 'Petani Pemula';
        } else {
            return 'Pendukung Kelapa';
        }
    }

}

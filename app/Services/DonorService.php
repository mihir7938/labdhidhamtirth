<?php

namespace App\Services;

use App\Models\DonorCategory;
use App\Models\Donor;

class DonorService
{

    public function getAllDonors($per_page = -1)
    {
        if($per_page == -1){
            return Donor::orderBy('created_at', 'desc')->get();    
        }
        return Donor::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getDonorById($id)
    {
        return Donor::find($id);
    }

    public function create($data)
    {
        return Donor::create($data);
    }

    public function update($donor, $data)
    {
        return $donor->update($data);
    }

    public function delete($donor)
    {
        return $donor->delete($donor);
    }

    public function getAllDonorCategories($per_page = -1)
    {
        if($per_page == -1){
            return DonorCategory::orderBy('created_at', 'desc')->get();    
        }
        return DonorCategory::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getDonorCategoryById($id)
    {
        return DonorCategory::find($id);
    }
    
    public function create_donor_category($data)
    {
        return DonorCategory::create($data);
    }

    public function update_donor_category($donor_category, $data)
    {
        return $donor_category->update($data);
    }

    public function delete_donor_category($donor_category)
    {
        return $donor_category->delete($donor_category);
    }

    public function getDonorsByCatId($id)
    {
        return Donor::where('category_id', $id)->get();
    }
    
}

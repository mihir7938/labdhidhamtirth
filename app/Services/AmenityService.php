<?php

namespace App\Services;

use App\Models\Amenity;

class AmenityService
{

    public function getAllAmenities($per_page = -1)
    {
        if($per_page == -1){
            return Amenity::orderBy('created_at', 'desc')->get();    
        }
        return Amenity::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getAmenityById($id)
    {
        return Amenity::find($id);
    }

    public function create($data)
    {
        return Amenity::create($data);
    }

    public function update($amenity, $data)
    {
        return $amenity->update($data);
    }

    public function delete($amenity)
    {
        return $amenity->delete($amenity);
    }
}

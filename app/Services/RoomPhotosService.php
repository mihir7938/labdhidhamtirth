<?php

namespace App\Services;

use App\Models\RoomPhotoCategory;
use App\Models\RoomPhoto;

class RoomPhotosService
{

    public function getAllRoomPhotos($per_page = -1)
    {
        if($per_page == -1){
            return RoomPhoto::orderBy('created_at', 'desc')->get();    
        }
        return RoomPhoto::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getRoomPhotoById($id)
    {
        return RoomPhoto::find($id);
    }

    public function create($data)
    {
        return RoomPhoto::create($data);
    }

    public function update($room_photo, $data)
    {
        return $room_photo->update($data);
    }

    public function delete($room_photo)
    {
        return $room_photo->delete($room_photo);
    }

    public function getAllRoomPhotoCategories($per_page = -1)
    {
        if($per_page == -1){
            return RoomPhotoCategory::orderBy('created_at', 'desc')->get();    
        }
        return RoomPhotoCategory::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getRoomPhotoCategoryById($id)
    {
        return RoomPhotoCategory::find($id);
    }
    
    public function create_room_photo_category($data)
    {
        return RoomPhotoCategory::create($data);
    }

    public function update_room_photo_category($room_photo_category, $data)
    {
        return $room_photo_category->update($data);
    }

    public function delete_room_photo_category($room_photo_category)
    {
        return $room_photo_category->delete($room_photo_category);
    }

    public function getRoomPhotosByCatId($id)
    {
        return RoomPhoto::where('category_id', $id)->get();
    }
    
}

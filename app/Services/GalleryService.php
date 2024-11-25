<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Photo;

class GalleryService
{

    public function getAllAlbums($per_page = -1)
    {
        if($per_page == -1){
            return Album::orderBy('created_at', 'desc')->get();    
        }
        return Album::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getAlbumById($id)
    {
        return Album::find($id);
    }

    public function createAlbum($data)
    {
        return Album::create($data);
    }

    public function updateAlbum($album, $data)
    {
        return $album->update($data);
    }

    public function deleteAlbum($album)
    {
        return $album->delete($album);
    }

    public function getAllPhotos($per_page = -1)
    {
        if($per_page == -1){
            return Photo::orderBy('created_at', 'desc')->get();    
        }
        return Photo::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getPhotoById($id)
    {
        return Photo::find($id);
    }

    public function createPhoto($data)
    {
        return Photo::create($data);
    }

    public function updatePhoto($photo, $data)
    {
        return $photo->update($data);
    }

    public function deletePhoto($photo)
    {
        return $photo->delete($photo);
    }

    public function getPhotosByAlbumId($id)
    {
        return Photo::where('album_id', $id)->get();
    }

}

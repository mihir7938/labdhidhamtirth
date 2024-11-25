<?php

namespace App\Services;

use App\Models\News;

class NewsService
{

    public function getAllNews($per_page = -1)
    {
        if($per_page == -1){
            return News::orderBy('created_at', 'desc')->get();    
        }
        return News::orderBy('created_at', 'desc')->paginate($per_page);
    }

    public function getNewsById($id)
    {
        return News::find($id);
    }

    public function create($data)
    {
        return News::create($data);
    }

    public function update($news, $data)
    {
        return $news->update($data);
    }

    public function delete($news)
    {
        return $news->delete($news);
    }
}

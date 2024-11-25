<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\NewsService;
use App\Services\DonorService;
use App\Services\RoomPhotosService;
use App\Services\GalleryService;
use App\Services\PackageService;
use App\Services\EventService;
use App\Services\AmenityService;
use App\Services\RoomService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AdminController extends Controller {

	private $imageService, $newsService, $donorService, $roomPhotosService, $galleryService, $packageService, $eventService, $amenityService, $roomService;

    public function __construct( 
    	UploadImageService $imageService,
        NewsService $newsService,
    	DonorService $donorService,
        RoomPhotosService $roomPhotosService,
        GalleryService $galleryService,
        PackageService $packageService,
        EventService $eventService,
        AmenityService $amenityService,
        RoomService $roomService
    )
    {
    	$this->imageService = $imageService;
        $this->newsService = $newsService;
        $this->donorService = $donorService;
        $this->roomPhotosService = $roomPhotosService;
        $this->galleryService = $galleryService;
        $this->packageService = $packageService;
        $this->eventService = $eventService;
        $this->amenityService = $amenityService;
        $this->roomService = $roomService;
    }

    public function index(Request $request)
    {
        $upcomingBooking = $this->roomService->getUpcomingBooking();
        return view('admin.index')->with('upcomingBooking', $upcomingBooking);
    }
    public function viewBooking(Request $request, $id)
    {
        $bookingDetails = $this->roomService->getDetailsByBookingId($id);
        return view('admin.view')->with('bookingDetails', $bookingDetails);
    }
    public function getNews()
    {
        $news = $this->newsService->getAllNews();
        return view('admin.news.index')->with('news', $news);
    }
    public function addNews()
    {
        return view('admin.news.add');
    }
    public function saveNews(Request $request)
    {
        $data = $request->all();
        $data['content'] = $request->txtcontent;
        $filename = $this->imageService->uploadFile($request->image, "assets/news/images");
        $data['image'] = '/news/images/'.$filename;
        if($request->has('pdf')){
            $filename_pdf = $this->imageService->uploadFile($request->pdf, "assets/news/pdf");
            $data['pdf'] = '/news/pdf/'.$filename_pdf;
        }
        $this->newsService->create($data);
        $request->session()->put('message', 'News has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.news');
    }
    public function editNews(Request $request, $id)
    {
        try{
            $news = $this->newsService->getNewsById($id);
            if(!$news){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.news.edit')->with('news', $news);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.news');
        }
    }
    public function updateNews(Request $request)
    {
        try{
            $news = $this->newsService->getNewsById($request->id);
            if(!$news){
                throw new BadRequestException('Invalid Request id');
            }
            $data['title'] = $request->title;
            $data['content'] = $request->txtcontent;
            if($request->has('image')){
                $filepath = public_path('assets/' . $news->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/news/images");
                $data['image'] = '/news/images/'.$filename;
            }
            if($request->has('pdf')){
                $filepath_pdf = public_path('assets/' . $news->pdf);
                $this->imageService->deleteFile($filepath_pdf);
                $filename_pdf = $this->imageService->uploadFile($request->pdf, "assets/news/pdf");
                $data['pdf'] = '/news/pdf/'.$filename_pdf;
            }
            $this->newsService->update($news, $data);
            $request->session()->put('message', 'News has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.news');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.news');
        }
    }
    public function deleteNews(Request $request, $id)
    {
        try{
            $news = $this->newsService->getNewsById($id);
            if(!$news){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $news->image);
            $this->imageService->deleteFile($filepath);
            $filepath_pdf = public_path('assets/' . $news->pdf);
            $this->imageService->deleteFile($filepath_pdf);
            $this->newsService->delete($news);
            $request->session()->put('message', 'News has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.news');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.news');
        }
    }
    public function getDonors()
	{
        $donors = $this->donorService->getAllDonors();
 		return view('admin.donors.index')->with('donors', $donors);
	}
    public function addDonors()
	{
        $donorCategories = $this->donorService->getAllDonorCategories();
 		return view('admin.donors.add')->with('donorCategories', $donorCategories);
	}
    public function saveDonors(Request $request)
    {
        $data['category_id'] = $request->category;
        $data['title'] = $request->title;
        $data['content'] = $request->txtcontent;
        $filename = $this->imageService->uploadFile($request->image, "assets/donors");
        $data['image'] = '/donors/'.$filename;
        $this->donorService->create($data);
        $request->session()->put('message', 'Donor has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.donors');
    }
    public function editDonor(Request $request, $id)
    {
        try{
            $donor = $this->donorService->getDonorById($id);
            $donorCategories = $this->donorService->getAllDonorCategories();
            if(!$donor){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.donors.edit')->with('donor', $donor)->with('donorCategories', $donorCategories);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors');
        }
    }
    public function updateDonor(Request $request)
    {
        try{
            $donor = $this->donorService->getDonorById($request->id);
            if(!$donor){
                throw new BadRequestException('Invalid Request id');
            }
            $data['category_id'] = $request->category;
            $data['title'] = $request->title;
            $data['content'] = $request->txtcontent;
            if($request->has('image')){
                $filepath = public_path('assets/' . $donor->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/donors");
                $data['image'] = '/donors/'.$filename;
            }
            $this->donorService->update($donor, $data);
            $request->session()->put('message', 'Donor has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.donors');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors');
        }
    }
    public function deleteDonor(Request $request, $id)
    {
        try{
            $donor = $this->donorService->getDonorById($id);
            if(!$donor){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $donor->image);
            $this->imageService->deleteFile($filepath);
            $this->donorService->delete($donor);
            $request->session()->put('message', 'Donor has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.donors');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors');
        }
    }
	public function getDonorCategories()
	{
		$donorCategories = $this->donorService->getAllDonorCategories();
 		return view('admin.donors.categories')->with('donorCategories', $donorCategories);
	}
	public function addDonorCategory()
	{
 		return view('admin.donors.add-category');
	}
	public function saveDonorCategory(Request $request)
	{
		$data = $request->all();
        $filename = $this->imageService->uploadFile($request->image, "assets/donor_categories");
        $data['image'] = '/donor_categories/'.$filename;
        $this->donorService->create_donor_category($data);
		$request->session()->put('message', 'Donor Category has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.donors.categories');
	}
	public function editDonorCategory(Request $request, $id)
	{
        try{
            $donor_category = $this->donorService->getDonorCategoryById($id);
            if(!$donor_category){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.donors.edit-category')->with('donor_category', $donor_category);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors.categories');
        }
	}
	public function updateDonorCategory(Request $request)
	{
        try{
            $donor_category = $this->donorService->getDonorCategoryById($request->id);
            if(!$donor_category){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            if($request->has('image')){
                $filepath = public_path('assets/' . $donor_category->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/donor_categories");
                $data['image'] = '/donor_categories/'.$filename;
            }
            $this->donorService->update_donor_category($donor_category, $data);
            $request->session()->put('message', 'Donor Category has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.donors.categories');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors.categories');
        }
	}
	public function deleteDonorCategory(Request $request, $id)
	{
        try{
            $donor_category = $this->donorService->getDonorCategoryById($id);
            if(!$donor_category){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $donor_category->image);
            $this->imageService->deleteFile($filepath);
            $this->donorService->delete_donor_category($donor_category);
            $request->session()->put('message', 'Donor Category has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.donors.categories');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.donors.categories');
        }
	}
    public function getRoomPhotos()
    {
        $room_photos = $this->roomPhotosService->getAllRoomPhotos();
        return view('admin.room_photos.index')->with('room_photos', $room_photos);
    }
    public function addRoomPhotos()
    {
        $roomPhotoCategories = $this->roomPhotosService->getAllRoomPhotoCategories();
        return view('admin.room_photos.add')->with('roomPhotoCategories', $roomPhotoCategories);
    }
    public function saveRoomPhotos(Request $request)
    {
        $data['category_id'] = $request->category;
        $filename = $this->imageService->uploadFile($request->image, "assets/room_photos");
        $data['image'] = '/room_photos/'.$filename;
        $this->roomPhotosService->create($data);
        $request->session()->put('message', 'Room Photo has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.room.photos');
    }
    public function editRoomPhotos(Request $request, $id)
    {
        try{
            $room_photo = $this->roomPhotosService->getRoomPhotoById($id);
            $roomPhotoCategories = $this->roomPhotosService->getAllRoomPhotoCategories();
            if(!$room_photo){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.room_photos.edit')->with('room_photo', $room_photo)->with('roomPhotoCategories', $roomPhotoCategories);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos');
        }
    }
    public function updateRoomPhotos(Request $request)
    {
        try{
            $room_photo = $this->roomPhotosService->getRoomPhotoById($request->id);
            if(!$room_photo){
                throw new BadRequestException('Invalid Request id');
            }
            $data['category_id'] = $request->category;
            if($request->has('image')){
                $filepath = public_path('assets/' . $room_photo->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/room_photos");
                $data['image'] = '/room_photos/'.$filename;
            }
            $this->roomPhotosService->update($room_photo, $data);
            $request->session()->put('message', 'Room Photo has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.room.photos');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos');
        }
    }
    public function deleteRoomPhotos(Request $request, $id)
    {
        try{
            $room_photo = $this->roomPhotosService->getRoomPhotoById($id);
            if(!$room_photo){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $room_photo->image);
            $this->imageService->deleteFile($filepath);
            $this->roomPhotosService->delete($room_photo);
            $request->session()->put('message', 'Room Photo has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.room.photos');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos');
        }
    }
    public function addBulkRoomPhotos()
    {
        $roomPhotoCategories = $this->roomPhotosService->getAllRoomPhotoCategories();
        return view('admin.room_photos.add-bulk')->with('roomPhotoCategories', $roomPhotoCategories);
    }
    public function saveBulkRoomPhotos(Request $request)
    {
        $data['category_id'] = $request->category;
        foreach($request->image as $img) {
            $filename = $this->imageService->uploadFile($img, "assets/room_photos");
            $data['image'] = '/room_photos/'.$filename;
            $this->roomPhotosService->create($data);
        }
        $request->session()->put('message', 'Room Photos has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.room.photos');
    }
    public function getRoomPhotoCategories()
    {
        $roomPhotoCategories = $this->roomPhotosService->getAllRoomPhotoCategories();
        return view('admin.room_photos.categories')->with('roomPhotoCategories', $roomPhotoCategories);
    }
    public function addRoomPhotoCategory()
    {
        return view('admin.room_photos.add-category');
    }
    public function saveRoomPhotoCategory(Request $request)
    {
        $data = $request->all();
        $filename = $this->imageService->uploadFile($request->image, "assets/room_photo_categories");
        $data['image'] = '/room_photo_categories/'.$filename;
        $this->roomPhotosService->create_room_photo_category($data);
        $request->session()->put('message', 'Room Photo Category has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.room.photos.categories');
    }
    public function editRoomPhotoCategory(Request $request, $id)
    {
        try{
            $room_photo_category = $this->roomPhotosService->getRoomPhotoCategoryById($id);
            if(!$room_photo_category){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.room_photos.edit-category')->with('room_photo_category', $room_photo_category);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos.categories');
        }
    }
    public function updateRoomPhotoCategory(Request $request)
    {
        try{
            $room_photo_category = $this->roomPhotosService->getRoomPhotoCategoryById($request->id);
            if(!$room_photo_category){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            if($request->has('image')){
                $filepath = public_path('assets/' . $room_photo_category->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/room_photo_categories");
                $data['image'] = '/room_photo_categories/'.$filename;
            }
            $this->roomPhotosService->update_room_photo_category($room_photo_category, $data);
            $request->session()->put('message', 'Room Photo Category has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.room.photos.categories');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos.categories');
        }
    }
    public function deleteRoomPhotoCategory(Request $request, $id)
    {
        try{
            $room_photo_category = $this->roomPhotosService->getRoomPhotoCategoryById($id);
            if(!$room_photo_category){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $room_photo_category->image);
            $this->imageService->deleteFile($filepath);
            $this->roomPhotosService->delete_room_photo_category($room_photo_category);
            $request->session()->put('message', 'Room Photo Category has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.room.photos.categories');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.room.photos.categories');
        }
    }
    public function getAlbums()
    {
        $albums = $this->galleryService->getAllAlbums();
        return view('admin.gallery.albums')->with('albums', $albums);
    }
    public function addAlbum()
    {
        return view('admin.gallery.add-album');
    }
    public function saveAlbum(Request $request)
    {
        $data = $request->all();
        $filename = $this->imageService->uploadFile($request->image, "assets/albums");
        $data['image'] = '/albums/'.$filename;
        $this->galleryService->createAlbum($data);
        $request->session()->put('message', 'Album has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.albums');
    }
    public function editAlbum(Request $request, $id)
    {
        try{
            $album = $this->galleryService->getAlbumById($id);
            if(!$album){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.gallery.edit-album')->with('album', $album);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.albums');
        }
    }
    public function updateAlbum(Request $request)
    {
        try{
            $album = $this->galleryService->getAlbumById($request->id);
            if(!$album){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            if($request->has('image')){
                $filepath = public_path('assets/' . $album->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/albums");
                $data['image'] = '/albums/'.$filename;
            }
            $this->galleryService->updateAlbum($album, $data);
            $request->session()->put('message', 'Album has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.albums');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.albums');
        }
    }
    public function deleteAlbum(Request $request, $id)
    {
        try{
            $album = $this->galleryService->getAlbumById($id);
            if(!$album){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $album->image);
            $this->imageService->deleteFile($filepath);
            $this->galleryService->deleteAlbum($album);
            $request->session()->put('message', 'Album has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.albums');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.albums');
        }
    }
    public function getPhotos()
    {
        $photos = $this->galleryService->getAllPhotos();
        return view('admin.gallery.photos')->with('photos', $photos);
    }
    public function addPhoto()
    {
        $albums = $this->galleryService->getAllAlbums();
        return view('admin.gallery.add-photo')->with('albums', $albums);
    }
    public function savePhoto(Request $request)
    {
        $data['album_id'] = $request->album;
        $data['title'] = $request->title;
        $data['content'] = $request->txtcontent;
        $filename = $this->imageService->uploadFile($request->image, "assets/photos");
        $data['image'] = '/photos/'.$filename;
        $this->galleryService->createPhoto($data);
        $request->session()->put('message', 'Photo has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.photos');
    }
    public function editPhoto(Request $request, $id)
    {
        try{
            $photo = $this->galleryService->getPhotoById($id);
            $albums = $this->galleryService->getAllAlbums();
            if(!$photo){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.gallery.edit-photo')->with('photo', $photo)->with('albums', $albums);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.photos');
        }
    }
    public function updatePhoto(Request $request)
    {
        try{
            $photo = $this->galleryService->getPhotoById($request->id);
            if(!$photo){
                throw new BadRequestException('Invalid Request id');
            }
            $data['album_id'] = $request->album;
            $data['title'] = $request->title;
            $data['content'] = $request->txtcontent;
            if($request->has('image')){
                $filepath = public_path('assets/' . $photo->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/photos");
                $data['image'] = '/photos/'.$filename;
            }
            $this->galleryService->updatePhoto($photo, $data);
            $request->session()->put('message', 'Photo has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.photos');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.photos');
        }
    }
    public function deletePhoto(Request $request, $id)
    {
        try{
            $photo = $this->galleryService->getPhotoById($id);
            if(!$photo){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $photo->image);
            $this->imageService->deleteFile($filepath);
            $this->galleryService->deletePhoto($photo);
            $request->session()->put('message', 'Photo has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.photos');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.photos');
        }
    }
    public function getPackages()
    {
        $packages = $this->packageService->getAllPackages();
        return view('admin.packages.index')->with('packages', $packages);
    }
    public function addPackage()
    {
        return view('admin.packages.add');
    }
    public function savePackage(Request $request)
    {
        $data = $request->all();
        $filename = $this->imageService->uploadFile($request->image, "assets/packages");
        $data['image'] = '/packages/'.$filename;
        $this->packageService->create($data);
        $request->session()->put('message', 'Anuthan Packege has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.packages');
    }
    public function editPackage(Request $request, $id)
    {
        try{
            $package = $this->packageService->getPackageById($id);
            if(!$package){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.packages.edit')->with('package', $package);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.packages');
        }
    }
    public function updatePackage(Request $request)
    {
        try{
            $package = $this->packageService->getPackageById($request->id);
            if(!$package){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            if($request->has('image')){
                $filepath = public_path('assets/' . $package->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/packages");
                $data['image'] = '/packages/'.$filename;
            }
            $this->packageService->update($package, $data);
            $request->session()->put('message', 'Anuthan Packege has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.packages');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.packages');
        }
    }
    public function deletePackage(Request $request, $id)
    {
        try{
            $package = $this->packageService->getPackageById($id);
            if(!$package){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $package->image);
            $this->imageService->deleteFile($filepath);
            $this->packageService->delete($package);
            $request->session()->put('message', 'Anuthan Packege has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.packages');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.packages');
        }
    }
    public function getEvents()
    {
        $events = $this->eventService->getAllEvents();
        return view('admin.events.index')->with('events', $events);
    }
    public function addEvent()
    {
        return view('admin.events.add');
    }
    public function saveEvent(Request $request)
    {
        $data = $request->all();
        $filename = $this->imageService->uploadFile($request->image, "assets/events");
        $data['image'] = '/events/'.$filename;
        $this->eventService->create($data);
        $request->session()->put('message', 'Event has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.events');
    }
    public function editEvent(Request $request, $id)
    {
        try{
            $event = $this->eventService->getEventById($id);
            if(!$event){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.events.edit')->with('event', $event);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.events');
        }
    }
    public function updateEvent(Request $request)
    {
        try{
            $event = $this->eventService->getEventById($request->id);
            if(!$event){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            if($request->has('image')){
                $filepath = public_path('assets/' . $event->image);
                $this->imageService->deleteFile($filepath);
                $filename = $this->imageService->uploadFile($request->image, "assets/events");
                $data['image'] = '/events/'.$filename;
            }
            $this->eventService->update($event, $data);
            $request->session()->put('message', 'Event has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.events');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.events');
        }
    }
    public function deleteEvent(Request $request, $id)
    {
        try{
            $event = $this->eventService->getEventById($id);
            if(!$event){
                throw new BadRequestException('Invalid Request id.');
            }
            $filepath = public_path('assets/' . $event->image);
            $this->imageService->deleteFile($filepath);
            $this->eventService->delete($event);
            $request->session()->put('message', 'Event has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.events');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.events');
        }
    }
    public function getAmenities()
    {
        $amenities = $this->amenityService->getAllAmenities();
        return view('admin.amenities.index')->with('amenities', $amenities);
    }
    public function addAmenity()
    {
        return view('admin.amenities.add');
    }
    public function saveAmenity(Request $request)
    {
        $data = $request->all();
        $this->amenityService->create($data);
        $request->session()->put('message', 'Amenity has been added successfully.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->route('admin.amenities');
    }
    public function editAmenity(Request $request, $id)
    {
        try{
            $amenity = $this->amenityService->getAmenityById($id);
            if(!$amenity){
                throw new BadRequestException('Invalid Request id');
            }
            return view('admin.amenities.edit')->with('amenity', $amenity);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.amenities');
        }
    }
    public function updateAmenity(Request $request)
    {
        try{
            $amenity = $this->amenityService->getAmenityById($request->id);
            if(!$amenity){
                throw new BadRequestException('Invalid Request id');
            }
            $data = $request->all();
            $this->amenityService->update($amenity, $data);
            $request->session()->put('message', 'Amenity has been updated successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.amenities');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.amenities');
        }
    }
    public function deleteAmenity(Request $request, $id)
    {
        try{
            $amenity = $this->amenityService->getAmenityById($id);
            if(!$amenity){
                throw new BadRequestException('Invalid Request id.');
            }
            $this->amenityService->delete($amenity);
            $request->session()->put('message', 'Amenity has been deleted successfully.');
            $request->session()->put('alert-type', 'alert-success');
            return redirect()->route('admin.amenities');
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('admin.amenities');
        }
    }
}
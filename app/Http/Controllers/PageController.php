<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\RoomType;
use App\Models\RoomBooking;
use App\Services\PackageService;
use App\Services\EventService;
use App\Services\DonorService;
use App\Services\RoomService;
use App\Services\RoomPhotosService;
use App\Services\GalleryService;
use App\Services\NewsService;
use App\Services\EmailService;
use App\Services\UploadImageService;
use App\Services\AmenityService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    private $packageService, $eventService, $donorService, $roomService, $roomPhotosService, $galleryService, $newsService, $emailService, $imageService, $amenityService;

    public function __construct(
        PackageService $packageService,
        EventService $eventService,
        DonorService $donorService,
        RoomService $roomService,
        RoomPhotosService $roomPhotosService,
        GalleryService $galleryService,
        NewsService $newsService,
        EmailService $emailService,
        UploadImageService $imageService,
        AmenityService $amenityService
    )
    {
        $this->packageService = $packageService;
        $this->eventService = $eventService;
        $this->donorService = $donorService;
        $this->roomService = $roomService;
        $this->roomPhotosService = $roomPhotosService;
        $this->galleryService = $galleryService;
        $this->newsService = $newsService;
        $this->emailService = $emailService;
        $this->imageService = $imageService;
        $this->amenityService = $amenityService;
    }

    public function index(Request $request)
    {
        $roomTypes = $this->roomService->getAllRoomTypes();
        $news = $this->newsService->getAllNews();
        $packages = $this->packageService->getAllPackages();
        $events = $this->eventService->getAllEvents();
        return view('index')->with('roomTypes', $roomTypes)->with('news', $news)->with('packages', $packages)->with('events', $events);
    }
    public function setSession(Request $request)
    {
        $search_array = [
            'checkin_date' => $request->checkin_date,
            'days' => $request->days,
            'room_types' => $request->room_types,
        ];
        $request->session()->put('search_values', $search_array);
        return redirect()->route('room');
    }
    public function getSingleNews(Request $request, $id)
    {
        try{
            $news = $this->newsService->getNewsById($id);
            if(!$news){
                throw new BadRequestException('Invalid Request id');
            }
            return view('single-news')->with('news', $news);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('index');
        }
    }
    public function about(Request $request)
    {
        return view('about');
    }
    public function donor(Request $request)
    {
        $donorCategories = $this->donorService->getAllDonorCategories();
        return view('donor')->with('donorCategories', $donorCategories);
    }
    public function getDonor(Request $request, $id)
    {
        try{
            $donors = $this->donorService->getDonorsByCatId($id);
            if(count($donors) <= 0){
                throw new BadRequestException('Invalid Request');
            }
            $donor_category = $this->donorService->getDonorCategoryById($id);
            return view('single-donor')->with('donors', $donors)->with('donor_category', $donor_category);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('donor');
        }
    }
    public function room(Request $request)
    {
        $roomTypes = $this->roomService->getAllRoomTypes();
        $search_values = [];
        $booking_tag = [];
        $rooms = [];
        $booked_rooms = [];
        $booked_room_ids = [];
        if($request->session()->get('search_values')) {
            $search_values = $request->session()->get('search_values');
            $room_type = RoomType::find($search_values['room_types']);
            $booking_tag = [
                'days' => $search_values['days'],
                'checkin_date' => date("d M Y", strtotime($search_values['checkin_date'])),
                'checkin_time' => date("g:i a", strtotime($room_type->checkintime)),
                'checkout_date' => date('d M Y', strtotime($search_values['checkin_date']. ' + '.$search_values['days'].' days')),
                'checkout_time' => date("g:i a", strtotime($room_type->checkouttime)),
            ];
            $filters = [
                'room_type' => $search_values['room_types'] ? $search_values['room_types'] : '',
            ];
            $rooms = $this->roomService->searchRooms($filters);
            $booked_rooms = $this->roomService->bookedRooms($filters['room_type'], date('Y-m-d', strtotime($search_values['checkin_date'])), date('Y-m-d', strtotime($search_values['checkin_date'].'+'.$search_values['days'].' days')));
            foreach($booked_rooms as $room) {
                $booked_room_ids[] = $room->id;
            }
        }
        return view('room')->with('roomTypes', $roomTypes)->with('search_values', $search_values)->with('booking_tag', $booking_tag)->with('rooms', $rooms)->with('booked_room_ids', $booked_room_ids);
    }
    public function searchRooms(Request $request)
    {
        $room_type = RoomType::find($request->get('room_types'));
        $booking_tag = [
            'days' => $request->get('days'),
            'checkin_date' => date("d M Y", strtotime($request->get('checkin_date'))),
            'checkin_time' => date("g:i a", strtotime($room_type->checkintime)),
            'checkout_date' => date('d M Y', strtotime($request->get('checkin_date'). ' + '.$request->get('days').' days')),
            'checkout_time' => date("g:i a", strtotime($room_type->checkouttime)),
        ];
        $filters = [
            'room_type' => $request->has('room_types') ? $request->get('room_types') : '',
        ];
        $rooms = $this->roomService->searchRooms($filters);
        $search_array = [
            'checkin_date' => $request->get('checkin_date'),
            'days' => $request->get('days'),
            'room_types' => $request->get('room_types'),
        ];
        $request->session()->put('search_values', $search_array);
        $search_values = $request->session()->get('search_values');
        $booked_room_ids = [];
        $booked_rooms = $this->roomService->bookedRooms($filters['room_type'], date('Y-m-d', strtotime($search_values['checkin_date'])), date('Y-m-d', strtotime($search_values['checkin_date'].'+'.$search_values['days'].' days')));
        foreach($booked_rooms as $room) {
            $booked_room_ids[] = $room->id;
        }
        return view('search')->with('booking_tag', $booking_tag)->with('rooms', $rooms)->with('booked_room_ids', $booked_room_ids)->render();
    }
    public function amenities(Request $request)
    {
        $amenities = $this->amenityService->getAllAmenities();
        return view('amenities')->with('amenities', $amenities);
    }
    public function bookingRooms(Request $request)
    {
        $search_values = $request->session()->get('search_values');
        $max_booking_id = RoomBooking::max('booking_id');
        if (!$max_booking_id) {
            $max_booking_id = 1;
        } else {
            $max_booking_id = $max_booking_id + 1;
        }
        $room_type = RoomType::find($search_values['room_types']);
        foreach($request->room as $key => $value) {
            $booking = new RoomBooking;
            $booking->booking_id = $max_booking_id;
            $booking->user_id = Auth::user()->id;
            $booking->check_in_date = date('Y-m-d', strtotime($search_values['checkin_date']));
            $booking->check_in_time = date("H:i:s", strtotime($room_type->checkintime));
            $booking->check_out_date = date('Y-m-d', strtotime($search_values['checkin_date'].'+'.$search_values['days'].' days'));
            $booking->check_out_time = date("H:i:s", strtotime($room_type->checkouttime));
            $booking->days = $search_values['days'];
            $booking->room_type_id = $search_values['room_types'];
            $booking->room_id = $key;
            $booking->status = '1';
            $booking->save();
        }
        $search_array = [
            'checkin_date' => $search_values['checkin_date'],
            'days' => $search_values['days'],
            'room_types' => $search_values['room_types'],
            'selected_rooms' => implode(',', $request->room),
            'booking_id' => $max_booking_id,
        ];
        $request->session()->put('search_values', $search_array);
        return redirect()->route('booking');
    }
    public function booking(Request $request)
    {
        if(!$request->session()->get('search_values')) {
            return redirect(route('room'));
        }
        $search_values = $request->session()->get('search_values');
        $booking_rooms = $this->roomService->getDetailsByBookingId($search_values['booking_id']);
        return view('booking')->with('booking_id', $search_values['booking_id'])->with('booking_rooms', $booking_rooms);
    }
    public function updateRoomDetails(Request $request)
    {
        $total_amount = 0;
        foreach($request->extrabed as $key=>$val) {
            $room_booking = RoomBooking::find($key);
            $total = $room_booking->room->amount + ($room_booking->room->extrabedamt*$val);
            $total_amount = $total_amount + $total;
            $amount[$key] = $total;
            $extrabed[$key] = $val;
        }
        $booking_rooms = $this->roomService->getDetailsByBookingId($request->booking_id);
        return view('room-details')->with('extrabed', $extrabed)->with('amount', $amount)->with('total_amount', $total_amount)->with('booking_rooms', $booking_rooms)->render();
    }
    public function saveBooking(Request $request)
    {
        $filename = '';
        if($request->has('id_proof_doc')){
            $room_data = RoomBooking::where('booking_id', $request->booking_id)->first();
            $document_path = public_path('assets/' . $room_data->id_proof_document);
            $this->imageService->deleteFile($document_path);
            $file_path = 'assets/documents/'.$request->id_proof;
            $filename = $this->imageService->uploadFile($request->id_proof_doc, $file_path);
        }
        foreach($request->extrabed as $key=>$val) {
            $room_booking = RoomBooking::find($key);
            $data['extra_bed'] = $val;
            $data['amount'] = $room_booking->room->amount + ($room_booking->room->extrabedamt*$val);
            $data['total_amount'] = $request->total_amount;
            $data['customer_name'] = $request->customer_name;
            $data['company_name'] = $request->company_name;
            $data['address'] = $request->address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['gender'] = $request->gender;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['id_proof'] = $request->id_proof;
            if($filename) {
                $data['id_proof_document'] = '/documents/'.$request->id_proof.'/'.$filename;
            }
            $data['status'] = '2';
            $this->roomService->update($room_booking, $data);
        }
        return redirect()->route('booking.summary');
    }
    public function bookingSummary(Request $request)
    {
        if(!$request->session()->get('search_values')) {
            return redirect(route('room'));
        }
        $search_values = $request->session()->get('search_values');
        $room_booking = $this->roomService->getDetailsByBookingId($search_values['booking_id']);
        if($room_booking[0]->status == '1') {
            return redirect()->route('booking');
        } else if($room_booking[0]->status == '0') {
            return redirect()->route('room');
        } else {
            return view('summary')->with('room_booking', $room_booking);
        }
    }
    public function paynow(Request $request)
    {
        try{
            if(!$request->session()->get('search_values')) {
                return redirect(route('room'));
            }
            $search_values = $request->session()->get('search_values');
            $room_booking = $this->roomService->getDetailsByBookingId($search_values['booking_id']);
            $total_amount = $room_booking[0]->total_amount;
            $email = $room_booking[0]->email;
            $phone = "91".$room_booking[0]->phone;
            $returnURL = route('booking.thankyou');
            $current_date = date('YmdHis');
            $merchantTxnNo = $current_date . rand(100, 999);
            $txnDate = $current_date;
            $url = "https://qa.phicommerce.com/pg/api/v2/initiateSale";
            $data = [
                "merchantId"       => "T_03342",
                "merchantTxnNo"    => $merchantTxnNo,
                "amount"           => $total_amount,
                "currencyCode"     => "356",            
                "payType"          => "0",              
                "customerEmailID"  => $email,
                "transactionType"  => "SALE",
                "txnDate"          => $txnDate,
                "returnURL"        => $returnURL,
                "customerMobileNo" => $phone,
                "addlParam1"       => "Test1",
                "addlParam2"       => "Test2"
            ];
            $secretKey = 'abc';
            $hashString = $data['addlParam1'] . $data['addlParam2'] . $data['amount'] . $data['currencyCode'] . $data['customerEmailID'] . $data['customerMobileNo'] . $data['merchantId'] . $data['merchantTxnNo'] . $data['payType'] . $data['returnURL'] . $data['transactionType'] . $data['txnDate'];
            $data['secureHash'] = hash_hmac('sha256', $hashString, $secretKey);

            $jsonData = json_encode($data);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new BadRequestException(curl_error($ch));
            } else {
                $result = json_decode($response);
                if($result->responseCode == 'R1000') {
                    $redirect_url = $result->redirectURI."?tranCtx=".$result->tranCtx;
                    return redirect()->away($redirect_url);
                } else {
                    throw new BadRequestException($result->responseDescription);
                }
            }
            curl_close($ch);
            return redirect()->back();
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->back();
        }
    }
    public function thankyou(Request $request)
    {
        echo "thank you page";
        echo '<pre>';
        print_r($_POST);die;
    }
    public function gallery(Request $request)
    {
        $albums = $this->galleryService->getAllAlbums();
        return view('gallery')->with('albums', $albums);
    }
    public function getAlbum(Request $request, $id)
    {
        try{
            $photos = $this->galleryService->getPhotosByAlbumId($id);
            if(count($photos) <= 0){
                throw new BadRequestException('Invalid Request');
            }
            $album = $this->galleryService->getAlbumById($id);
            return view('single-gallery')->with('photos', $photos)->with('album', $album);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('gallery');
        }
    }
    public function roomGallery(Request $request)
    {
        $roomPhotoCategories = $this->roomPhotosService->getAllRoomPhotoCategories();
        return view('room-gallery')->with('roomPhotoCategories', $roomPhotoCategories);
    }
    public function getRoomAlbum(Request $request, $id)
    {
        try{
            $room_photos = $this->roomPhotosService->getRoomPhotosByCatId($id);
            if(count($room_photos) <= 0){
                throw new BadRequestException('Invalid Request');
            }
            $room_photo_category = $this->roomPhotosService->getRoomPhotoCategoryById($id);
            return view('single-room-gallery')->with('room_photos', $room_photos)->with('room_photo_category', $room_photo_category);
        }catch(\Exception $e){
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('room.gallery');
        }
    }
    public function contact(Request $request)
    {
        return view('contact');
    }
    public function saveContact(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $admin_email = env('CONTACT_EMAIL');
        $subject = 'New Contact Submission';
        $result = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $this->emailService->sendEmail('emails.contact', $result, $admin_email, $subject);
        $request->session()->put('message', 'Thank you for your message. It has been sent.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->back();
    }
}

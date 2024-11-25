<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Role;
use App\Services\UserService;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService, $roomService;

    public function __construct(UserService $userService, RoomService $roomService) {
        $this->userService = $userService;
        $this->roomService = $roomService;
    }
    public function getRegister(Request $request)
    {
        if (!Auth::check()) {
            return view('auth.register');
        }
        if (Auth::check() && Auth::user()->role_id == Role::USER_ROLE_ID) {
            $url = url('/users/profile');
        } elseif (Auth::check() && Auth::user()->role_id == Role::ADMIN_ROLE_ID) {
            $url = url('/admin/dashboard');
        }
        return redirect($url);
    }

    /**
     * Register User.
     *
     * @param  RegisterRequest
     *
     * @return redirect
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->userService->create($request);
            if ($user) {
                $request->session()->put('message', 'Thank you very much for signing up.');
                $request->session()->put('alert-type', 'alert-success');
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('register');
        }
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        return view('user.edit-profile')->with('user', $user);
    }

    /**
     * Edit Profile.
     *
     * @param  ProfileRequest
     *
     * @return redirect
     */
    public function saveProfile(ProfileRequest $request)
    {
        try {
            $user = $this->userService->getUserById(Auth::user()->id);
            if ($user) {
                $data['name'] = $request->name;
                $data['phone'] = $request->phone;
                $this->userService->update($user, $data);
                $request->session()->put('message', 'Profile has been updated successfully.');
                $request->session()->put('alert-type', 'alert-success');
                return redirect()->route('user.profile');
            }
        } catch (\Exception $e) {
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('user.profile.edit');
        }
    }

    /**
     * Change Password.
     *
     * @param  ChangePasswordRequest
     *
     * @return redirect
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $user = $this->userService->getUserById(Auth::user()->id);
            if ($user) {
                $data['password'] = Hash::make($request->password);
                $this->userService->update($user, $data);
                $request->session()->put('message', 'You have successfully changed your password.');
                $request->session()->put('alert-type', 'alert-success');
                return redirect()->route('user.profile');
            }
        } catch (\Exception $e) {
            $request->session()->put('message', $e->getMessage());
            $request->session()->put('alert-type', 'alert-warning');
            return redirect()->route('user.profile.edit');
        }
    }

    public function bookings(Request $request)
    {
        $myBooking = $this->roomService->getMyBooking(Auth::user()->id);
        return view('user.bookings')->with('myBooking', $myBooking);
    }

    public function viewBooking(Request $request, $id)
    {
        $bookingDetails = $this->roomService->getDetailsByBookingId($id);
        return view('user.view-booking')->with('bookingDetails', $bookingDetails);
    }
}
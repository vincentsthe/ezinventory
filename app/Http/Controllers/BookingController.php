<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Pemakaian;
use App\Models\User;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $bookingService;

    public function __construct()
    {
        $this->bookingService = new BookingService();
    }

    public function index()
    {
        $bookings = Pemakaian::where('booking', '=', 1)->get();

        return view('booking.index', [
            'bookings' => $bookings
        ]);
    }

    public function add()
    {
        $userList = User::all();
        $atkList = Atk::all();

        return view('booking.add', [
            'userList' => $userList,
            'atkList' => $atkList
        ]);
    }

    public function postAdd(Request $request)
    {
        $userId = $request->input('user_id');
        $atkIds = $request->input('atk_id');
        $jumlahItems = $request->input('jumlah_item');
        $tanggal = $request->input('tanggal');
        $description = $request->input("description");

        $records = [];
        $recordLength = sizeof($atkIds);
        for ($i = 0; $i < $recordLength; $i++) {
            $records[] = [
                'atk_id' => $atkIds[$i],
                'jumlah' => $jumlahItems[$i]
            ];
        }

        $this->bookingService->create($userId, $tanggal, $description, $records);

        return redirect()->action('BookingController@index');
    }

    public function view(Request $request, $id)
    {
        $booking = Pemakaian::where('booking', '=', 1)
                                ->where('id', '=', $id)
                                ->with(['items', 'items.atk', 'user'])
                                ->first();

        return view('booking.view', [
            'booking' => $booking
        ]);
    }

    public function confirm(Request $request, $id)
    {
        $this->bookingService->confirmBooking($id);

        return redirect()->action('PemakaianController@index');
    }

    public function delete(Request $request, $id)
    {
        $booking = Pemakaian::where('booking', '=', 1)
                                ->where('id', '=', $id)
                                ->delete();

        return redirect()->action('BookingController@index');
    }
}
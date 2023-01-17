<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function hotel(Request $request)
    {
        $name = $request->search;

        if ($name = NULL) {
            $hotel = Hotel::all();
        } else {
            $name = $request->search;
            $hotel =  DB::table('hotels')->where('NamaHotel', 'LIKE', '%' . $name . '%')->get();
        }

        return view('hotel', [
            'hotel' => $hotel,
        ]);
    }

    public function viewHotel($id)
    {
        $hotel = Hotel::findOrFail($id);

        $rooms = Room::where('hotel_id', $id)->get();

        return view('viewHotel', [
            'hotel' => $hotel,
            'rooms' => $rooms,
        ]);
    }
}

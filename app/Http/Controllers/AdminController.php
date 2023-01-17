<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        $hotel_count = Hotel::count();

        $room_count = Room::count();

        $transaction_count = Transaction::count();

        $user_count = User::where('role', 'Customer')->count();

        return view('admin.index', [
            'hotel_count' => $hotel_count,
            'room_count' => $room_count,
            'transaction_count' => $transaction_count,
            'user_count' => $user_count,
        ]);
    }

    public function indexHotel()
    {
        $data = Hotel::all();

        return view('admin.hotel.index', [
            'data' => $data,
        ]);
    }

    public function createHotel()
    {
        return view('admin.hotel.create');
    }

    public function storeHotel(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|string|max:15',
            'files' => 'required|max:10000|mimes:jpeg,jpg,png',
        ]);

        if ($file = $request->file('files')) {
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['files'] = $fileInput;
        }

        Hotel::create([
            'NamaHotel' => $data['name'],
            'AlamatHotel' => $data['alamat'],
            'NoTelpHotel' => $data['no_telp'],
            'FotoHotel' => $data['files'],
        ]);

        return redirect()->route('admin.hotel')->with('success_message', 'Success!');
    }

    public function editHotel($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.hotel.edit', [
            'hotel' => $hotel,
        ]);
    }

    public function updateHotel(Request $request, $id)
    {
        $data = $request->all();
        $hotel = Hotel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|string|max:15',
            'files' => 'max:10000|mimes:jpeg,jpg,png',
        ]);

        if ($file = $request->file('files')) {

            // Delete Old File
            $file_path = public_path() . '/file/' . $hotel['FotoHotel'];
            File::delete($file_path);

            // Add New File
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['files'] = "$fileInput";

            $hotel->update([
                'NamaHotel' => $data['name'],
                'AlamatHotel' => $data['alamat'],
                'NoTelpHotel' => $data['no_telp'],
                'FotoHotel' => $data['files'],
            ]);

        } else {
            $hotel->update([
                'NamaHotel' => $data['name'],
                'AlamatHotel' => $data['alamat'],
                'NoTelpHotel' => $data['no_telp'],
            ]);
        }

        return redirect()->route('admin.hotel')->with('success_message', 'Update Success!');
    }

    public function deleteHotel($id)
    {
        $hotel = Hotel::findOrFail($id);

        // Delete Old File
        $file_path = public_path() . '/file/' . $hotel['FotoHotel'];
        File::delete($file_path);

        $hotel->delete();

        return redirect()->route('admin.hotel')->with('success_message', 'Delete Success!');
    }

    public function indexRoom()
    {
        $data = Room::all();
        
        return view('admin.room.index', [
            'data' => $data,
        ]);
    }

    public function createRoom()
    {
        $hotels = Hotel::all();

        return view('admin.room.create', [
            'hotels' => $hotels,
        ]);
    }

    public function storeRoom(Request $request)
    {
        $data = $request->all();    

        $request->validate([
            'hotel_id' => 'required|integer',
            'TipeKamar' => 'required|string',
            'NamaKamar' => 'required|string',
            'FasilitasKamar' => 'required|string|max:500',
            'HargaKamar' => 'required|integer',
            'UnitKamar' => 'required|integer',
            'FotoKamar' => 'required|max:10000|mimes:jpeg,jpg,png',
        ]);

        if ($file = $request->file('FotoKamar')) {
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['FotoKamar'] = $fileInput;
        }

        Room::create($data);

        return redirect()->route('admin.room')->with('success_message', 'Success!');
    }

    public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        $hotels = Hotel::all();

        return view('admin.room.edit', [
            'hotels' => $hotels,
            'room' => $room,
        ]);
    }

    public function updateRoom(Request $request, $id)
    {
        $data = $request->all();    

        $room = Room::findOrFail($id);

        $request->validate([
            'hotel_id' => 'required|integer',
            'TipeKamar' => 'required|string',
            'NamaKamar' => 'required|string',
            'FasilitasKamar' => 'required|string|max:500',
            'HargaKamar' => 'required|integer',
            'UnitKamar' => 'required|integer',
            'FotoKamar' => 'max:10000|mimes:jpeg,jpg,png',
        ]);

        if ($file = $request->file('FotoKamar')) {

            // Delete Old File
            $file_path = public_path() . '/file/' . $room['FotoKamar'];
            File::delete($file_path);

            // Update New File
            $destinationPath = 'file/';
            $fileInput = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileInput);
            $data['FotoKamar'] = $fileInput;
        }

        $room->update($data);

        return redirect()->route('admin.room')->with('success_message', 'Update Success!');
    }

    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);

        // Delete Old File
        $file_path = public_path() . '/file/' . $room['FotoKamar'];
        File::delete($file_path);
        
        $room->delete();

        return redirect()->route('admin.room')->with('success_message', 'Delete Success!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RentalCar;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction($id)
    {
        $room = Room::findOrFail($id);
        $today = date('Y-m-d');
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));

        return view('transaction.transaction', [
            'room' => $room,
            'today' => $today,
            'tomorrow' => $tomorrow,
        ]);
    }

    public function storeTransaction(Request $request)
    {
        $data = $request->all();

        $transaction = Transaction::create([
            'hotel_id' => $data['hotel_id'],
            'room_id' => $data['room_id'],
            'customer_id' => $data['customer_id'],
            'TanggalCheckIn' => $data['checkin'],
            'TanggalCheckOut' => $data['checkout'],
            'TotalBayar' => $data['Harga'],
            'Harga' => $data['totalHarga'],
            'JenisPayment' => "Cash",
        ]);

        $room = Room::findOrFail($data['room_id']);

        $room->decrement('UnitKamar', 1);

        RentalCar::create([
            'transaction_id' => $transaction->id,
            'NamaMobil' => $data['NamaMobil'],
            'TanggalPenjemputan' => $data['pickup'],
            'AlamatPenjemputan' => $data['address'],
        ]);

        return redirect()->route('order', $data['customer_id']);
    }

    public function index()
    {
        $transactions = Transaction::all();
        $today = date('Y-m-d');

        return view('admin.transaction.index', [
            'transactions' => $transactions,
            'today' => $today,
        ]);
    }

    public function order($id)
    {   
        $transactions = Transaction::where('customer_id', $id)->get();
        $rentals = RentalCar::all();

        $today = date('Y-m-d');

        return view('transaction.order', [
            'transactions' => $transactions,
            'rentals' => $rentals,
            'today' => $today,
        ]);
    }
}

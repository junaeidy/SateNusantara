<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation');
    }

    public function view()
    {
        $reservations = Reservation::all();
        return view('admin.Reservation.index', ['reservations' => $reservations]);
    }

    public function create()
    {
        return view('admin.Reservation.create');
    }

    public function storeClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phoneNumber' => 'required|string|max:255',
            'date' => 'required|date',
            'selectPerson' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
        ]);
        $inputDate = $request->input('date');
        $convertedDate = Carbon::createFromFormat('m/d/Y h:i A', $inputDate)->format('Y-m-d H:i:s');
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->date = $convertedDate;
        $reservation->selectPerson = $request->selectPerson;
        $reservation->message = $request->message;
        $reservation->save();

        return back()->with('success', 'Booking berhasil dibuat!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phoneNumber' => 'required|string|max:255',
            'date' => 'required|date',
            'selectPerson' => 'required|string|max:255',
        ]);
        $inputDate = $request->input('date');
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->date = $inputDate;
        $reservation->selectPerson = $request->selectPerson;
        $reservation->message = $request->message;
        $reservation->save();

        return redirect()->route('admin.reservation')->with('success', 'Booking berhasil dibuat!');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.Reservation.edit', ['reservation' => $reservation]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phoneNumber' => 'required|string|max:255',
            'date' => 'required|date',
            'selectPerson' => 'required|string|max:255',
        ]);
        $inputDate = $request->input('date');
        $reservation = Reservation::find($id);
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phoneNumber = $request->phoneNumber;
        $reservation->date = $inputDate;
        $reservation->selectPerson = $request->selectPerson;
        $reservation->message = $request->message;
        $reservation->save();

        return redirect()->route('admin.reservation')->with('success', 'Booking berhasil diupdate!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->route('admin.reservation')->with('success', 'Booking berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('user', 'service')->get();
        return view('booking.index', compact('bookings'));
    }
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        return view('booking.create', compact('users', 'services'));
    }
    public function store(Request $request)
    {
        $bookings = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'booking_time' => 'required|date',
            'status' => 'required',
        ]);

        Booking::create($bookings);
        return redirect()->route('booking.index')->with('success', 'Booking created successfully.');
    }
    public function show($id)
    {
        $booking = Booking::with('user', 'service')->findOrFail($id);
        return view('booking.show', compact('booking'));
    }
    public function edit($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->route('booking.index')->with('error', 'Booking not found');
        }
        $users = User::all();
        $services = Service::all();

        return view('booking.edit', compact('booking', 'users', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'booking_time' => 'required|date',
            'status' => 'required',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);
        return redirect()->route('booking.index')->with('message', 'Бронирование успешно обновлено!');
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('message', 'Бронирование успешно удалено!');
    }
}

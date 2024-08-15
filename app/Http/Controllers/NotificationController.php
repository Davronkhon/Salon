<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('booking')->get();
        return view('notification.index', compact('notifications'));
    }
    public function create()
    {
        $bookings = Booking::all();
        return view('notification.create', compact('bookings'));
    }
    public function store(Request $request)
    {
        $notifications = $request->validate([
            'booking_id' => 'required',
            'message' => 'required',
        ]);

        Notification::create($notifications);
        return redirect()->route('notification.index')->with('success', 'Notification pasts');
    }
    public function show($id)
    {
        $notifications = Notification::with('booking')->findOrFail($id);
        return view('notification.show', compact('notifications'));
    }
    public function edit($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return redirect()->route('notification.index')->with('error', 'Notification not found');
        }
        $bookings = Booking::all();
        return view('notification.edit', compact('notification', 'bookings'));
    }

    public function update(Request $request, $id)
    {
        $notifications = $request->validate([
            'booking_id' => 'required',
            'message' => 'required',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($notifications);
        return redirect()->route('notification.index')->with('message', 'Notification updated');
    }
    public function destroy($id)
    {
        $notifications = Notification::findOrFail($id);
        $notifications->delete();
        return redirect()->route('notification.index')->with('message', 'Notification deleted');
    }
}

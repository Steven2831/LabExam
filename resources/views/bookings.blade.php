<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingViewController extends Controller
{
    /**
     * 📅 Show a list of bookings for the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all bookings by the current user, most recent first
        $bookings = Booking::where('user_id', Auth::id())
            ->orderBy('booking_date', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    /**
     * 🧳 Store a new booking entry from the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 🛡️ Validate input fields
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        // ✏️ Create a new booking linked to the logged-in user
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->title = $request->title;
        $booking->description = $request->description;
        $booking->booking_date = $request->booking_date;
        $booking->save();

        // ✅ Redirect back to dashboard with a success message
        return redirect()->route('dashboard')->with('success', '🎉 Booking successfully created!');
    }
}

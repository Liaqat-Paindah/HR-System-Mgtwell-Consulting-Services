<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch unread notifications and the total count
        $notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        dd($notifications);
        $unreadCount = Auth::user()->unreadNotifications()->count();

        return view('layouts.master', compact('notifications', 'unreadCount'));
    }

    // Mark a notification as read
    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();  // Mark it as read if it exists
        }

        return redirect()->route('notifications.index');
    }

    // Clear all notifications
    public function clearAll()
    {
        // Mark all unread notifications as read
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }
}

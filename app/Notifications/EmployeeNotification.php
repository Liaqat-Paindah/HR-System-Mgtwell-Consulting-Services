<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\LeavesAdmin;


class EmployeeNotification extends Notification
{
    use Queueable;
    protected $leave;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(LeavesAdmin $leave)
    {
        $this->leave = $leave;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'leave_id' => $this->leave->id,
            'employee_name' => $this->leave->name, // Assuming `employee` is a relationship
            'leave_category' => $this->leave->leave_category,
            'from_date' => $this->leave->from_date,
            'to_date' => $this->leave->to_date,
            'leave_reason' => $this->leave->leave_reason,
            'status' => $this->leave->status,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Employee ' . $this->leaveRequest->user->name . ' has requested leave from ' . $this->leaveRequest->from_date . ' to ' . $this->leaveRequest->to_date,
            'leave_id' => $this->leaveRequest->id,
        ];
    }
}

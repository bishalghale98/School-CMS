<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\AdmissionInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryNotification extends Notification
{
    use Queueable;

    public AdmissionInquiry $inquiry;

    public function __construct(AdmissionInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Admission Inquiry: ' . $this->inquiry->student_name)
            ->line('A new admission inquiry has been submitted.')
            ->line('Student: ' . $this->inquiry->student_name)
            ->line('Class: ' . $this->inquiry->applying_class)
            ->line('Parent: ' . $this->inquiry->parent_name)
            ->line('Mobile: ' . $this->inquiry->mobile)
            ->action('View Inquiry', url('/admin/admission-inquiries/' . $this->inquiry->id . '/edit'));
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'inquiry_id' => $this->inquiry->id,
            'student_name' => $this->inquiry->student_name,
            'applying_class' => $this->inquiry->applying_class,
            'message' => 'New admission inquiry from ' . $this->inquiry->student_name,
        ];
    }
}

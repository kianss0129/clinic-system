<?php

namespace App\Notifications;

use App\Models\MedicalRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MedicalRecordCreatedNotification extends Notification
{
    use Queueable;

    public $record;

    public function __construct(MedicalRecord $record)
    {
        $this->record = $record;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Medical Record Added')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A new medical record has been added by your doctor.')
            ->line('Diagnosis: ' . $this->record->diagnosis)
            ->line('Notes: ' . $this->record->notes)
            ->action('View Your Records', url('/patient/medical-records'))
            ->line('Thank you for using our clinic system.');
    }
}

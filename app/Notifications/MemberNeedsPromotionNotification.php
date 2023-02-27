<?php

namespace App\Notifications;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberNeedsPromotionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public Member $member;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {

        $this->member = $member;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    { 
        return (new MailMessage)
            ->line('مرحبا !!')
            ->line(' عضو هيئة التدريس '.$this->member->name)
            ->line('القسم :'.$this->member->department->name)
            ->line('التخصص :'.$this->member->specialization->name)
            ->line('الدرجة العلمية :'.$this->member->degree)
            ->line('الدرجة الاكاديمية :'.$this->member->academic_degree)
            ->line('لديه ترقية مستحقة خلال تلاتة اشهر  من تاريخ اليوم تحديدا' .$this->member->next_pormotion_date)
            ->line('الرجاء اتخاذ الاجراءات اللازمة وتبيلغ المعني')            
        ;
    }
}
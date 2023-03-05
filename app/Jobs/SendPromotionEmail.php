<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Models\Member;
use App\Models\Notice;
use App\Notifications\MemberNeedsPromotionNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPromotionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Member $member;
    protected Admin $admin;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
        $this->admin = Admin::all()->first();        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notice = new Notice();
        $message =       
        ' عضو هيئة التدريس '.$this->member->name. PHP_EOL .
        'القسم :'.$this->member->department->name.PHP_EOL .
        'التخصص :'.$this->member->specialization->name.PHP_EOL.
        'الدرجة العلمية :'.$this->member->degree.PHP_EOL.
        'الدرجة الاكاديمية :'.$this->member->academic_degree.PHP_EOL.
        'لديه ترقية مستحقة خلال تلاتة اشهر  من تاريخ اليوم تحديدا' .$this->member->next_pormotion_date.PHP_EOL.
        'الرجاء اتخاذ الاجراءات اللازمة وتبيلغ المعني';
        $notice->message = $message;
        $notice->member_id = $this->member->id;
        $notice->save();
        $this->admin->notify(new MemberNeedsPromotionNotification($this->member));
    }
}

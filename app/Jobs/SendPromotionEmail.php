<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Models\Member;
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
        $this->admin->notify(new MemberNeedsPromotionNotification($this->member));
    }
}

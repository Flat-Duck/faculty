<?php

namespace App\Jobs;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateNextPromotion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Member $member;
    protected $last_date;
    protected $next_date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $eligble = $this->member->degree == 'أستاذ';
        if(!$eligble){
            $years = $this->getMinimumYears($this->member->degree,$this->member->academic_degree);
            if($years > 0){
                $last_date = new Carbon($this->member->last_pormotion_date);            
                $this->next_date = $last_date->addYears($years);
                $this->member->next_pormotion_date = $this->next_date;
                $this->member->save();
            }
        
            $next = Carbon::parse($this->next_date);
            $now = Carbon::now();
            $days = $now->diffInDays($next, false) - 90;
            SendPromotionEmail::dispatch($this->member)->delay(now()->addDays($days));
        }
    }


    public function getMinimumYears($academic_degrees,$degree)
    {
        if($degree == 'أستاذ'){
            return 0;
        }
        if($degree == 'أستاذ مساعد' && $academic_degrees == 'دكتوراة'){
            return 3;

        }elseif($degree == 'أستاذ مشارك' && $academic_degrees == 'ماجستير'){
            return 6;
        }else{
            return 4;
        }
    }
}
    
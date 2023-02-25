<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use App\Models\Member;
use App\Models\Research;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {
        return view('admin.decisions.add',compact('member'));   
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
               
        $validatedData = request()->validate(Decision::validationRules());
        $member = Member::find($request->member_id);
        
        $decision = Decision::create($validatedData);
        
        foreach ($validatedData['researches'] as $key => $id) {
            $research = Research::find($id);
            $research->decision_id = $decision->id;
            $research->save();
        }
                
        $member->last_pormotion_date = $validatedData['promotion_date'];
        $member->save();
        $member->calculateNextPromotionDate();

        return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }
}

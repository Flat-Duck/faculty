<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Research;
use App\Models\Department;
use App\Models\Specialization;

use App\Jobs\CalculateNextPromotion;
use App\Imports\MembersImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::getList(request()->search);
        $page = 'member';
        return view('admin.members.index',compact('members','page'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        $members = Member::getArchived(request()->search);
        return view('admin.members.archive',compact('members'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function this_month()
    {
        $members = Member::whereBetween('next_pormotion_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->paginate(20);
        $page = 'this_month';
        return view('admin.members.index',compact('members','page'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function this_year()
    {
        $members = Member::whereBetween('next_pormotion_date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->paginate(20);//->get();
        $page = 'this_year';
        return view('admin.members.index',compact('members','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $specializations = Specialization::all();

        return view('admin.members.add',compact('departments','specializations'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate(Member::validationRules());        
        $member = Member::create($validatedData);        
        if (request()->has(['avatar'])) {
            $member->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        CalculateNextPromotion::dispatch($member);
        
        return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => '?????? ?????????????? ??????????'
        ]);
    }

        
    public function import(Request $request)
    {
        $import = new MembersImport;
        $import->import($request->file('file'));
     
       return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => '?????? ?????????????? ??????????'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $departments = Department::all();
        $specializations = Specialization::all();

        return view('admin.members.edit',compact('departments','specializations', 'member'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = request()->validate(Member::validationRules($member->id));           
        $member->update($validatedData);
        if (request()->has(['avatar'])) {
            $member->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        CalculateNextPromotion::dispatch($member);
        return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => '???? ?????????????? ??????????'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->addToArchive();
        return redirect()->route('admin.members.index')->with([
            'type' => 'success',
            'message' => '?????? ?????????????? ??????????'
        ]);
    }



    public function upload_cv(Member $member, Request $request)
    {
        if (request()->has(['cv'])) {
            $member->addMediaFromRequest('cv')->toMediaCollection('cvs');
        }
        return back()->with(['type' => 'success', 'message' => 'Profile updated successfully']);
    }
    
    public function upload_research(Member $member, Request $request)
    {
        $validatedData = request()->validate(Research::validationRules());
        $research = Research::create($validatedData);
        if (request()->has(['research'])) {
            $files = request()->file('research');
            foreach ($files as $file) {
                $research->addMedia($file)->toMediaCollection('researchs');
            }
        }
        return back()->with(['type' => 'success', 'message' => 'Profile updated successfully']);

    }
}

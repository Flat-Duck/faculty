<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function report()
    {
        return view('admin.reports.report');
    }

    public function degree(Request $request)
    {
        $members = Member::where('degree', $request->degree)->get();
        return view('admin.reports.report',compact('members'));
    }

    public function academic_degree(Request $request)
    {
        $members = Member::where('academic_degree',$request->academic_degrees)->get();
        return view('admin.reports.report',compact('members'));
    }

    public function department(Request $request)
    {
        $members = Member::where('department_id',$request->department_id)->get();
        return view('admin.reports.report',compact('members'));
    }

    public function specialization(Request $request)
    {
        $members = Member::where('specialization_id',$request->specialization_id)->get();
        return view('admin.reports.report',compact('members'));
    }

    public function dates(Request $request)
    {
        $members = Member::whereBetween('next_pormotion_date', [$request->start, $request->end])->get();        
        return view('admin.reports.report',compact('members'));
    }
}
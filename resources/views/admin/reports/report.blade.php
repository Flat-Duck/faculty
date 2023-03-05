@extends('admin.layouts.app', ['page' => 'notices'])

@section('title', 'قائمة الاشعارات')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('أعضاء هيئة التدريس') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">                
                <table class="table table-transparent table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 1%">#</th>
                            <th class="text-center" >الاسم</th>
                            <th class="text-center" >الدرجة الاكاديمية</th>
                            <th class="text-center" >الدرجة</th>
                            <th class="text-center" >رقم الهاتف</th>
                            <th class="text-center" >تاريخ اخر ترقية</th>
                            <th class="text-center" >تاريخ استحقاق الترقية القادم</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @forelse ($members as $k=> $member)
                        <tr>
                            <td class="text-center" >{{ $k+1}}</td>
                            <td class="text-center" >{{ $member->name }}</td>
                            <td class="text-center" >{{ $member->academic_degree }}</td>
                            <td class="text-center" >{{ $member->degree }}</td>
                            <td class="text-center" >{{ $member->phone }}</td>
                            <td class="text-center" >{{ $member->last_pormotion_date }}</td>
                            <td class="text-center" >{{ $member->next_pormotion_date }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center"  colspan="7">لاتوجد سجلات</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

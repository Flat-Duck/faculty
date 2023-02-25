@extends('admin.layouts.app', ['page' => 'decision'])

@section('title', 'إضافة قرار ترقية جديد')

@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('إضافة قرار ترقية جديد') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form role="form" method="POST" action="{{ route('admin.decisions.store') }}"  enctype="multipart/form-data"  class="card">                
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">الرجاء ادخال البيانات</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="member_id" value="{{$member->id}}"/>
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->name}}" placeholder="إسم عضو هئية التدريس" />
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->employment_date}}" placeholder="تاريخ التعيين" />
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->department->name}}" placeholder="القسم" />
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->specialization->name}}" placeholder="التخصص العام" />
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->degree}}" placeholder="الدرجة العلمية" />
                            <x-form.input class="col-md-4 col-xl-4" disabled="disabled" type="text" name="name" value="{{$member->academic_degree}}" placeholder="الدرجو الاكاديمية" />
                            <x-form.input class="col-md-4 col-xl-4"  type="text" name="number" placeholder="رقم القرار" />
                            <x-form.input class="col-md-4 col-xl-4"  type="text" name="year" placeholder="سنة القرار" />
                            <x-form.input class="col-md-4 col-xl-4"  type="date" name="promotion_date" placeholder="تنفيذ الترقية إعتباراً من" />                            
                            <div class="mb-3 col-md-4 col-xl-4">
                                <label class="form-label">البحوث والمنشورات العلمية</label>
                                @foreach ($member->avaliableResearches as $research)
                                <label class="form-check">
                                    <input class="form-check-input" name="researches[]" value="{{$research->id}}" type="checkbox">
                                    <span class="form-check-label"> {{$research->title}} </span>
                                    <span class="form-check-description"> {{$research->description}} </span>
                                </label>
                                @endforeach
                                {{-- @error('researches')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror               --}}
                            </div>
                            <div class="mb-3 col-md-4 col-xl-4">
                                <div class="form-label">نوع الترقية</div>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="مستحقة"  name="type" checked="">
                                        <span class="form-check-label">مستحقة</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"  value="إستثنائية" name="type" >
                                        <span class="form-check-label">إستثنائية</span>
                                    </label>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">                        
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        
                        {{-- <a href="{{ route('admin.members.index') }}" class="btn btn-default">إلغاء</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
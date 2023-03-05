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
        <div class="card">
            <div class="card-body border-bottom py-3">
              <form method="POST" action="{{route('admin.reports.degree')}}">
                @csrf
                <div class="row mb-3">
                  <label class="form-label">تقرير حسب الدرجة العلمية</label>
                  <div class="form-selectgroup mb-3">
                    @foreach (Member::degrees as $degree)
                    <label class="form-selectgroup-item">
                      <input type="radio" name="degree" value="{{$degree}}" class="form-selectgroup-input">
                      <span class="form-selectgroup-label">{{$degree}}</span>
                    </label>    
                    @endforeach
                  </div>                
                  <button type="submit" class="btn btn-primary">إنشاءتقرير</button>
                </div>
              </form>
              <form method="POST" action="{{route('admin.reports.degree')}}">
                @csrf
                <div class="row mb-3">
                  <label class="form-label">تقرير حسب الدرجة الاكاديمية</label>
                  <div class="form-selectgroup mb-3">
                    @foreach (Member::academic_degrees as $degree)
                    <label class="form-selectgroup-item">
                      <input type="radio" name="name" value="{{$degree}}" class="form-selectgroup-input">
                      <span class="form-selectgroup-label">{{$degree}}</span>
                    </label>    
                    @endforeach                                    
                  </div>
                  <button type="submit" class="btn btn-primary">إنشاءتقرير</button>
                </div>
              </form>



              <form method="POST" action="{{route('admin.reports.degree')}}">
                @csrf
                <div class="row mb-3"> 
                  {{-- form-selectgroup"> --}}
              
                <label class="form-label">تقرير حسب القسم</label>
                <select class="form-control mb-3" 
                  name="department_id" id="department_id">
                      @foreach (Department::all() as $department)
                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                      @endforeach
                  </select>
                <button type="submit" class="btn btn-primary">إنشاءتقرير</button>
              </div>
              </form>

              <form method="POST" action="{{route('admin.reports.degree')}}">
                @csrf
              <div class="row mb-3"> 
                   {{-- <div class="mb-3 form-selectgroup"> --}}
                <label class="form-label">تقرير حسب التخصص</label>                
                  
                  <select class="form-control col-md-3" 
                      name="specialization_id" id="specialization_id">
                      @foreach (Specialization::all() as $specialization)
                          <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                      @endforeach
                  </select>
                <button type="submit" class="btn btn-primary col-md-3">إنشاءتقرير</button>
              </div>
              </form>
                
              
              <div class="row">               
                <x-form.input class="col-3" type="date" name="employment_date" placeholder="تاريخ البداية" />
              
              
                <x-form.input class="col-3" type="date" name="employment_date" placeholder="تاريخ النهاية" />
              
              <div class="mb-3 col-3">
<br/>
<br/>
                <button  type="submit" class="btn btn-primary col-md-3 btn-md">إنشاءتقرير</button>
              </div>
              </div>
            </div>    
        </div>
    </div>
</div>
@endsection
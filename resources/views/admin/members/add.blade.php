@extends('admin.layouts.app', ['page' => 'provider'])

@section('title', 'إضافة عضو هئية تدريس')

@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('إضافة عضو هئية تدريس') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form role="form" method="POST" action="{{ route('admin.members.store') }}"  enctype="multipart/form-data"  class="card">                
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">الرجاء ادخال البيانات</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                
                                <x-form.input  type="text" name="name" placeholder="الأسم رباعي" />
                                
                                <x-form.input type="text" name="n_id" placeholder="الرقم الوطني / جواز السفر" />
                                
                                <x-form.input type="text" name="phone" placeholder="رقم الهاتف" />
                                
                                <x-form.input type="text" name="email" placeholder="البريد الالكتروني" />
                    
                            </div>
                            <div class="col-md-6 col-xl-6">
                                
                                <x-form.input type="date" name="employment_date" placeholder="تاريخ التعيين" />
                                
                                <div class="row">                            
                                
                                    <x-form.sellect class="col-6" name="specialization_id" placeholder="التخصص العام" :items="$specializations" />                                    
                                    
                                    <x-form.sellect class="col-6" name="department_id" placeholder="القسم" :items="$departments" />                                    
                                
                                </div>
                                <div class="row">
                                
                                    <x-form.select class="col-6" name="academic_degree" placeholder="الدرجة الاكاديمية" :items="App\Models\Member::academic_degrees" />
                                    
                                    <x-form.select class="col-6" name="degree" placeholder="الدرجة العلمية" :items="App\Models\Member::degrees" />

                                </div>
                                <div class="row">
                                    
                                    <x-form.input class="col-6" type="date" name="last_pormotion_date" placeholder="تاريخ أخر ترقية " />
                                    
                                    <x-form.input class="col-6" type="date" name="next_pormotion_date" placeholder="تاريخ إستحقاق الترقية القادمة" />
                                
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="notes">ملاحظات </label>
                                <textarea
                                    id="notes"
                                    class="form-control @error('notes') is-invalid @enderror"
                                    name="notes"
                                    placeholder="ملاحظات "
                                    spellcheck="false"                                     
                                    data-ms-editor="true">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror        
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="picture">الصورة الشخصية</label>
                                <input type="file"
                                    class="form-control @error('picture') is-invalid @enderror"
                                    name="picture"
                                    accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                    id="picture"/>
                                    @error('picture')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="cv">السيرة الذاتية </label>
                                <input type="file"
                                accept=".pdf, .docx, .doc, .txt"
                                    class="form-control @error('cv') is-invalid @enderror"
                                    name="cv"
                                    
                                    id="cv"/>
                                    @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">                        
                        <button type="submit" class="btn btn-primary">حفظ</button>

                        <a href="{{ route('admin.members.index') }}" class="btn btn-default">
                            إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
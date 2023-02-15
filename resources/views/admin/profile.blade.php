@extends('admin.layouts.app', ['page' => ''])

@section('title', 'تعديل الملف الشخصي')
@section('custom_styles')
<link rel="stylesheet" href="https://preview.tabler.io/dist/libs/dropzone/dist/dropzone.css">
@endsection
@section('content')

    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('تعديل الملف الشخصي') }}
            </h2>
        </div>
    </div>
    
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-8">
                    <form method="post" enctype="multipart/form-data"  class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">تعديل البيانات الشخصية</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col-xl-9">
                        
                                    <x-form.input value="{{ old('name', $admin->name) }}"  type="text" name="name" placeholder="الاسم" />
                                    <x-form.input value="{{ old('email', $admin->email) }}"  type="email" name="email" placeholder="البريد الإلكتروني" />
                                    <x-form.input value="{{ old('username', $admin->username) }}" type="text" name="username" placeholder="إسم المستخدم" />
    
                                </div>                     
                                <div class="col-md-3 col-xl-3">
                        
                                    <div class="row align-items-center">

                                        <div class="col-auto mx-4">
                                            <x-layout.avatar class="avatar-xl" size="500"/>                                            
                                        </div>
                                        <br />
                                        <div class="ms-2 mt-4">
                                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-team">
                                                تغيير الصورة الشخصية
                                            </a>
                                        </div>
                                      </div>
    
                                </div>                     
                            </div>
                        </div>
                        <div class="card-footer text-end">                        
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            
                            <a href="{{ route('admin.specializations.index') }}" class="btn btn-default">إلغاء</a>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <form method="post" action="{{ route('admin.password_update') }}" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">تغيير كلمة المرور</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                        
                                    <x-form.input  type="password" name="current_password" placeholder="كلمة المرور الحالية" />
                                    <x-form.input pattern=".{6,}" title="6 characters minimum" type="password" name="password" placeholder="كلمة المرور الجديدة" />
                                    <x-form.input pattern=".{6,}" title="6 characters minimum" type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" />
    
                                </div>                     
                            </div>
                        </div>
                        <div class="card-footer text-end">                        
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            
                            <a href="{{ route('admin.specializations.index') }}" class="btn btn-default">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-modals.avatar/>
@endsection
@section('custom_scripts')
<script src="https://preview.tabler.io//dist/libs/dropzone/dist/dropzone-min.js" defer=""></script>
@endsection

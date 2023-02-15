@extends('admin.layouts.app', ['page' => 'admins'])

@section('title', 'تعديل مستخدم')

@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('تعديل مستخدم') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form role="form" method="POST" action="{{ route('admin.admins.update', ['admin' => $admin->id]) }}" class="card">
                    @csrf
                    @method('PUT')  
                    <div class="card-header">
                        <h4 class="card-title">الرجاء ادخال البيانات</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                    
                                <x-form.input value="{{ old('name', $admin->name) }}" type="text" name="name" placeholder="الإسم كامل" />

                                <x-form.input value="{{ old('username', $admin->username) }}" type="text" name="username" placeholder="اسم المستخدم" />
                                
                                <x-form.input value="{{ old('phone', $admin->phone) }}" type="text" name="phone" placeholder="رقم الهاتف" />

                                <x-form.input value="{{ old('email', $admin->email) }}" type="email" name="email" placeholder="البريد الالكتروني" />

                            </div>                     
                        </div>
                    </div>
                    <div class="card-footer text-end">                        
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-default">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
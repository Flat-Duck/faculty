@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'إضافة قسم جديد')

@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('إضافة قسم جديد') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form role="form" method="POST" action="{{ route('admin.departments.store') }}"  enctype="multipart/form-data"  class="card">                
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">الرجاء ادخال البيانات</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                    
                                <x-form.input  type="text" name="name" placeholder="إسم القسم" />

                            </div>                     
                        </div>
                    </div>
                    <div class="card-footer text-end">                        
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-default">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
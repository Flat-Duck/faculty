@extends('admin.layouts.app', ['page' => 'specialization'])

@section('title', 'تعديل تخصص')

@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('تعديل تخصص') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form role="form" method="POST" action="{{ route('admin.specializations.update', ['specialization' => $specialization->id]) }}" class="card">
                    @csrf
                    @method('PUT')  
                    <div class="card-header">
                        <h4 class="card-title">الرجاء ادخال البيانات</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                    
                                <x-form.input required value="{{ old('name', $specialization->name) }}" type="text" name="name" placeholder="إسم التخصص" />

                            </div>                     
                        </div>
                    </div>
                    <div class="card-footer text-end">                        
                        <button type="submit" class="btn btn-primary">تعديل</button>
                        
                        <a href="{{ route('admin.specializations.index') }}" class="btn btn-default">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
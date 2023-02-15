@extends('admin.layouts.app', ['page' => 'admins'])

@section('title', 'إدارة المستخدمين')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('المستخدمين') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            {{-- <div class="alert alert-info">
                <div class="alert-title">Sample table page</div>                
            </div> --}}
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <form>
                            <div class="row g-2">
                                <div class="col">
                                    <input id="indexSearch" name="search" placeholder="Searsh" value="{{ $search ?? '' }}" type="text" class="form-control" spellcheck="false" data-ms-editor="true" autocomplete="off">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-icon btn-primary" aria-label="Button">                                
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="col-auto ms-auto d-print-none">
                            <a class="pull-right btn  btn-primary" href="{{ route('admin.admins.create') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="إضافة جديد">
                                إضافة جديد <i class="ti ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم كامل</th>
                                <th>إسم المستخدم</th>
                                <th>البريد الالكتروني</th>
                                <th>الصورة الشخصية</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $k=> $admin)
                            <tr>
                                <td>{{ $k+1}}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->email }}</td>
                                <td><x-layout.picture url="{{$admin->getAvatar(200)}}" /></td>
                                <td>
                                    @if ($admin->is_active)
                                    <span class="badge bg-green">مفعل</span>
                                    @else                                    
                                    <span class="badge bg-red">غير مفعل</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-icon btn-outline-info"  href="{{ route('admin.admins.edit', ['admin' => $admin->id]) }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="تعديل">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <form id="delete{{$admin->id}}" action="{{ route('admin.admins.destroy', ['admin' => $admin->id]) }}"
                                        method="POST" class="inline pointer btn btn-icon btn-outline-danger">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="if (false) { this.parentNode.submit() }" data-record-id="{{$admin->id}}" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                            <i class="ti ti-trash-x"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>                        
                        @empty
                        <tr>
                            <td colspan="6">لاتوجد سجلات</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
                @if( $admins->hasPages() )
                <div class="card-footer pb-0">
                    {{ $admins->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <x-modals.danger/>
@endsection
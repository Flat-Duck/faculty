@extends('admin.layouts.app', ['page' => 'department'])

@section('title', 'الاقسام')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('الاقسام') }}
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
                            <a class="pull-right btn  btn-primary" href="{{ route('admin.departments.create') }}">
                                إضافة جديد
                            </a>                        
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $k=> $department)
                            <tr>
                                <td>{{ $k+1}}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a class="btn btn-icon btn-outline-info"  href="{{ route('admin.departments.edit', ['department' => $department->id]) }}">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    {{-- <form id="delete{{$department->id}}" action="{{ route('admin.departments.destroy', ['department' => $department->id]) }}"
                                        method="POST" class="inline pointer btn btn-icon btn-outline-danger">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="if (false) { this.parentNode.submit() }" data-record-id="{{$department->id}}" data-record-title="The first one"  data-bs-toggle="modal" data-bs-target="#modal-danger">
                                            <i class="ti ti-trash-x"></i>
                                        </a>
                                    </form> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">لاتوجد سجلات</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if( $departments->hasPages() )
                <div class="card-footer pb-0">
                    {{ $departments->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
    {{-- <x-modals.danger/> --}}
@endsection



{{-- 
                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.departments.create') }}">
                    إضافة قسم جديد
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                  

                   
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $departments->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection --}}

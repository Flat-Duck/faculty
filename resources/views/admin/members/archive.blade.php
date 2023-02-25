@extends('admin.layouts.app', ['page' => 'archive'])
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('أرشيف أعضاء هيئة التدريس') }}
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
                   <x-form.search />
                    <div class="col-auto ms-auto d-print-none">
                        <a class="pull-right btn  btn-primary" href="{{ route('admin.members.create') }}">
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
                            <th>الدرجة الاكاديمية</th>
                            <th>الدرجة</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ اخر ترقية</th>                            
                            <th>تاريخ الارشفة</th>
                            <th>الصورة الشخصية</th>                                                        
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $k=> $member)
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->academic_degree }}</td>
                            <td>{{ $member->degree }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->last_pormotion_date }}</td>                            
                            <td>
                                {{ $member->is_archived }}
                            </td>
                            <td><x-layout.picture url="{{$member->getAvatar(200)}}" /></td>
                            <td class="text-nowrap">                                    
                                <a class="btn btn-icon btn-outline-info"  href="{{ route('admin.members.edit', ['member' => $member->id]) }}">
                                    <i class="ti ti-edit"></i>
                                </a>

                                <form id="delete{{$member->id}}" action="{{ route('admin.members.destroy', ['member' => $member->id]) }}"
                                    method="POST" class="inline pointer btn btn-icon btn-outline-danger">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="if (false) { this.parentNode.submit() }" data-record-id="{{$member->id}}" data-record-title="The first one"  data-bs-toggle="modal" data-bs-target="#modal-danger">
                                        <i class="ti ti-trash-x"></i>
                                    </a>                                        
                                </form>                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">لاتوجد سجلات</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if( $members->hasPages() )
                <div class="card-footer pb-0">
                    {{ $members->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
<x-modals.danger message="هل أنت متأكد من الترجع عن ارشفة عضو هئية التدريس؟"/>

@endsection

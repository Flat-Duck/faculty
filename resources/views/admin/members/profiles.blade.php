@extends('admin.layouts.app', ['page' => 'profiles'])
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('أعضاء هيئة التدريس') }}
                </h2>
              <div class="text-muted mt-1">العدد الاجمالي :<b> {{$members->count()}} </b></div>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <x-form.search />
            </div>
          </div>
        </div>
      </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @forelse ($members as $k=> $member)
            <x-layout.user-card :member="$member" />
            @empty
            <div>
                <td colspan="9">لاتوجد سجلات</td>
            </div>
            
            @endforelse
        </div>
    </div>
    @if( $members->hasPages() )
                <div class="card-footer pb-0">
                    {{ $members->links() }}
                </div>
            @endif
</div>
@endsection
{{-- 
<div class="page-body">
    <div class="container-xl">
        {{-- <div class="alert alert-info">
            <div class="alert-title">Sample table page</div>                
        </div> --}}
        {{-- <div class="card">
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
                            <th>تاريخ استحقاق الترقية القادم</th>
                            <th>الصورة الشخصية</th>
                            <th> البريد الالكتروني</th> --}}
                            {{-- <th>الرقم الوطني</th> --}}
                            {{-- <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                            <td>{{ $k+1}}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->academic_degree }}</td>
                            <td>{{ $member->degree }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->last_pormotion_date }}</td>
                            <td>{{ $member->next_pormotion_date }}</td>
                            <td>
                                @php $src = $member->picture ? \Storage::url($member->picture) : '' @endphp
                                    @if($src)                                
                                    <img src="{{ $member->picture ? \Storage::url($member->picture) : '' }}" class="border rounded" style="width: 60px; height: 80px; object-fit: cover;">
                                    @else
                                     <div class="border border-info" style="width: 60px; height: 80px;"></div> --}}
                                     {{-- <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                @endif
                                    
                            </td>
                            <td class="text-nowrap">                                     --}}
                                {{-- <a class="btn btn-icon btn-outline-info"  href="{{ route('admin.members.edit', ['member' => $member->id]) }}">
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
            
        </div>
    </div>
</div>
<x-modals.danger/> 
@endsection --}} 

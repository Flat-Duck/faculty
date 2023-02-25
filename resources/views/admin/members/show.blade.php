@extends('admin.layouts.app', ['page' => 'members'])
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">
            {{ __('ملف عضو هيئة التدريس') }}
        </h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
         
            <div class="col-md-12 col-xl-12">
              <a class="card card-link" href="#">
                <div class="card-cover card-cover-blurred text-center" style="background-image: url(./static/photos/tropical-palm-leaves-floral-pattern-background.jpg
)">

                    <x-layout.picture url="{{$member->getAvatar(500)}}" class="avatar-xl avatar-thumb mb-3 rounded" />
                </div>
                <div class="card-body text-center">
                  <div class="card-title mb-1">{{$member->name}}</div>
                  <div class="text-muted">{{$member->degree}}</div>
                </div>
              </a>
            </div><div class="row g-3">
            <div class="col">
              <ul class="timeline">
                @foreach ($member->researches; as $research)
                <x-layout.timeline-research :item="$research" />
                @endforeach

                {{-- @foreach ($member->media; as $item)
                <x-layout.timeline-item :item="$item" />
                @endforeach --}}
                


              </ul>
            </div>
            <div class="col-lg-4">
              <div class="row row-cards">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title">معلومات عامة</div>
                      <div class="mb-2">
                        <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6l0 13"></path><path d="M12 6l0 13"></path><path d="M21 6l0 13"></path></svg>
                        القسم: <strong>{{$member->department->name}}</strong>
                      </div>
                      <div class="mb-2">
                        <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path><path d="M12 12l0 .01"></path><path d="M3 13a20 20 0 0 0 18 0"></path></svg>
                        التخصص العام: <strong>{{$member->specialization->name}}</strong>
                      </div>
                      <div class="mb-2">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M11 15l1 0"></path><path d="M12 15l0 3"></path></svg>
                         تاريخ التعيين: <strong>{{$member->employment_date}}</strong>
                      </div>
                      <div class="mb-2">
                        <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 11m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                        الدرجة العلمية: <strong>{{$member->degree}}</strong>
                      </div>
                      <div class="mb-2">
                        <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M11 15l1 0"></path><path d="M12 15l0 3"></path></svg>
                        الدرجة الاكاديمية: <strong>{{$member->academic_degree}}</strong>
                      </div>
                      {{-- <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M12 7l0 5l3 3"></path></svg>
                        Time zone: <strong>Europe/Ljubljana</strong>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h2 class="card-title">رفع المرفقات :</h2>
                      <div>
                        <form role="form" method="POST" action="{{ route('admin.members.upload_cv', ['member' => $member->id]) }}"  enctype="multipart/form-data" >
                            @csrf
                            <div class="form-label">السيرة الذاتية</div>
                            <div class="mb-3 btn-group w-100">
                                <input type="file" accept=".pdf, .docx, .doc, .txt" name="cv" class="form-control">
                                <button type="submit" class="btn btn-info"> رفع</button>
                            </div>
                        </form>
                        <br />
                        <h2 class="card-title">إضافة ورقة بحثية :</h2>
                        <form role="form" method="POST" action="{{ route('admin.members.upload_research', ['member' => $member->id]) }}"  enctype="multipart/form-data" >
                            @csrf

                            <input  type="hidden" name="member_id" value="{{$member->id}}" />


                            <x-form.input  type="text" name="title" placeholder="العنوان" />
                            
                            <x-form.input  type="text" name="description" placeholder="الوصف" />
                                
                            <x-form.input type="date" name="published_at" placeholder="تاريخ النشر" />
                            
                            <x-form.input type="text" name="place" placeholder="مكان النشر" />
                                                        
                            <div class="form-label">البحوث العلمية والمنشورات</div>
                            <div class="mb-3 btn-group w-100">                            
                                <input type="file" accept=".pdf, .docx, .doc, .txt" name="research[]" multiple class="form-control">
                                <button type="submit" class="btn btn-info"> رفع</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          </div>
         
          </div>
    </div>
</div>
{{-- <x-modals.danger/> --}}
@endsection
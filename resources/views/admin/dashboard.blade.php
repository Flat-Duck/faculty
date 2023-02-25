@extends('admin.layouts.app', ['page' => 'dashboard'])
@section('title', 'الصفحة الرئيسية')
@section('content')
  <div class="container-xl">
    <div class="page-header d-print-none">
      <h2 class="page-title">
        {{ __('إحصائيات') }}
      </h2>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <x-stats.count title="عدد أعضاء هئية التدريس" count="{{ App\Models\Member::all()->count()}} عضو" />
        <x-stats.count title="عدد البحوث" count="{{ App\Models\Research::all()->count()}} بحث" />
          <x-stats.count title="عدد قرارات الترقية" count="{{ App\Models\Decision::all()->count()}} قرار" />
        
        <div class="col-md-12 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">اعضاء هئية التدريس الذين لديهم ترقية قادمة خلال هدا الشهر</h3>
            </div>
            <div class="table-responsive">
              <table class="table card-table table-vcenter">
                <thead>
                  <tr>
                    <th>الاسم</th>
                    <th>الدرجة العلمية</th>
                    <th>الدرجة الاكاديمية</th>
                    <th>تاريخ الترقية القادم</th>
                    <th>صورة شخصية</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (App\Models\Member::this_year() as $member)
                  <tr>
                    <td class="text-nowrap">
                      <a href="http://facu.test/admin/members/{{$member->id}}" class="text-reset">  {{$member->name}}</a>
                    </td>                   
                    <td class="text-nowrap">
                      {{$member->degree}}
                    </td>
                    <td class="text-nowrap">
                      {{$member->academic_degree}}
                    </td>
                    <td class="text-nowrap text-muted">
                      <i class="ti ti-calendar-due"></i>
                      {{$member->next_pormotion_date}}
                    </td>
                    <td>
                      <x-layout.picture url="{{$member->getAvatar(200)}}" />
                    </td>
                    <td>
                    @if (Carbon::parse($member->next_pormotion_date) <= Carbon::now())
                    <a class="btn btn-primary" href="{{ route('admin.decisions.create',['member' => $member->id ]) }}">
                        ترقية
                    </a>    
                    @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">عدد اعضاء هيئة التدريس لكل درجة</h3>
            </div>
            <table class="table card-table table-vcenter">
              <thead>
                <tr>
                  <th>الدرجة العلمية</th>
                  <th >عدد الاعضاء</th>
                </tr>
              </thead>
              <tbody>
                @php
                          
                          $dgs = App\Models\Member::groupBy('degree')
                          ->orderBy(DB::raw('COUNT(id)','desc'))
                          ->get(array(DB::raw('COUNT(id) as total'),'degree'));
                          
                      @endphp
                        @foreach ($dgs as $item)
                       
                        <tr>

                            <td> <a href="http://facu.test/admin/members?search={{$item->degree}}" class="text-reset" >{{$item->degree}}</td>
                            <td> {{$item->total}}</td>
                          
                            {{-- <td>3,550</td> --}}
                            {{-- <td class="w-50">
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                              </div>
                            </td> --}}
                          </tr>      
                        @endforeach
                              
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-4 col-lg-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">عدد اعضاء هيئة التدريس لكل درجة</h3>
                  </div>
                  <table class="table card-table table-vcenter">
                    <thead>
                      <tr>
                        <th>الدرجة الاكادمية</th>
                        <th >عدد الاعضاء</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          
                          $dgs = App\Models\Member::groupBy('academic_degree')
                          ->orderBy(DB::raw('COUNT(id)','desc'))
                          ->get(array(DB::raw('COUNT(id) as total'),'academic_degree'));
                          
                      @endphp
                        @foreach ($dgs as $item)
                       
                        <tr>

                            <td> <a href="http://facu.test/admin/members?search={{$item->academic_degree}}" class="text-reset" >{{$item->academic_degree}}</td>
                            <td> {{$item->total}}</td>
                          
                            {{-- <td>3,550</td> --}}
                            {{-- <td class="w-50">
                              <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                              </div>
                            </td> --}}
                          </tr>      
                        @endforeach
                              
                    </tbody>
                  </table>
                </div>
              </div>
              {{-- سسس --}}
        </div>
    </div>    
    </div>    
@endsection
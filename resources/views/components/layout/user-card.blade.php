<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            
            <x-layout.picture url="{{$member->getAvatar(500)}}" class="avatar-xl mb-3 rounded" />
            
            <h3 class="m-0 mb-1"><a href="#">{{$member->name}}</a></h3>
            <div class="text-muted">{{$member->degree}}</div>
            <div class="mt-3">
                <span class="badge bg-purple-lt">{{$member->academic_degree}}</span>
            </div>
        </div>
        <div class="d-flex">
            <a  href="{{ route('admin.members.show', ['member' => $member->id]) }}" class="card-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path></svg>
                ارسال بريد 
            </a>
            <a  href="{{ route('admin.members.show', ['member' => $member->id]) }}" class="card-btn">
                <i class="ti ti-address-book icon me-3 text-muted"></i>
                عرض الملف
            </a>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-auto">
            <x-layout.picture url="{{$notice->member->getAvatar(200)}}" />            
        </div>
        <div class="col">
            <div class="text-truncate">
                {{$notice->message}}
            </div>
            <div class="text-muted">{{$notice->created_at}}</div>
        </div>
        <div class="col-auto align-self-center">
            <div class="badge bg-primary"></div>
        </div>
    </div>
</div>
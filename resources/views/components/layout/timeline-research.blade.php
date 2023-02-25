<li class="timeline-event">
    <div class="timeline-event-icon">
        <i class="ti ti-news"></i>
    </div>
    <div class="card timeline-event-card">
        <div class="card-body">
            <div class="text-muted float-end">تم نشرها في : {{$item->published_at}}</div>
            <h4 class="text-muted">ورقة بحثية بعنوان :</h4>
            <h4 class="text-muted">{{$item->title}}</h4>
            <h5 class="text-muted">{{$item->description}}</h5>
            @foreach ($item->media; as $paper)
            <p>{{$paper->file_name}}
            <a target="_blank" href="{{$paper->getUrl()}}">
                <span class="badge bg-azure-lt">                    
                    تحميل
                    <i class="ti ti-cloud-download"></i>
                </span>
            </a>
        </p>
            @endforeach
        </div>
    </div>
</li>
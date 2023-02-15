<li class="timeline-event">
    <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path><path d="M12 12l0 .01"></path><path d="M3 13a20 20 0 0 0 18 0"></path></svg>
    </div>
    <div class="card timeline-event-card">
        <div class="card-body">
            <div class="text-muted float-end">{{$item->created_at}}</div>            
            @if($item->collection_name == 'cvs')
            <h4 class="text-muted"> سيرة ذاتية</h4>                
            @else
            <h4 class="text-muted">اوراق بحثية</h4>            
            @endif
            <p>{{$item->name}}</p>
            <a href="{{$item->getUrl()}}">                
            <span class="badge bg-azure-lt">
                تحميل
                <i class="ti ti-cloud-download"></i>
            
            </span>
            </a>
        </div>
    </div>
</li>
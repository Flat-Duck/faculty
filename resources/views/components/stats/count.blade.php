@props(['title','count'])
<div class="col-md-6 col-xl-4">
  <div class="card card-sm">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto">
          <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
            <i class="ti ti-users"></i>
          </span>
        </div>
        <div class="col">
          <div class="font-weight-medium">
            {{$title}}
          </div>
          <div class="text-muted">
            {{$count}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
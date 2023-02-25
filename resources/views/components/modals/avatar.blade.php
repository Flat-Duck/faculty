<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="modal modal-blur fade" id="modal-team" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">الرجاء اختيار صورة شخصية</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="dropzone dz-clickable" id="dropzone-default" action="./profile/avatar" method="POST" autocomplete="off" novalidate="">
          @csrf
          <div class="dz-default dz-message"><button class="dz-button" type="button">الرجاء وضع الصورة هنا او يمكنك الضغط لاختيار الصورة</button></div>
        </form>
      </div>
      <div class="modal-footer ">
        <button type="button" id="closeok" class="btn me-auto"  data-bs-dismiss="modal">إغلاق</button>          
      </div>
    </div>
  </div>
</div>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function() {
    new Dropzone("#dropzone-default",{
      acceptedFiles:".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*",
    })
  });
  
  $('#modal-team').on('click', '#closeok', function(e) {
    location.reload();       
  });
</script>
  <input type="file" name="file" multiple="multiple" class="dz-hidden-input" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
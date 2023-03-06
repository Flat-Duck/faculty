<div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form method="POST" class="modal-content" enctype="multipart/form-data" action="{{route('admin.bulk.import')}}">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">رفع قائمة الاسماء بالجملة من ملف اكسل</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3 align-items-end">            
          <div class="col">
            <label class="form-label">اختار ملف</label>
            <input name="file" type="file" accept=".csv, text/csv, .xlsx" class="form-control" spellcheck="false" data-ms-editor="true">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">إلغاء</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">رفع</button>
      </div>
    </form>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="exampleModalLabel">اضافة خدمة جديدة</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="{{ route('add.service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label>اضف اسم الخدمة</label>
                        <input type="rext" class="form-control" name="name" />
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label>اضف صورة الخدمة</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" />
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">اضف الخدمة</button>
                </div>

            </form>
        </div>
    </div>
</div>




<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <p class="modal-title fs-5" id="exampleModalLabel">{{ __('words.modaltasktitle') }}</ح>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('add.task', $employer->id) }}" method="POST">
          @csrf
          <div class="modal-body">

              <div class="mb-3">
                  <label>{{ __('words.carno') }}</label>
                  <input type="text" class="form-control" name="car_no" />
              </div>


              <div class="mb-3">
                  <label>{{ __('words.addtask') }}</label>
                  <input type="text" class="form-control" name="task" />
              </div>

              <div class="mb-3">
                  {{-- <label>{{ __('words.addtime') }}</label>
                  <input type="datetime-local" name="task_time" class="form-control"  /> --}}
                  <label
                  for="example-datetime-local-input"
                  class=""
                  >{{ __('words.addtime') }}</label
                >
                  <div class="form-group row">
                  
                    <div class="col-sm-12 col-md-10">
                      <input
                        class="form-control w-100 datetimepicker"
                        placeholder="Choose Date anf time"
                        type="text"
                        name="task_time"
                      />
                    </div>
                  </div>

              </div>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('words.close') }}</button>
              <button type="submit" class="btn btn-primary">{{ __('words.addtask') }}</button>
          </div>

      </form>
       
      </div>
    </div>
  </div>
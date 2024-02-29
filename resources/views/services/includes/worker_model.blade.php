<div class="modal fade" id="workerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5" id="exampleModalLabel">{{ __('words.addserviceworker') }}</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add.employer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">

                        <div class="form-group">
                            <label>{{ __('words.name') }}</label>
                            <select class="custom-select2 form-control" style="width: 100%; height: 38px"
                                name="name">
                                <option value="0">{{ __('words.select') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <div class="form-group">
                            <label>{{ __('words.name') }}</label>
                            <select class="custom-select2 form-control" style="width: 100%; height: 38px"
                                name="service">
                                <option value="0">{{ __('words.select') }}</option>
                                @foreach ($data as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('words.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('words.add') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

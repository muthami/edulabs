<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form novalidate="novalidate" method="post" action="{{route('app.save-settings')}}" id="form-contact"
                      data-form="refresh" data-btn-id="btn-save-contact">

                    <h4>{{__('Workspace')}}</h4>

                    <div class="mb-3">
                        <label for="workspace_name">{{__('Workspace Name')}}</label>
                        <input type="text" class="form-control" id="workspace_name" name="workspace_name"
                               value="{{$settings['workspace_name'] ?? ''}}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label mt-4">{{__('Landing Page Language')}}</label>
                        <select class="form-select" name="frontend_language" id="choices-language">
                            @foreach($available_languages as $key => $value)
                                <option value="{{$key}}" @if(($settings['frontend_language'] ?? null)===$key) selected @endif >{{$value}}</option>
                            @endforeach
                        </select>
                    </div>


                    <input type="hidden" name="type" value="general">

                    <button type="submit" class="btn btn-primary" id="btn-save-contact">{{__('Save')}}</button>

                </form>

                <form method="post" action="{{route('app.save-settings')}}" enctype="multipart/form-data">
                    <div class="mt-4 mb-3">
                        <label for="formFileBackendLogo" class="form-label">{{__('Backend Logo')}}</label>
                        <input class="form-control" type="file" accept="image/*" name="backend_logo"
                               id="formBackendLogo">
                        <input type="hidden" name="type" value="backend_logo">
                        @csrf
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </form>


                <form method="post" action="{{route('app.save-settings')}}" enctype="multipart/form-data">
                    <div class="mt-4 mb-3">
                        <label for="formFile" class="form-label">{{__('Frontend Logo')}}</label>
                        <input class="form-control" type="file" accept="image/*" name="logo" id="formFile">
                        <input type="hidden" name="type" value="logo">
                        @csrf
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </form>
                <form method="post" action="{{route('app.save-settings')}}" enctype="multipart/form-data">
                    <div class="mt-4 mb-3">
                        <label for="formFavicon" class="form-label">{{__('Favicon')}}</label>
                        <input class="form-control" type="file" accept="image/*" name="favicon"
                               id="formFavicon">
                        <input type="hidden" name="type" value="favicon">
                        @csrf
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="photoid-settings-account">
    <div class="card-body">
        {!! Form::open(['url' => '/settings/photo_id_card', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('Photo Setting')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group" id="">
                            <label class="control-label" for="defaultUnchecked">{{__('Visitor Photo Capture')}}</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="visitor_img_capture" {{ setting('visitor_img_capture') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="visitor_img_capture" {{ setting('visitor_img_capture') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="">
                            <label class="control-label" for="defaultUnchecked">{{__('Employee Photo Capture')}}</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="employ_img_capture" {{ setting('employ_img_capture') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="employ_img_capture" {{ setting('employ_img_capture') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('ID Card Logo')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="customFile">{{ __('ID Logo') }}</label>
                            <div class="custom-file">
                                <input name="id_card_logo" type="file" class="custom-file-input @error('id_card_logo') is-invalid @enderror" id="customFile" onchange="readURL(this);">
                                <label  class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @if(setting('id_card_logo'))
                                <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage" src="{{ asset('images/'.setting('id_card_logo')) }}" alt="ID Card Logo"/>
                            @else
                                <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage" src="{{ asset('assets/default/site_logo.png') }}" alt="ID Card Logo"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-primary " type="submit">{{__('Update Settings')}} </button>
        {!! Form::close() !!}
    </div>
</div>


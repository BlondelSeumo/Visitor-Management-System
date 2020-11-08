<div id="front-end-settings-account">
    <div class="card-body">
        {!! Form::open(['url' => '/settings/front-end', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('Front-end-Enable-Disable')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group" id="">
                            <label class="control-label" for="defaultUnchecked">{{__('Front-end-Enable-Disable ')}}</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="front_end_enable_disable" {{ setting('front_end_enable_disable') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="front_end_enable_disable" {{ setting('front_end_enable_disable') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('Visitor Agreement')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group" id="">
                            <label class="control-label" for="defaultUnchecked">{{__('Visitor Agreement ')}}</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="visitor_agreement" {{ setting('visitor_agreement') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="visitor_agreement" {{ setting('visitor_agreement') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><h5>{{__('Welcome Screen Setting')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="summernote" name="welcome_screen" id="comment">{{setting('welcome_screen')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><h5>{{__('Terms & condition Setting')}}</h5></div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="summernote" name="terms_condition" id="terms_condition">{{setting('terms_condition')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-lg btn-primary " type="submit">{{__('Update')}}</button>
        {!! Form::close() !!}
    </div>
</div>

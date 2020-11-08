<div id="notification-settings-account">
    <div class="card-body">
        {!! Form::open(['url' => '/settings/notifications', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="row mb-6">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('Twilio API Settings')}}</h5></div>
                    <div class="card-body">
                        <div id="" class="form-group">
                            <label for="twilio_sid" class="control-label">{{__('Twilio Account SID')}}</label>
                            <div class="controls">
                                <input class="input-md textinput textInput form-control" id="twilio_sid" name="twilio_sid" placeholder="SID"  type="text" value="{{ setting('twilio_sid') }}"/>
                            </div>
                        </div>
                        <div id="" class="form-group ">
                            <label for="twilio_token" class="control-label ">{{__('Twilio Auth Token')}}</label>
                            <div class="controls">
                                <input class="input-md textinput textInput form-control" id="twilio_token" name="twilio_token" placeholder="Token"  type="text"  value="{{ setting('twilio_token') }}"/>
                            </div>
                        </div>
                        <div id="" class="form-group ">
                            <label for="twilio_phone" class="control-label ">{{__('Twilio From')}}</label>
                            <div class="controls">
                                <input class="input-md textinput textInput form-control" id="twilio_from" name="twilio_from" placeholder="Twilio From"  type="text"  value="{{ setting('twilio_from') }}"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h5>{{__('MSG91 API Settings')}}</h5></div>
                    <div class="card-body">
                        <div id="" class="form-group ">
                            <label for="id_name" class="control-label ">{{__('Authkey')}}</label>
                            <div class="controls">
                                <input class="input-md textinput textInput form-control" id="authkey" name="authkey" placeholder="auth Key" type="text"  value="{{ setting('authkey') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header"><h5>{{__('Host Notifications Setting')}}</h5></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" id="">
                                    <label class="control-label" for="defaultUnchecked">{{__('Email Notifications')}}</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="notifications_email" {{ setting('notifications_email') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="notifications_email" {{ setting('notifications_email') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="">
                                    <label class="" for="defaultUnchecked">{{__('SMS Notifications')}}</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="notifications_sms" {{ setting('notifications_sms') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="notifications_sms" {{ setting('notifications_sms') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="">
                                    <label class="" for="defaultUnchecked">{{__('Active Gateway')}}</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sms_gateway" {{ setting('sms_gateway') == true ? "checked":"" }} value="1">{{__('Twilio')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sms_gateway" {{ setting('sms_gateway') == false ? "checked":"" }} value="0">{{__('MSG91')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-primary " type="submit">{{__('Update Settings')}} </button>
        {!! Form::close() !!}
    </div>
</div>


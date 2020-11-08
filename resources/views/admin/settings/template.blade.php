<div id="template-settings-account">
    <div class="card-body">
        {!! Form::open(['url' => '/settings/template', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="comment">{{__('Notifications Templates')}}</label>
                    <textarea class="summernote" name="notify_templates" id="summernote">{{ setting('notify_templates') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="comment">{{__('Invite Templates')}}</label>
                    <textarea class="summernote" name="invite_templates" id="summernote">{{setting('invite_templates')}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-primary " type="submit">{{__('Update Settings ')}}</button>
        {!! Form::close() !!}
    </div>
</div>


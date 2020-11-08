<div id="profile-settings-account">
    <div class="card-body">
        {!! Form::open(['url' => '/settings/general', 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small" for="profile-name">{{__('Site Name')}}</label> <span class="text-danger"> *</span>
                    <input class="form-control form-control-lg @error('site_name') is-invalid @enderror" type="text" placeholder="Type your site name" name="site_name" id="site-name"   value="{{ old('site_name', setting('site_name')) }}">
                    @error('site_name')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="small" for="profile-phone">{{__('Site Phone')}} </label><span class="text-danger"> *</span>
                    <input class="form-control form-control-lg @error('site_phone') is-invalid @enderror" name="site_phone" id="profile-phone" type="text" placeholder="phone number"  value="{{ old('site_phone', setting('site_phone')) }}">
                    @error('site_phone')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="customFile">{{ __('Site Logo') }}</label>
                    <div class="custom-file">
                        <input name="site_logo" type="file" class="custom-file-input @error('site_logo') is-invalid @enderror" id="customFile" onchange="readURL(this);">
                        <label  class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @error('site_logo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    @if(setting('site_logo'))
                        <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage" src="{{ asset('images/'.setting('site_logo')) }}" alt="Site Logo"/>
                    @else
                        <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage" src="{{ asset('assets/default/site_logo.png') }}" alt="Site Logo"/>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="small" for="site_email">{{__('Site Email')}} </label><span class="text-danger"> *</span>
                    <input class="form-control form-control-lg @error('site_email') is-invalid @enderror" name="site_email" id="profile-email" type="email" placeholder="you@yoursite.com" value="{{ old('site_email', setting('site_email')) }}">
                    @error('site_email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="small" for="site_description">{{__('Site Description')}}</label>
                    <textarea class="form-control form-control-lg" id="site_description" name="site_description" rows="2" placeholder="Site Description" data-autosize="true">{{old('site_description',setting('site_description'))}}</textarea>
                </div>
                <div class="form-group">
                    <label class="small" for="site_address">{{__('Site Address')}}</label>
                    <textarea class="form-control form-control-lg" id="site_address" name="site_address" rows="2" placeholder="Address" data-autosize="true">{{old('site_address',setting('site_address'))}}</textarea>
                </div>
            </div>
        </div>

        <button class="btn btn-lg btn-primary " type="submit">{{__('Update Settings')}} </button>
        {!! Form::close() !!}
    </div>
</div>


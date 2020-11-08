<!-- Sidebar -->
<div class="sidebar">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container-fluid py-6">

                <div class="border-bottom text-center py-9 px-10">
                    <!-- Photo -->
                    <h4 class="font-bold mb-6 text-lg-center">
                        <a href="/" class="d-none d-xl-block mb-6">
                            @if(setting('site_logo'))
                                <img src="{{ asset('images/'.setting('site_logo')) }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
                            @else
                                <img src="{{ asset('assets/images/brand.png') }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
                            @endif
                        </a>
                        {{setting('site_name')}}
                    </h4>

                    <p class="text-muted"> {{setting('site_description')}}</p>
                </div>

                <div class="border-bottom text-center py-9 px-10">
                    <!-- Photo -->
                    <h6>{{__('Contact us')}}</h6>
                    <p class="text-muted text-sm-center">
                        Call {{setting('site_phone')}} for help
                    </p>
                    <p class="text-muted text-sm-center">
                        {{setting('site_address')}}
                    </p>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Sidebar -->

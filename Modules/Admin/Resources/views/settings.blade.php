<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Settings</h4>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <h2 class="h5 mt-0  mb-5 text-small">Settings </h2>
                                </div>


                            </div>

                            <div class="table-responsive">
                                @if(isset($site_settings))
                                    <div class="form-group">
                                        <label>Site Name</label>: {{ $site_settings->site_name }}
                                    </div>
                                    <div class="form-group">
                                        <label>Site Logo</label>: <img src="{{ asset($site_settings->site_logo) }}"
                                                                       class="img-thumbnail h-12"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Motto</label>: {{ $site_settings->site_motto }}
                                    </div>
                                    <div class="form-group">
                                        <label>Site CAC</label>: {{ $site_settings->site_cac }}
                                    </div>
                                    <div class="form-group">
                                        <label>Site Description</label>: {{ $site_settings->site_description }}
                                    </div>
                                    <div class="form-group">
                                        <label>Site Email</label>: {{ $site_settings->site_email }}
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>: {{ $site_settings->contact_number }}
                                    </div>
                                    <div class="form-group">
                                        <label>Site Address</label>: {{ $site_settings->site_address }}
                                    </div>
                                    <div class="form-group">
                                        <div class="single-info">
                                            <h3>Opening hours</h3>
                                            <ul>
                                                @isset($site_settings)
                                                    @foreach($site_settings->opening_hours as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                @endisset
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook Handler</label>: {{ $site_settings->facebook_handler }}
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Handler</label>: {{ $site_settings->twitter_handler }}
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn Handler</label>: {{ $site_settings->linkedin_handler }}
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram Handler</label>: {{ $site_settings->instagram_handler }}
                                    </div>
                                    <div class="form-group">
                                        <label>Default Currency</label>: {{ $site_settings->currency->name }}
                                    </div>
                                    <div class="form-group">
                                        <label>Tax</label>: {{ $site_settings->tax }}%
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('control.settings.edit') }}" class="btn btn-outline-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
</x-master-layout>

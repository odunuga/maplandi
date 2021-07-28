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

                            <form action="{{ route('control.settings.update')  }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="table-responsive">
                                    @if(isset($site_settings))
                                        <div class="form-group">
                                            <label>Site Name</label>: <input type="text" class="form-control"
                                                                             name="site_name"
                                                                             value="{{ $site_settings->site_name }}"
                                                                             placeholder="Site Name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Logo</label>: <input type="file" name="site_logo"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Motto</label>: <input type="text" class="form-control"
                                                                              name="site_motto"
                                                                              value="{{ $site_settings->site_motto }}"
                                                                              placeholder="Site Motto"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Site CAC</label>: <input type="text" class="form-control" value="{{ $site_settings->site_cac }}" name="site_cac"
                                                                            placeholder="Site CAC"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>Site Description</label>: <textarea class="form-control"
                                                                                       name="site_description" rows="5"
                                                                                       required>
                                                {{ $site_settings->site_description }}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Email</label>: <input type="text" class="form-control"
                                                                              name="site_email" placeholder="Site Email"
                                                                              value="{{ $site_settings->site_email }}"
                                                                              required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>: <input type="text" class="form-control"
                                                                                  name="contact_number"
                                                                                  placeholder="Contact Number"
                                                                                  value="{{ $site_settings->contact_number }}"
                                                                                  required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Address</label>: <input type="text" name="site_address" class="form-control" value="{{ $site_settings->site_address }}"
                                                                                placeholder="Site Address"
                                                                                required/>
                                        </div>
                                        <div class="form-group">
                                            <div class="single-info">
                                                <h3>Opening hours</h3>
                                                <select name="opening_hours[]" class="form-control"
                                                        multiple>
                                                    @isset($site_settings)
                                                        @foreach($site_settings->opening_hours as $item)
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook Handler</label>: <input type="text" class="form-control"
                                                                                    name="facebook-handler"
                                                                                    placeholder="Facebook"
                                                                                    value="{{ $site_settings->facebook_handler }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Handler</label>: <input type="text" class="form-control"
                                                                                   name="twitter-handler"
                                                                                   placeholder="Twitter"
                                                                                   value="{{ $site_settings->twitter_handler }}"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label>LinkedIn Handler</label>: <input type="text" class="form-control"
                                                                                    name="Linkedln_handler"
                                                                                    placeholder="Linkedln "
                                                                                    value="{{ $site_settings->linkedin_handler }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Instagram Handler</label>: <input type="text" class="form-control"
                                                                                     name="instagram_handler"
                                                                                     placeholder="Instagram"
                                                                                     value="{{ $site_settings->instagram_handler }}"
                                            />
                                        </div>
                                        <div class="form-group">
                                            @if(isset($currencies))
                                                <label>Default Currency</label>:
                                                <select name="default_currency" class="form-control" required>
                                                    <option value="">{{ $site_settings->currency->name }}</option>
                                                    @foreach($currencies as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Tax</label>: <input type="text" class="form-control" name="tax"
                                                                       value="{{ $site_settings->tax }}"
                                                                       placeholder="Tax in %"
                                                                       required/>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-success"> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <script>
        $('select').select2();
    </script>
</x-master-layout>

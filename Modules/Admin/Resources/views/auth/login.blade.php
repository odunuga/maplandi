<x-master-layout>
    @slot("body_class") bg-light @endslot
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                @include('admin::partials.center_logo')
                <h5 class="font-18 text-center">{{__("auth.login.title")}}</h5>

                <form method="post" class="form-horizontal m-t-30" action="{{ route('control.login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-12">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   placeholder="Email" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password" placeholder="password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">

                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block btn-lg waves-effect waves-light"
                                    type="submit">{{__('buttons.login')}}
                            </button>
                        </div>
                    </div>

                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="{{ route('control.forget.password.get') }}" class="text-muted"><i
                                    class="fa fa-lock m-r-5"></i> {{__('buttons.forgot')}}</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</x-master-layout>

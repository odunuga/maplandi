<x-master-layout>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                @include('admin::partials.center_logo')
                <form class="form-horizontal m-t-30" action="">
                    <h5 class="font-18 text-center">{{__("auth.recover.title")}}</h5>
                    <div class="form-group text-center m-t-20">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-12">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit"
                                                class="btn btn-danger btn-block btn-lg waves-effect waves-light">
                                            {{ __('Send Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</x-master-layout>

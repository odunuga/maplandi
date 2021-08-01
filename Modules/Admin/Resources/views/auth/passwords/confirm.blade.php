<x-master-layout>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                @include('admin::partials.center_logo')
                <h5 class="font-18 text-center">{{__('Confirm Password')}}</h5>

                <form class="form-horizontal m-t-30" action="{{ route('control.forget.password.post') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-12">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block btn-lg waves-effect waves-light" type="submit">
                                Update Changes
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master-layout>

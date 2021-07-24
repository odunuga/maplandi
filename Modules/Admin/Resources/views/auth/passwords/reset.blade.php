<x-master-layout>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                @include('admin::partials.center_logo')
                <h5 class="font-18 text-center">Update your Password</h5>

                <form class="form-horizontal m-t-30" action="{{ route('password.update') }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="col-12">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ $email ?: old('email') }}" required autocomplete="email" autofocus>
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
                                   required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">

                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block btn-lg waves-effect waves-light" type="submit">
                                Update Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master-layout>

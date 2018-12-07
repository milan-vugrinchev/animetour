@extends('auth.app')

@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left">
                <div class="main_title">
                    <h1 class="p-0 d-inline-block text-center mb-5">Reset Password</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex">

            <div class="col-md-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-12 mt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@extends('admin.admin_main')


@section('content')
            <p class="login-box-msg">Reset Password</p>
            <form action="#" method="post">
                @csrf
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <label for="email" class="">E-Mail Address:</label>
                <div class="input-group mb-3">

                    <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="col-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>

@endsection



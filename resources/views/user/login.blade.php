@extends('user.app')
@section('content')

    <div class="register-box  ">
        <div class="register-logo">
            <a href="#">Login</a>
        </div>
        @if(session()->has('message'))
        <div >
            <span class="alert alert-success"><strong>{{ session()->get('message') }}</strong></span>
        </div>
        @endif
        <div class="card">
            <div class="card-body register-card-body">



                <form action="{{route('user.postLogin')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <!-- /.col -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="{{route('user.register')}}" class="text-center">Sign up</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>

@endsection

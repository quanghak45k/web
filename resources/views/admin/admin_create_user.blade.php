@extends('admin.layout.admin_home_main')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="">


                <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 ">

                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 table" style="background-color: #007bff0a; border-color: lightgrey">
                            <form action="#" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" class="form-control" style="height:50px" name="email"
                                           placeholder="email"/>
                                </div>
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 ">

                        </div>



                </div>


        </div>

    </div>

@endsection

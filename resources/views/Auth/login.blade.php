@extends('Components.Layouts.main')
@section('pageTitle' , 'Create Employee')

@section('content')
    <div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-warning" id="errorMessage">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success" id="message">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="form-control">
                <div class="m-2 p-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email"
                           required>
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password"  placeholder="Password" required>
                </div>

                <div class="m-2 p-2 text-end">
                    <input type="submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
@endsection


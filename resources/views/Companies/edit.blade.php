<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

@extends('Components.Layouts.main')
@section('pageTitle' , "Edit $company->name")

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
        <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$company->id}}">
            <div class="form-control">
                <div class="m-2 p-2">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name', $company->name)}}" placeholder="Name"
                           required>
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email', $company->email)}}" placeholder="Email">
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Website</label>
                    <input class="form-control" type="text" name="website" value="{{old('website', $company->website)}}"
                           placeholder="Website">
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Logo</label>
                    <input class="form-control" type="file" name="logo" placeholder="Logo">
                </div>

                <div class="m-2 p-2 text-end">
                    <input type="submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $('#companies').addClass('active');
        $('#home').removeClass('active');
        $('#employees').removeClass('active');
    })
</script>

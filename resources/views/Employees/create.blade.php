<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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
        <form action="{{route('employee.store')}}" method="POST">
            @csrf
            <div class="form-control">
                <div class="m-2 p-2">
                    <label class="form-label">First Name</label>
                    <input class="form-control" type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name"
                           required>
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name" required>
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email')}}"
                           placeholder="Email">
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Phone</label>
                    <input class="form-control" type="text" name="phone" placeholder="Phone">
                </div>

                <div class="m-2 p-2">
                    <label class="form-label">Company</label>
                    <select name="company_id" class="form-select">
                        @foreach($companies as $id => $company)
                            <option value="{{$id}}" {{old('company_id') == $id ? 'selected' : ''}}>
                                {{$company}}
                            </option>
                        @endforeach
                    </select>
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
        $('#employees').addClass('active');
        $('#home').removeClass('active');
        $('#companies').removeClass('active');
    })
</script>

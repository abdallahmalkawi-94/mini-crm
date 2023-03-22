<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
@extends('Components.Layouts.main')
@section('pageTitle' , 'Employees')

@section('content')

    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success" id="message">
                {{ session('message') }}
            </div>
        @endif
        <a class="btn btn-primary rounded-0 mb-3" href="{{route('employee.create')}}">Create</a>
        <table class="table table-bordered mb-5">
            <thead class="text-center">
            <tr class="bg-primary text-white">
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                    <td>{{ $employee->email ?? 'N/A'}}</td>
                    <td>{{ $employee->phone ?? 'N/A'}}</td>
                    <td>{{ $employee->Company->name}}</td>
                    <td class="text-center">
                        <a href="{{route('employee.edit' , ['employee' => $employee])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $employees->links() !!}
        </div>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $('#employees').addClass('active');
        $('#home').removeClass('active');
        $('#companies').removeClass('active');
    })
</script>

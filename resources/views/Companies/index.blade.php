<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

@extends('Components.Layouts.main')
@section('pageTitle' , 'Companies')
@section('content')

    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success" id="message">
                {{ session('message') }}
            </div>
        @endif
        <a class="btn btn-primary rounded-0 mb-3" href="{{route('company.create')}}">Create</a>
        <table class="table table-bordered mb-5">
            <thead class="text-center">
            <tr class="bg-primary text-white">
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>
                        <img src="{{ url('storage/app/' . $company->logo)}}" alt="Company Logo">
                    </td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website ?? 'N/A'}}</td>
                    <td class="text-center">
                        <a href="{{route('company.edit' , ['company' => $company])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $companies->links() !!}
        </div>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $('#companies').addClass('active');
        $('#home').removeClass('active');
        $('#employees').removeClass('active');
    })
</script>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mini-CRM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" id="home" aria-current="page" href="{{route('index')}}" style="font-size: 1rem">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="companies" href="{{route('company.index')}}" style="font-size: 1rem">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="employees" href="{{route('employee.index')}}" style="font-size: 1rem">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="employees" href="{{route('logout')}}" style="font-size: 1rem">Logout</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>

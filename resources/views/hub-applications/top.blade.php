<div class="container">
    <header class="d-flex justify-content-center border-bottom py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/hub-applications" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/hub-applications/profile" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Occupants</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Documents</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Summary</a></li>
            <li class="nav-item">
                <form method="POST" action="/hub-applications/logout">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">Logout
                    </button>
                </form>
            </li>
        </ul>
    </header>
</div>

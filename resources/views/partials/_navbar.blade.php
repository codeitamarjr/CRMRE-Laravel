<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a
            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-building"></i></div>
            <div class="sidebar-brand-text mx-3"><span>{{auth()->user()->prs_code}}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link active" href="/">
                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="/enquiries">
                <i class="fas fa-user"></i><span>Enquiries</span></a>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>

{{-- Remember sidebarToggle state --}}
<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        if (localStorage.getItem('sidebarToggle') == 'true') {
            localStorage.setItem('sidebarToggle', 'false');
        } else {
            localStorage.setItem('sidebarToggle', 'true');
        }
    });
</script>

{{-- Apply sidebarToggle state --}}
<script>
    if (localStorage.getItem('sidebarToggle') == 'true') {
        document.getElementsByClassName('sidebar-dark')[0].classList.add('toggled');
    }
</script>
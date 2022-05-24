<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == '' ? 'active' : '' ?>" aria-current="page" href="?page=">
            <span data-feather="home"></span>
            Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'dosen' || $_GET['page'] == 'dosen_create' ? 'active' : '' ?>" href="?page=dosen">
            <span data-feather="user"></span>
            Dosen
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'matakuliah' ? 'active' : '' ?>" href="?page=matakuliah">
            <span data-feather="book"></span>
            Matakuliah
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'tugas' ? 'active' : '' ?>" href="?page=tugas">
            <span data-feather="clipboard"></span>
            Tugas
        </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
        </a>
        </li> -->
    </ul>
</nav>
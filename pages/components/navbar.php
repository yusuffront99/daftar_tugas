<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'dashboard' ? 'active' : '' ?>" aria-current="page" href="?page=">
            <span data-feather="home"></span>
            Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'dosen' ? 'active' : '' ?>" href="?page=dosen">
            <span data-feather="file"></span>
            Dosen
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'matakuliah' ? 'active' : '' ?>" href="?page=matakuliah">
            <span data-feather="shopping-cart"></span>
            Matakuliah
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $_GET['page'] == 'tugas' ? 'active' : '' ?>" href="?page=tugas">
            <span data-feather="users"></span>
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
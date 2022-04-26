    <?php 

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            
            switch($page) {
                case '';
                    include "dashboard.php";
                    break;
                case 'dosen';
                    include "dosen/dosen.php";
                    break;
                case 'matakuliah';
                    include "matakuliah/matakuliah.php";
                    break;
                case 'tugas';
                    include "tugas/tugas.php";
                    break;
                default:
                    include "dashboard.php";
            }
        } else {
            include "dashboard.php";
        }
    ?>
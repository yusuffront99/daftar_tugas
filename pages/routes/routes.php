    <?php 

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            
            switch($page) {
                case '';
                    file_exists("dashboard.php") ? include "dashboard.php" : include "404.php";
                    break;
                case 'dosen';
                    file_exists("dosen/index.php") ?  include "dosen/index.php" : include "404.php";
                    break;
                case 'dosen_create';
                    file_exists("dosen/dosen_create.php") ?  include "dosen/dosen_create.php" : include "404.php";
                    break;
                case 'matakuliah';
                    file_exists("matakuliah/index.php") ?  include "matakuliah/index.php" : include "404.php";
                    break;
                case 'tugas';
                    file_exists("tugas/index.php") ?  include "tugas/index.php" : include "404.php";
                    break;
                default:
                    include "404.php";
                    break;
            }
        } else {
            include "dashboard.php";
        }
    ?>
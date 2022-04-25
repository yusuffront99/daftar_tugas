<!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
            <th scope="col">Header</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1,001</td>
            <td>random</td>
            <td>data</td>
            <td>placeholder</td>
            <td>text</td>
        </tr>
        <tr>
            <td>1,002</td>
            <td>placeholder</td>
            <td>irrelevant</td>
            <td>visual</td>
            <td>layout</td>
        </tr>
        <tr>
            <td>1,003</td>
            <td>data</td>
            <td>rich</td>
            <td>dashboard</td>
            <td>tabular</td>
        </tr>
        </tbody>
    </table>
    </div> -->

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
                default:
                    include "dashboard.php";
            }
        } else {
            include "dashboard.php";
        }
    ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dosen</h1>
    </div>

    <div class="table-responsive">
        <?php 
            if($_SESSION['message'] != "kosong"){
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['message'] ?>
            </div>
        <?php
        $_SESSION['message'] = "kosong";
            }
        ?>
        <a href="?page=dosen_create" class="btn btn-success btn-sm mb-3"><span data-feather="plus"></span> Tambah Data</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#No</th>
                <th scope="col">Nama</th>
                <th scope="col">Handphone</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!-- FETCH DATABASE DOSEN -->
            <?php 
                include_once('../database/database.php');
                $database = new Database;
                $connection = $database->getConnection();

                $selectSQL = "SELECT * FROM dosen";
                $statement = $connection->prepare($selectSQL);
                $statement->execute();

                $no = 1;
                while($data = $statement->fetch(PDO::FETCH_ASSOC)){
            ?>
                <!-- END CODE -->
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_dosen'] ?></td>
                    <td><?php echo $data['handphone'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td>
                        <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <a href="" class="badge bg-danger"><span data-feather="trash"></span></a>
                    </td>
                </tr>
                <?php
                };
                ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">MataKuliah</h1>
    </div>

    <div class="table-responsive">
        <?php 
            if($_SESSION['message'] != "kosong"){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['message']?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        $_SESSION['message'] = "kosong";
            }
        ?>
        <a href="?page=matakuliah_create" class="btn btn-success btn-sm mb-3"><span data-feather="plus"></span> Tambah Data</a>

        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Dosen Pengampu</th>
                <th>MataKuliah</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- FETCH DATABASE DOSEN -->
            <?php 
                include_once('../database/database.php');
                $database = new Database;
                $connection = $database->getConnection();

                $selectSQL = "SELECT matakuliah.nama_matakuliah, matakuliah.hari, matakuliah.jam, matakuliah.id, dosen.nama_dosen  FROM matakuliah LEFT JOIN dosen ON matakuliah.dosen_id = dosen.id";

                $statement = $connection->prepare($selectSQL);
                $statement->execute();

                $no = 1;
                while($data = $statement->fetch(PDO::FETCH_ASSOC)){
                
            ?>
                <!-- END CODE -->
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_dosen'] ?></td>
                    <td><?php echo $data['nama_matakuliah'] ?></td>
                    <td><?php echo $data['hari'] ?></td>
                    <td><?php echo $data['jam'] ?></td>
                    <td>
                    <a href="?page=matakuliah_update&id=<?php echo $data['id']?>" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <a href="" class="badge bg-danger"><span data-feather="trash"></span></a>
                    </td>
                </tr>
                <?php
                };
                ?>
        </tbody>
        </table>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tugas</h1>
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
        <a href="?page=tugas_create" class="btn btn-success btn-sm mb-3"><span data-feather="plus"></span> Buat Tugas</a>

        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tugas</th>
                <th>Nama Matakuliah</th>
                <th>Keterangan</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- FETCH DATABASE DOSEN -->
            <?php 
                include_once('../database/database.php');
                $database = new Database;
                $connection = $database->getConnection();

                $selectSQL = "SELECT tugas.nama_tugas,  tugas.keterangan, tugas.deadline_date, tugas.deadline_time, tugas.id, matakuliah.nama_matakuliah  FROM tugas LEFT JOIN matakuliah ON tugas.matakuliah_id = matakuliah.id";

                $statement = $connection->prepare($selectSQL);
                $statement->execute();

                $no = 1;
                while($data = $statement->fetch(PDO::FETCH_ASSOC)){
                
            ?>
            <!-- END CODE -->
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nama_tugas']?></td>
                <td><?php echo $data['nama_matakuliah']?></td>
                <td><?php echo $data['keterangan']?></td>
                <td><?php echo $data['deadline_date']?> <div class="badge bg-danger"><?php echo $data['deadline_time']?></div></td>
                <td>
                    <a href="?page=tugas_update&id=<?php echo $data['id']?>" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <a href="?page=tugas_delete&id=<?php echo $data['id']?>" class="badge bg-danger"><span data-feather="trash"></span></a>
                </td>
            </tr>

            <?php 
                }
            ?>
        </tbody>
        </table>
</div>

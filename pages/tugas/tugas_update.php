<?php
include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];

    $findSQL = "SELECT * FROM tugas WHERE id = ?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    $data = $statement->fetch();

    if(isset($_POST['btn-simpan'])){
        $nama_tugas = $_POST['nama_tugas'];
        $matakuliah_id = $_POST['matakuliah_id'];
        $keterangan = $_POST['keterangan'];
        $deadline_date = $_POST['deadline_date'];
        $deadline_time = $_POST['deadline_time'];


        $updateSQL = "UPDATE `tugas` SET `nama_tugas` = ?, `matakuliah_id` = ?, `keterangan` = ?, `deadline_date` = ?, `deadline_time` = ? WHERE `tugas`.`id` = ?";

        $statement = $connection->prepare($updateSQL);
        $statement->bindParam(1, $nama_tugas);
        $statement->bindParam(2, $matakuliah_id);
        $statement->bindParam(3, $keterangan);
        $statement->bindParam(4, $deadline_date);
        $statement->bindParam(5, $deadline_time);
        $statement->bindParam(6, $id);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Berhasil simpan data";
    header('Location: main.php?page=tugas');
    }
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];

    // $findSQL = "SELECT * FROM tugas WHERE id = ?";
    $findSQL = "SELECT * FROM tugas WHERE id = ?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    $data = $statement->fetch();
    print_r($data);
?>


<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    // $id = $_GET['id'];

    // $findSQL = "SELECT * FROM tugas WHERE id = ?";
    $findSQL = "SELECT id, nama_matakuliah FROM matakuliah";
    $statement = $connection->prepare($findSQL);
    // $statement->bindParam(1, $id);
    $statement->execute();
    $item = $statement->fetch();
    print_r($item);
    
?>

<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Tugas Baru</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_tugas" class="form-label">Nama Tugas</label>
                    <input type="text" name="id" id="" value="<?php $data['id']?>" hidden>
                    <input type="text" name="nama_tugas" id="" value="<?php echo $data['nama_tugas']?>" class="form-control">
                </div>
                <div class="mb-3">
                    <select name="matakuliah_id" id="" class="form-select">
                        <option value="<?php echo $data['matakuliah_id']?>"><?php echo $item['nama_matakuliah']?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control" placeholder="Masukkan Keterangan"><?php echo $data['keterangan']?></textarea>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <input type="date" name="deadline_date" value="<?php echo $data['deadline_date']?>" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="deadline_time" value="<?php echo $data['deadline_time']?>" class="form-control">
                        </div>
                    </div>
                </div>
    
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


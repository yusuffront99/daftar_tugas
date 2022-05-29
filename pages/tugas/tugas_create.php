<!-- ACTION ADD DATA -->
<?php 
    if(isset($_POST['btn-simpan'])){
        
        $nama_tugas = $_POST['nama_tugas'];
        $matakuliah_id = $_POST['matakuliah_id'];
        $keterangan = $_POST['keterangan'];
        $deadline_date = $_POST['deadline_date'];
        $deadline_time = $_POST['deadline_time'];

        $createSQL = "INSERT INTO `tugas` (`id`,`nama_tugas`, `matakuliah_id`, `keterangan`, `deadline_date`, `deadline_time`) VALUES (NULL, ?,?,?,?,?)";

        include_once("../database/database.php");
        $database = new Database;
        $connection = $database->getConnection();
        $statement = $connection->prepare($createSQL);
        $statement->bindParam(1, $nama_tugas);
        $statement->bindParam(2, $matakuliah_id);
        $statement->bindParam(3, $keterangan);
        $statement->bindParam(4, $deadline_date);
        $statement->bindParam(5, $deadline_time);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Tugas Baru Berhasil Dibuat";
    header('Location: main.php?page=tugas');
    }
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $sql = "SELECT matakuliah.nama_matakuliah, matakuliah.id, dosen.nama_dosen  FROM matakuliah LEFT JOIN dosen ON matakuliah.dosen_id = dosen.id";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll();
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
                    <input type="text" name="nama_tugas" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="matakuliah_id" class="form-label">MataKuliah</label>
                    <select name="matakuliah_id" class="form-select">
                        <?php foreach($data as $dt) { ?>
                            <option value="<?php echo $dt['id']?>"><?php echo $dt['nama_matakuliah']?><span style='font-size:100px;'>&#9193; <?php echo $dt['nama_dosen']?></span></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="4" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <input type="date" name="deadline_date" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <input type="time" name="deadline_time" class="form-control">
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


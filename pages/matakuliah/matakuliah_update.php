<!-- ACTION ADD DATA -->
<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];

    $findSQL = "SELECT * FROM matakuliah WHERE id = ?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    $data = $statement->fetch();

    if(isset($_POST['btn-simpan'])){
        $dosen_id = $_POST['dosen_id'];
        $nama_matakuliah = $_POST['nama_matakuliah'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];

        $updateSQL = "UPDATE `matakuliah` SET `dosen_id` = ?, `nama_matakuliah` = ?, `hari` = ?, `jam` = ? WHERE `matakuliah`.`id` = ?";

        $statement = $connection->prepare($updateSQL);
        $statement->bindParam(1, $dosen_id);
        $statement->bindParam(2, $nama_matakuliah);
        $statement->bindParam(3, $hari);
        $statement->bindParam(4, $jam);
        $statement->bindParam(5, $id);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Berhasil simpan data";
    header('Location: main.php?page=matakuliah');
    }
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];

    $findSQL = "SELECT * FROM matakuliah WHERE id = ?";
    $statement = $connection->prepare($findSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    $data = $statement->fetch();
    
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $findSQL = "SELECT id, nama_dosen FROM dosen";
    $statement = $connection->prepare($findSQL);
    $statement->execute();
    $items = $statement->fetchAll();
    
?>

<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data MataKuliah</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <input type="text" value="<?php $data['id']?>" hidden>
                <div class="mb-3">
                    <select name="dosen_id" id="" class="form-select">
                        <?php foreach($items as $item) {?>
                            <option value="<?php echo $item['id']?>"
                            <?php if($item['id'] == $data['dosen_id']){
                                echo "selected";
                            }
                            ?>><?php echo $item['nama_dosen']?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="nama_matakuliah" class="form-label">MataKuliah</label>
                    <select name="nama_matakuliah" class="form-select">
                        <option value="">-- Pilih Matakuliah --</option>
                        <option value="Algoritma" <?php if($data['nama_matakuliah'] == "Algoritma") { echo 'selected';}?>>Algoritma</option>
                        <option value="Java" <?php if($data['nama_matakuliah'] == "Java") { echo 'selected';}?>>Java</option>
                        <option value="Basis Data" <?php if($data['nama_matakuliah'] == "Basis Data") { echo 'selected';}?>>Basis Data</option>
                        <option value="Riset Operasi" <?php if($data['nama_matakuliah'] == "Riset Operasi") { echo 'selected';}?>>Riset Operasi</option>
                        <option value="Pemograman Web" <?php if($data['nama_matakuliah'] == "Pemograman Web") { echo 'selected';}?>>Pemograman Web</option>
                        <option value="Keamanan Jaringan" <?php if($data['nama_matakuliah'] == "Keamanan Jaringan") { echo 'selected';}?>>Keamanan Jaringan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <select name="hari" class="form-select">
                        <option value="Senin" <?php if($data['hari'] == "Senin"){echo 'selected';}?>>Senin</option>
                        <option value="Selasa" <?php if($data['hari'] == "Selasa"){echo 'selected';}?>>Selasa</option>
                        <option value="Rabu" <?php if($data['hari'] == "Rabu"){echo 'selected';}?>>Rabu</option>
                        <option value="Kamis" <?php if($data['hari'] == "Kamis"){echo 'selected';}?>>Kamis</option>
                        <option value="Jum'at" <?php if($data['hari'] == "Jum'at"){echo 'selected';}?>>Jum'at</option>
                        <option value="Sabtu" <?php if($data['hari'] == "Sabtu"){echo 'selected';}?>>Sabtu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" name="jam" class="form-control" id="" value="<?php echo $data['jam']?>" placeholder="masukkan jam...">
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


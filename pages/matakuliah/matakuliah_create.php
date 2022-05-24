<!-- ACTION ADD DATA -->
<?php 
    if(isset($_POST['btn-simpan'])){
        $nama_dosen = $_POST['nama_dosen'];
        $handphone = $_POST['handphone'];
        $email = $_POST['email'];

        $createSQL = "INSERT INTO `dosen` (`id`,`nama_dosen`,`handphone`,`email`) VALUES (NULL, ?,?,?)";

        include_once("../database/database.php");
        $database = new Database;
        $connection = $database->getConnection();
        $statement = $connection->prepare($createSQL);
        $statement->bindParam(1, $nama_dosen);
        $statement->bindParam(2, $handphone);
        $statement->bindParam(3, $email);
        $statement->execute();
?>

<?php
    $_SESSION['message'] = "Berhasil simpan data";
    header('Location: main.php?page=dosen');
    }
?>

<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $sql = "SELECT id, nama_dosen FROM dosen";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
?>

<!-- ACTION ADD DATA -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah MataKuliah</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Dosen Pengampu</label>
                    <select name="dosen_id" id="" class="form-select">
                        <?php 
                            while($data = $statement->fetch()){
                                echo '<option value='.$data['id'].'>'.$data['nama_dosen'].'</option>';
                            }
                        ?>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="nama_matakuliah" class="form-label">MataKuliah</label>
                    <select name="nama_matakuliah" class="form-select">
                        <option value="">-- Pilih Matakuliah --</option>
                        <option value="algoritma">Algoritma</option>
                        <option value="java">Java</option>
                        <option value="riset_operasi">Riset Operasi</option>
                        <option value="web">Pemograman Web</option>
                        <option value="jaringan">Keamanan Jaringan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <input type="text" name="hari" id="hari" class="form-control" placeholder="Masukkah Hari...">
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" name="jam" class="form-control" id="" placeholder="masukkan jam...">
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" name="btn-simpan" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


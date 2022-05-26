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
        <a href="?page=tugas_create" class="btn btn-success btn-sm mb-3"><span data-feather="plus"></span> Buat Tugas</a>

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
        </tbody>
        </table>
</div>

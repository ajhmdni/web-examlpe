<div class="container-fluid">
    <div class="row">
        <?php
        include "admin/template/menu.php";
        $id = $_GET['id'];
        $query = "SELECT * FROM anggota a, jabatan j, user u WHERE a.jabatan_id = j.id AND a.user_id = u.id AND a.user_id = '$id'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Anggota</h1>
            </div>
            <form action="fungsi/edit.php?anggota=edit" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Form Edit Anggota
                            </div>
                            <div class="card-body">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['user_id'] ?>">
                                    <div class="mb-3">
                                        <label for="nama" class="col-form-label">Nama:</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Jabatan:</label>
                                        <select name="jabatan" class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Jawaban</option>
                                            <?php
                                            $query2 = "SELECT * FROM jabatan ORDER BY jabatan ASC";
                                            $result2 = mysqli_query($koneksi, $query2);
                                            while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                                <option value="<?= $row2['id'] ?>" <?= $row['jabatan_id'] == $row2['id'] ? 'selected' : '' ?>><?= $row2['jabatan'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" <?= $row['jenis_kelamin'] == 'L' ? 'checked' : ''  ?>>
                                            <label for="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" <?= $row['jenis_kelamin'] == 'P' ? 'checked' : ''  ?>>
                                            <label for="form-check-label" for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="col-form-label">Alamat:</label>
                                        <textarea class="form-control" name="alamat"><?= $row['alamat'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telp" class="col-form-label">No Telp:</label>
                                        <input type="number" name="no_telp" class="form-control" value="<?= $row['no_telp'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Form Edit Login Pengguna
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Username:</label>
                                    <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Password:</label>
                                    <input type="password" name="password" class="form-control">
                                    <div class="form-text">Kosongi password, jika tidak ingin menggantinya.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-hidden="true"><i class="fa fa-floppy-o"></i> Ubah</button>
                                    <a href="index.php?page=anggota" class="btn btn-secondary" aria-hidden="true"><i class="fa fa-times"></i> Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- CARD -->
        <div class="card">
            <h5 class="card-header bg-secondary text-white">Data Pegawai</h5>
            <div class="card-body">
                <!-- LOKASI TEXT PENCARIAN -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $katakunci ?>"
                            placeholder="Masukan kata kunci" name="katakunci" aria-label="Masukan kata kunci"
                            aria-describedby="Cari">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>

                <!-- ##MODAL## -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Tambah Data Pegawai
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pegawai</h1>
                                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- JIKA ERROR -->
                                <div class="alert alert-danger error" role="alert" style="display:none;"></div>
                                <!-- KALAU SUSKSES -->
                                <div class="alert alert-primary sukses" role="alert" style="display:none;"></div>
                                <!-- INPUT FORM DATA -->
                                <input type="hidden" id="inputId">
                                <div class="mb-3 row">
                                    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputBidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <select id="inputBidang" class="form-select">
                                            <option value="finance">Finance</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="hr">HR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAlamat">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary tombol-tutup"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bidang</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPegawai as $k => $v) {
                            $nomor = $nomor + 1;
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $v['nama']; ?></td>
                                <td><?php echo $v['email']; ?></td>
                                <td><?php echo $v['bidang']; ?></td>
                                <td><?php echo $v['alamat']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onclick="edit(<?php echo $v['id'] ?>)">Edit</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="hapus(<?php echo $v['id'] ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $linkPagination = $pager->links();
                $linkPagination = str_replace('<li class = "active">', '<li class = "page-item active">', $linkPagination);
                $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                $linkPagination = str_replace('<a', '<a class="page-link"', $linkPagination);
                echo $linkPagination;
                ?>
            </div>
        </div>
    </div>
    </div>

    <!-- SCRIPT JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        function hapus($id) {
            var result = confirm("Apakah Anda Yakin ingin menghapus data ini?");
            if (result) {
                window.location = "<?php echo site_url('pegawai/hapus') ?>/" + $id;
            }
        }

        function edit($id) {
            $.ajax({
                url: "<?php echo site_url('pegawai/edit') ?>/" + $id,
                type: 'get',
                success: function (hasil) {
                    var obj = $.parseJSON(hasil);
                    if (obj.id != '') {
                        $('#inputId').val(obj.id);
                        $('#inputNama').val(obj.nama);
                        $('#inputEmail').val(obj.email);
                        $('#inputBidang').val(obj.bidang);
                        $('#inputAlamat').val(obj.alamat);
                    }

                }
            });
        }

        function bersihkan() {
            $('#inputId').val('');
            $('#inputNama').val('');
            $('#inputEmail').val('');
            $('#inputAlamat').val('');
        }

        $('tombol-tutup').on('click', function () {
            if ($('.sukses').is(":visible")) {
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>"
            }
            $('.alert').hide();
            bersihkan();
        })
        $('#tombolSimpan').on('click', function () {
            var id = $('#inputId').val();
            var nama = $('#inputNama').val();
            var email = $('#inputEmail').val();
            var bidang = $('#inputBidang').val();
            var alamat = $('#inputAlamat').val();

            $.ajax({
                url: "<?php echo site_url("/simpan") ?>",
                type: "POST",
                data: {
                    id: id,
                    nama: nama,
                    email: email,
                    bidang: bidang,
                    alamat: alamat
                },
                success: function (hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                },
            });
            bersihkan();
        });
    </script>
</body>

</html>
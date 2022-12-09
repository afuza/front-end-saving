<?php
$tittle = "Email Saving";
include('../views/page_layout.php'); ?>

<div class="container-fluid">
    <div class="row pt-3">
        <?php
        if (@$_GET['status'] == "success") {
            echo '
    <div class="col-lg-12">
    <div class="alert alert-success inverse alert-dismissible fade show" role="alert">
    <p><i class="icon-thumb-up alert-center"></i><b> Congratulation! </b>Data berhasil disimpan.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    ';
        } elseif (@$_GET['status'] == "failed") {
            echo '
    <div class="col-lg-12">
    <div class="alert alert-danger inverse alert-dismissible fade show" role="alert">
    <p><i class="icon-thumb-down"></i><b>Failed!</b> Data Gagal disimpan.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    ';
        } elseif (@$_GET['status'] == "file") {
            echo '
    <div class="col-lg-12">
    <div class="alert alert-warning inverse alert-dismissible fade show" role="alert">
    <p><i class="icon-alert"></i> <b>Failed!</b> Ukuran File Terlalu Besar.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    ';
        } elseif (@$_GET['status'] == "none") {
            echo '
    <div class="col-lg-12">
    <div class="alert alert-warning inverse alert-dismissible fade show" role="alert">
    <p><i class="icon-alert"></i> <b>Failed!</b> Tidak Data yang dikirim.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    ';
        }
        ?>
    </div>
    <div class="row pt-2">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="needs-validation form-prevent" action="../controllers/add-data.php" enctype="multipart/form-data" novalidate="">
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <label class="form-label" for="validationCustom01">Nama</label>
                                <input class="form-control" id="validationCustom01" name="name" placeholder="Nama Akun" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Nama.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control" id="validationCustom02" name="email" placeholder="Email" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Email.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Password</label>
                                <input class="form-control" id="validationCustom02" name="password" placeholder="Password" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Password.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Nomor HP</label>
                                <input class="form-control" id="validationCustom02" name="nope" type="text" placeholder="Nomor HP" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Nomor HP.</div>
                            </div>

                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom04">Domain</label>
                                <select class="form-select" id="validationCustom04" name="domain" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="ada">Ada</option>
                                    <option value="kosong">Kosong</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="validationCustom04">Status</label>
                                <select class="form-select" name="status" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="mati">Mati</option>
                                    <option value="verify">Verifikasi</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom02">Note </label>
                                <textarea class="form-control" name="note" id="validationCustom02" type="text"></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="validationCustom02">Upload SS Browser </label>
                                <input class="form-control" name="file" type="file" id="validationCustom02" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <input type="hidden" id="custId" name="add" value="send">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary  button-prevent" type="submit">
                                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Process </div>
                                <div class="hide-text">Tambah</div>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="table table-striped table-bordered" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Nomor HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                use GuzzleHttp\Client;
                                use GuzzleHttp\Psr7\Request;

                                $client = new Client();
                                $request = new Request('GET', 'http://api.2urf.dev/email');
                                $res = $client->sendAsync($request)->wait();
                                $body = $res->getBody();
                                $data = json_decode($body, true);

                                foreach ($data as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['status']; ?></td>
                                        <td><?php echo $value['nohp']; ?></td>
                                        <td>
                                            <form action="../components/EmaiView.php" method="POST">
                                                <input type="hidden" name="key" value="<?php echo $value['_id']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">View</button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<?php include('../views/down/Footer.php'); ?>
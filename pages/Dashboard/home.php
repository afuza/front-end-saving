<?php
$tittle = "Email Saving";
include('../views/page_layout.php'); ?>
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Saving Email</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <label class="form-label" for="validationCustom01">Nama</label>
                                <input class="form-control" id="validationCustom01" placeholder="Nama Akun" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Nama.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control" id="validationCustom02" placeholder="Email" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Email.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Password</label>
                                <input class="form-control" id="validationCustom02" placeholder="Password" type="text" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Password.</div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom02">Nomor HP</label>
                                <input class="form-control" id="validationCustom02" type="text" placeholder="Nomor HP" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Insert a Nomor HP.</div>
                            </div>

                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="validationCustom04">Domain</label>
                                <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Ada</option>
                                    <option>Kosong</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="validationCustom04">Status</label>
                                <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Aktif</option>
                                    <option>Mati</option>
                                    <option>Verifikasi</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                            <div class="col-md-12 mb-1">
                                <label class="form-label" for="validationCustom02">Note </label>
                                <textarea class="form-control" id="validationCustom02" type="text"></textarea>
                            </div>
                            <div class="col-md-12 mb-1">
                                <label class="form-label" for="validationCustom02">Note </label>
                                <input class="form-control" type="file" id="validationCustom02" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                        </div>
                        <div class="col-md-2 mt-4 mb-1">
                            <button class="btn btn-primary btn-lg" type="submit">simpan</button>
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
                                $nomor = 1;
                                for ($i = 0; $i < 20; $i++) {
                                ?>

                                    <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td><?php echo $faker->firstNameMale; ?></td>
                                        <td><?php echo $faker->freeEmail ?></td>
                                        <td><?php echo $faker->password; ?></td>
                                        <td><?php echo $faker->e164PhoneNumber; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
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
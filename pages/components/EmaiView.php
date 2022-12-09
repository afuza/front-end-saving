<?php
$tittle = "View Data Email";
include('../views/page_layout.php');

@$key = $_POST['key'];

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$request = new Request('GET', 'http://api.2urf.dev/email/' . $key . '');
$res = $client->sendAsync($request)->wait();
$body = $res->getBody();
$data = json_decode($body, true);

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];
$status = $data['status'];
$nohp = $data['nohp'];
$urlimg = $data['upload'];
?>
<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-lg-7 mx-auto  mb-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h4>Data Email Lengakap</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?php echo $urlimg; ?>""><img src=" <?php echo $urlimg; ?>" alt="" class="img-fluid"></a>
                        </div>
                        <div class="col-lg-8 pt-4">
                            <table class="h4 w-100" cellpadding="6">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td><?php echo $password; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?php echo $status; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td>:</td>
                                    <td><?php echo $nohp; ?></td>
                                </tr>
                            </table>
                            <hr>
                            <div class="pt-2 text-center">
                                <a href="../Dashboard/home.php" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('../views/down/Footer.php'); ?>
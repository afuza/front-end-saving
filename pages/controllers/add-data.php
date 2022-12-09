<?php
require '../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Ramsey\Uuid\Uuid;
use GuzzleHttp\Client;

$profile_credentials = [
    'endpoint' => 'https://s3.nl-ams.scw.cloud',
    'region' => 'nl-ams',
    'version' => 'latest',
    'use_path_style_endpoint' => true,
    'credentials' => array(
        'key'    => 'SCWBVSN5Q9EZAWD4GVMA',
        'secret' => 'a7bde027-9813-4b9d-832b-d382976f065e',
    ),
];

if($_POST['add'] == 'send'){

    $nama = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nope = $_POST['nope'];
    $domain = $_POST['domain'];
    $status = $_POST['status'];
    $note = $_POST['note'];

    $s3client = new S3Client($profile_credentials);

    $myuuid = Uuid::uuid4();
    $key = 'brw-'.$myuuid;
    $bucket = "email-save";
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg', 'gif');
    $namafile = $_FILES['file']['name'];
    $x = explode('.', $namafile);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 2097152) {
            move_uploaded_file($file_tmp, 'tmp/' . $namafile);
            try {
                $result = $s3client->putObject([
                    "Bucket" => $bucket,
                    "Key" => $key,
                    "SourceFile" => 'tmp/' . $namafile,
                    "ACL" => "public-read",
                ]);
                $en_json = json_encode($result["@metadata"]);
                $de_json = json_decode($en_json, true);
                $code = $de_json["statusCode"];
                $url = $result["ObjectURL"];
                if ($code == 200) {
                    $delpath = 'tmp/' . $namafile;
                    $hapus = unlink($delpath);
                    if ($hapus) {
                        $client = new Client();
                        $headers = [
                            'Content-Type' => 'application/json'
                          ];
                          $data = [
                            'name' => $nama,
                            'email' => $email,
                            'password' => $password,
                            'nohp' => $nope,
                            'status' => $status,
                            'domain' => $domain,
                            'note' => $note,
                            'upload' => $url
                          ];
                        $body = json_encode($data);
                        $response = $client->request('POST', 'http://api.2urf.dev/email', [
                            'headers' => $headers,
                            'body' => $body
                        ]);
                        $status = $response->getStatusCode();
                        if ($status == 201) {
                            header('location: ../Dashboard/home.php?status=success');
                        } else {
                            header('location: ../Dashboard/home.php?status=failed');
                        }
                    } else {
                        header('location: ../Dashboard/home.php?status=failed');
                    }
                } else {
                    echo "Error";
                }
            } catch (AwsException $e) {
                echo "Error: {$e->getMessage()}" . PHP_EOL;
            }
        } else {
            header('location: ../Dashboard/home.php?status=file');
        }
    }
}else{
    header('location: ../Dashboard/home.php?status=none');
}


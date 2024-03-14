<?php
$nilai = 0;

if (isset($_POST['submit'])) {
    if ($_POST['nama'] == '' || $_POST['nilai'] == '') {
        echo '<div class="alert alert-danger m-0" role="alert">
        <h4 class="alert-heading">PEHATIAN!</h4>
        <p>Sepertinya kamu belum mengisi form dengan lengkap!</p>
        <hr>
        <p class="mb-0">Tolong Isi Semua Form Terlebih Dahulu!</p>
        </div>';
    } else {
        $nama = trim(ucwords(strtolower($_POST['nama'])));
        $nilai = $_POST['nilai'];
        if ($nilai <= 70 && $nilai >= 0) {
            $output =  "<span class='text-danger poppins-bold'>BELUM</span> KOMPETEN";
        } else if ($nilai > 70 && $nilai <= 100) {
            $output = "<span class='poppins-bold'>SUDAH</span> KOMPETEN!";
        } else if ($nilai == null) {
            $output = "Sedang Menunggu Inputan . . .";
        } else {
            $nilai = 0;
            $nama = null;
            echo '
            <div class="alert alert-danger m-0" role="alert">
                <h4 class="alert-heading">PEHATIAN!</h4>
                <p>Tolong masukin nilai yang valid yaaa . . .</p>
                <hr>
                <p class="mb-0">Silahkan Masukkan Nilai di Range 0 - 100!</p>
            </div>
            ';
        };
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <!-- link buat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/font.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Banyu BN | PPLG X-1</title>
</head>

<body>
    <main>
        <div class="background">
            <div class="object-wrapper">
                <div class="w-75 shadow-lg">
                    <div class="row">
                        <div class="col-lg-4 topper-radius" style="background-color: white;">
                            <div class="part-form">
                                <h3 class="poppins-bold mb-4 text-orange">CEK KOMPETENSI!</h3>
                                <form action="" method="POST">
                                    <label for="nama" class="poppins-semibold text-muted">Nama</label>
                                    <br>
                                    <input type="text" name="nama" id="nama" class="mb-2 inp-txt shadow-sm" pattern="[a-zA-Z ]+">
                                    <br>
                                    <label for="nilai" class="poppins-semibold text-muted">Nilai</label>
                                    <br>
                                    <input 
                                    oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                                    type="number" name="nilai" id="nilai" class="mb-2 inp-txt shadow-sm" maxlength="3" pattern="[a-zA-Z ]+">
                                    <br>
                                    <input type="submit" name="submit" value="SUBMIT" class="button poppins-bold">
                                    <br>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8 topper-radius1" style="background-color: white; border: solid 13px white;">
                            <div class="row output-display topper-radius2" style="background-color: rgb(255, 187, 60); height: 65%;">
                                <div class="col-lg-12 d-flex output-display justify-content-center text-center align-items-center" style="border-radius: 0 30px 30px 0;">
                                    <div>
                                        <img src="assets/<?php
                                                            if (@$output == null) {
                                                                echo 'sleepy-vector.png';
                                                            } else {
                                                                echo @$nilai > 70 ? 'smile-vector.png' : 'sad-vector.png';
                                                            }
                                                            ?>" alt="expression" class="img-expression mb-2">
                                        <h2 class="text-white mt-2">
                                            <?= @$output != null ? $output : 'Sedang Menunggu Inputan . . .'; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center large-responsive" style="height: 35%; background-color: white;">
                                <div class="col-sm-3 statistic-display">
                                    <div class="d-flex justify-content-center">
                                        <div class="progress-bar" style="
                                                    background:
                                                        radial-gradient(closest-side, white 79%, transparent 50% 100%),
                                                        conic-gradient(rgb(255, 208, 0) <?= @$nilai; ?>%, rgb(255, 240, 195) 0);">
                                            <h2 style="position: relative; top: 5px;" class="text-orange m-0 p-0"><?= @$nilai; ?></h2>
                                            <p class="m-0 p-0 text-orange" style="font-size: 13px;">score</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 nama-display d-flex justify-content-center flex-column" style="height: 100%;">
                                    <p class="m-0 p-0"><?= @$nama == null ? '' : 'atas nama :' ?></p>
                                    <h3 class="text-orange poppins-semibold">
                                        <?= @$nama; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
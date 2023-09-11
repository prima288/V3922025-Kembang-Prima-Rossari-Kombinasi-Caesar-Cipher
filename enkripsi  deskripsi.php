<?php
// Deskripsi fungsi enkripsi dengan Caesar Cipher
function enkripsi($input){
    $enkripsi = "";
    $shift = 23; // Jumlah pergeseran

    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];

        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $char = strtolower($char);
            $char = chr(((ord($char) - ord('a') + $shift) % 26) + ord('a'));
            if ($isUpperCase) {
                $char = strtoupper($char);
            }
        }

        $enkripsi .= $char;
    }

    return $enkripsi;
}

// Deskripsi fungsi deskripsi dengan Caesar Cipher
function deskripsi($input){
    $deskripsi = "";
    $shift = 23; // Jumlah pergeseran

    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];

        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $char = strtolower($char);
            $char = chr(((ord($char) - ord('a') - $shift + 26) % 26) + ord('a'));
            if ($isUpperCase) {
                $char = strtoupper($char);
            }
        }

        $deskripsi .= $char;
    }

    return $deskripsi;
}

// Pengecekan apakah halaman diakses menggunakan metode POST atau tidak
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai input dari user
    $input = $_POST["input"];

    if (isset($_POST["enkripsi"])) {
        // Memanggil fungsi enkripsi untuk melakukan enkripsi teks dari inputan
        $hasil = enkripsi($input);
    } elseif (isset($_POST["deskripsi"])) {
        // Memanggil fungsi deskripsi untuk melakukan deskripsi teks dari inputan
        $hasil = deskripsi($input);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi dan Deskripsi Teks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .result-border {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .btn-blue {
            background-color: #0074cc; /* Warna biru */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px; /* Efek cembung */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Animasi perubahan warna latar belakang */
        }

        .btn-blue:hover {
            background-color: #005aa6; /* Warna biru lebih gelap saat hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Enkripsi dan Deskripsi Teks</h2>
        <form action="" method="post">
            <label for="input">Masukkan Teks :</label>
            <input type="text" name="input" id="input" value="<?php echo isset($input) ? $input : ''; ?>">
            
            <br>
            <button class="btn-blue" type="submit" name="enkripsi">Enkripsi</button>
            <button class="btn-blue" type="submit" name="deskripsi">Deskripsi</button>
            
            <?php if (isset($hasil)): ?>
                <div class="result-border">
                    <label><p>Hasil: <?php echo $hasil; ?></p></label>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

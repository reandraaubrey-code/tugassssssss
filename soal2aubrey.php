<?php
header('Content-Type: text/plain; charset=utf-8');

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi gaji pokok harian berdasarkan golongan
function gajiHarian($golongan) {
    if ($golongan == 1) {
        return 150000;
    } elseif ($golongan == 2) {
        return 200000;
    } else {
        return 250000;
    }
}

// Fungsi uang lembur harian berdasarkan golongan
function uangLembur($golongan) {
    if ($golongan == 1) {
        return 50000;
    } elseif ($golongan == 2) {
        return 75000;
    } else {
        return 100000;
    }
}

// ===== Data input (bisa lewat URL: ?nama=Budi&golongan=2&hari=10) =====
$nama     = $_GET['nama'] ?? "Budi";
$golongan = (int)($_GET['golongan'] ?? 2);
$hariKerja = (int)($_GET['hari'] ?? 7);

$gaji   = gajiHarian($golongan);
$lembur = uangLembur($golongan);

echo "=== PERHITUNGAN GAJI & LEMBUR ===\n";
echo "Nama      : $nama\n";
echo "Golongan  : $golongan\n";
echo "Hari kerja: $hariKerja\n\n";

$totalGaji = 0;
$totalLembur = 0;

for ($hari = 1; $hari <= $hariKerja; $hari++) {
    $totalGaji += $gaji;

    // Lembur hanya pada hari genap (contoh simulasi)
    if ($hari % 2 == 0) {
        $totalLembur += $lembur;
        $ket = "lembur " . rupiah($lembur);
    } else {
        $ket = "tanpa lembur";
    }
    echo "Hari ke-$hari : gaji " . rupiah($gaji) . " + $ket\n";
}

echo "\nTotal gaji pokok : " . rupiah($totalGaji) . "\n";
echo "Total bonus lembur: " . rupiah($totalLembur) . "\n";
echo "TOTAL DITERIMA   : " . rupiah($totalGaji + $totalLembur) . "\n";

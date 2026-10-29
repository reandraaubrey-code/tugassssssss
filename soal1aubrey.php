<?php
header('Content-Type: text/plain; charset=utf-8');

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi menentukan tarif harian berdasarkan jenis mobil
function tarifHarian($jenis) {
    if ($jenis == "Sedan") {
        return 300000;
    } elseif ($jenis == "SUV") {
        return 500000;
    } elseif ($jenis == "MPV") {
        return 400000;
    } else {
        return 0; // jenis tidak dikenal
    }
}

// Fungsi menghitung diskon 10% jika sewa lebih dari 3 hari
function hitungDiskon($total, $lamaHari) {
    if ($lamaHari > 3) {
        return $total * 0.10;
    }
    return 0;
}

// ===== Data input =====
$jenisMobil = "SUV";
$lamaSewa   = 5;

$tarif = tarifHarian($jenisMobil);
if ($tarif == 0) {
    die("Jenis mobil tidak tersedia.\n");
}

echo "=== RINCIAN SEWA MOBIL ===\n";
echo "Jenis mobil : $jenisMobil\n";
echo "Tarif/hari  : " . rupiah($tarif) . "\n";
echo "Lama sewa   : $lamaSewa hari\n\n";

$total = 0;
for ($hari = 1; $hari <= $lamaSewa; $hari++) {
    $total += $tarif;
    echo "Hari ke-$hari : " . rupiah($tarif) . " | Akumulasi: " . rupiah($total) . "\n";
}

$diskon = hitungDiskon($total, $lamaSewa);
$totalBayar = $total - $diskon;

echo "\nSubtotal       : " . rupiah($total) . "\n";
echo "Diskon         : " . rupiah($diskon) . ($diskon > 0 ? " (10%)" : "") . "\n";
echo "TOTAL PEMBAYARAN: " . rupiah($totalBayar) . "\n";

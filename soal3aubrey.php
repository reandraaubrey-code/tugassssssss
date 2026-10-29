<?php
header('Content-Type: text/plain; charset=utf-8');

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi bonus saldo jika setoran bulanan mencapai batas tertentu
function hitungBonus($setoran) {
    if ($setoran >= 200000) {
        return 20000;
    } elseif ($setoran >= 100000) {
        return 10000;
    } else {
        return 0;
    }
}

// ===== Data input =====
$saldo         = 50000;   // saldo awal
$setoranBulanan = 120000;
$jumlahBulan   = 6;

echo "=== SIMULASI TABUNGAN ANAK ===\n";
echo "Saldo awal      : " . rupiah($saldo) . "\n";
echo "Setoran/bulan   : " . rupiah($setoranBulanan) . "\n";
echo "Lama simulasi   : $jumlahBulan bulan\n\n";

for ($bulan = 1; $bulan <= $jumlahBulan; $bulan++) {
    $bonus = hitungBonus($setoranBulanan);
    $saldo += $setoranBulanan + $bonus;

    echo "Bulan ke-$bulan : setoran " . rupiah($setoranBulanan)
       . " + bonus " . rupiah($bonus)
       . " => saldo " . rupiah($saldo) . "\n";
}

echo "\nSALDO AKHIR: " . rupiah($saldo) . "\n";

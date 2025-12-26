<?php
function predikat_kinerja($hasil_kerja, $perilaku) {
    $h = strtolower($hasil_kerja);
    $p = strtolower($perilaku);

    // BARIS: DIATAS EKSPEKTASI
    if ($h == 'diatas ekspektasi') {
        if ($p == 'diatas ekspektasi') return "Sangat Baik";
        if ($p == 'sesuai ekspektasi') return "Baik";
        if ($p == 'dibawah ekspektasi') return "Kurang/misconduct";
    } 
    // BARIS: SESUAI EKSPEKTASI
    elseif ($h == 'sesuai ekspektasi') {
        if ($p == 'diatas ekspektasi') return "Baik";
        if ($p == 'sesuai ekspektasi') return "Baik";
        if ($p == 'dibawah ekspektasi') return "Kurang/misconduct";
    } 
    // BARIS: DI BAWAH EKSPEKTASI
    elseif ($h == 'di bawah ekspektasi') {
        if ($p == 'diatas ekspektasi') return "Butuh perbaikan";
        if ($p == 'sesuai ekspektasi') return "Butuh perbaikan";
        if ($p == 'dibawah ekspektasi') return "Sangat Kurang";
    }
    
    return "Input tidak valid";
}

// UJI COBA SEMUA KOTAK MATRIKS
echo "<h2>Hasil Pengujian Matriks Kinerja</h2>";

$test_cases = [
    ['diatas ekspektasi', 'diatas ekspektasi'],     // Sangat Baik
    ['sesuai ekspektasi', 'sesuai ekspektasi'],     // Baik
    ['di bawah ekspektasi', 'sesuai ekspektasi'],  // Butuh Perbaikan
    ['di bawah ekspektasi', 'dibawah ekspektasi']   // Sangat Kurang
];

foreach ($test_cases as $case) {
    echo "Kerja: $case[0] | Perilaku: $case[1] <br>";
    echo "Predikat: <b>" . predikat_kinerja($case[0], $case[1]) . "</b><hr>";
}
?>
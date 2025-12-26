<?php
/**
 * Fungsi helloworld($n)
 * Aturan:
 * - Kelipatan 4 & 5 => helloworld
 * - Kelipatan 4 => hello
 * - Kelipatan 5 => world
 */
function helloworld($n) {
    for ($i = 1; $i <= $n; $i++) {
        // Cek kelipatan 4 DAN 5 sekaligus
        if ($i % 4 == 0 && $i % 5 == 0) {
            echo "helloworld ";
        } 
        // Cek kelipatan 4 saja
        elseif ($i % 4 == 0) {
            echo "hello ";
        } 
        // Cek kelipatan 5 saja
        elseif ($i % 5 == 0) {
            echo "world ";
        } 
        // Bukan kelipatan 4 atau 5
        else {
            echo $i . " ";
        }
    }
}

// --- MENAMPILKAN HASIL ---
echo "<h2>Hasil Output Soal 4 (Helloworld)</h2>";

echo "<strong>Contoh helloworld(6):</strong><br>";
helloworld(6);

echo "<br><br><strong>Contoh helloworld(20):</strong><br>";
helloworld(20);
?>
<?php

if (!function_exists('predikat_kinerja')) {
    function predikat_kinerja(string $hasil_kerja, string $perilaku): string
    {
        $hasil_kerja = strtolower(trim($hasil_kerja));
        $perilaku = strtolower(trim($perilaku));

        switch (true) {
            case $hasil_kerja === 'di bawah ekspektasi' && $perilaku === 'di bawah ekspektasi':
                return 'Sangat Kurang';
            case $hasil_kerja === 'di bawah ekspektasi' && in_array($perilaku, ['sesuai ekspektasi', 'di atas ekspektasi']):
                return 'Butuh Perbaikan';

            case $hasil_kerja === 'sesuai ekspektasi' && $perilaku === 'di bawah ekspektasi':
                return 'Kurang / Misconduct';
            case $hasil_kerja === 'sesuai ekspektasi' && in_array($perilaku, ['sesuai ekspektasi', 'di atas ekspektasi']):
                return 'Baik';

            case $hasil_kerja === 'di atas ekspektasi' && $perilaku === 'di bawah ekspektasi':
                return 'Kurang / Misconduct';
            case $hasil_kerja === 'di atas ekspektasi' && $perilaku === 'sesuai ekspektasi':
                return 'Baik';
            case $hasil_kerja === 'di atas ekspektasi' && $perilaku === 'di atas ekspektasi':
                return 'Sangat Baik';

            default:
                return 'Tidak Diketahui';
        }
    }
}

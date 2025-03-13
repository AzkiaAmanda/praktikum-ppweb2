<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $proses = isset($_POST['proses']) ? $_POST['proses'] : '';
    $nama_siswa = isset($_POST['nama']) ? $_POST['nama'] : '';
    $mata_kuliah = isset($_POST['matkul']) ? $_POST['matkul'] : '';
    $nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts'] : '';
    $nilai_uas = isset($_POST['nilai_uas']) ? $_POST['nilai_uas'] : '';
    $nilai_tugas = isset($_POST['nilai_tugas']) ? $_POST['nilai_tugas'] : '';

    // MENGHITUNG NILAI PRESENTASE NILAI SISWA UNTUK LULUS  
    $nilai_akhir = (0.3 * $nilai_uts + 0.35 * $nilai_uas + 0.35 * $nilai_tugas);

    if ($nilai_akhir > 55) { 
        $status = "Lulus";
    } else { 
        $status = "Tidak lulus";
    } 

    // MENGHITUNG GRADE SISWA
    if ($nilai_akhir >= 0 && $nilai_akhir <= 35) { 
        $grade = 'E';
    } elseif ($nilai_akhir >= 36 && $nilai_akhir <= 55) {
        $grade = 'D';
    } elseif ($nilai_akhir >= 56 && $nilai_akhir <= 69) {
        $grade = 'C';
    } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 84) {
        $grade = 'B';
    } elseif ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
        $grade = 'A';
    } else {
        $grade = 'I';
    }

    // MENGHITUNG PREDIKAT SISWA BERDASARKAN GRADE DENGAN SWITCH CASE
    switch ($grade) {
        case 'E':
            $predikat = 'Sangat Kurang';
            break;
        case 'D':
            $predikat = 'Kurang';
            break;
        case 'C':
            $predikat = 'Cukup';
            break;
        case 'B':
            $predikat = 'Memuaskan';
            break;
        case 'A':
            $predikat = 'Sangat Memuaskan';
            break;
        case 'I':
            $predikat = 'Tidak ada';
            break;
    }
    // MENCETAK NILAI SISWA
    echo '<strong>Proses                     : </strong>' . htmlspecialchars($proses);
    echo '<strong><br/>Nama                  : </strong>' . htmlspecialchars($nama_siswa);
    echo '<strong><br/>Mata Kuliah           : </strong>' . htmlspecialchars($mata_kuliah);
    echo '<strong><br/>Nilai UTS             : </strong>' . htmlspecialchars($nilai_uts);
    echo '<strong><br/>Nilai UAS             : </strong>' . htmlspecialchars($nilai_uas);
    echo '<strong><br/>Nilai Tugas/Praktikum : </strong>' . htmlspecialchars($nilai_tugas);
    echo '<strong><br/>Nilai Akhir           : </strong>' . htmlspecialchars($nilai_akhir);
    echo '<strong><br/>Status                : </strong>' . htmlspecialchars($status);
    echo '<strong><br/>Grade                 : </strong>' . htmlspecialchars($grade);
    echo '<strong><br/>Predikat              : </strong>' . htmlspecialchars($predikat);
}
?>
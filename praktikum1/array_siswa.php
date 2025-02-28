<?php
    $ns1 = ['id' => 1, 'nim' => '011010', 'uts' => 80, 'uas' => 84, 'tugas' => 78];
    $ns2 = ['id' => 2, 'nim' => '011011', 'uts' => 60, 'uas' => 85, 'tugas' => 80];
    $ns3 = ['id' => 3, 'nim' => '011012', 'uts' => 70, 'uas' => 88, 'tugas' => 60];
    $ns4 = ['id' => 4, 'nim' => '011013', 'uts' => 90, 'uas' => 92, 'tugas' => 82];
    $ar_nilai = [$ns1, $ns2, $ns3, $ns4];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 1</title>
</head>
<body>
    <h3>Daftar Nilai Siswa</h3>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Tugas</th>
                <th>Nilai akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach($ar_nilai as $ns) {
                echo '<tr><td>'.$nomor.'</td>';
                echo '<td>'.$ns['nim'].'</td>';
                echo '<td>'.$ns['uts'].'</td>';
                echo '<td>'.$ns['uas'].'</td>';
                echo '<td>'.$ns['tugas'].'</td>';
                $nilai_akhir = ($ns['uts'] + $ns['uas'] + $ns['tugas'])/3;
                echo '<td>'.number_format($nilai_akhir,2,',' , '.').'</td>';
                echo '</tr>';
                $nomor++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
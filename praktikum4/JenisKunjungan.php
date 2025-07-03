<?php
class JenisKunjungan{
    public $id;
    public $name;
    public $display_name;

    private static function connect() {
        $conn = mysqli_connect("localhost", "root", "", "bukutamu");
        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public static function getAll() {
        $conn = self::connect();
        $query = "SELECT * FROM jenis_kunjungan";
        $result = mysqli_query($conn, $query); //Execute query
        mysqli_close($conn); //Close connection

        $entries = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $entry = new JenisKunjungan();
            $entry->id = $row['id'];
            $entry->name = $row['name'];
            $entry->display_name = $row['display_name'];
            array_push($entries, $entry);
        }

        return $entries;
    }
}


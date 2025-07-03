<?php

class Kunjungan {
    public $id;
    public $timestamp;
    public $fullname;
    public $email;
    public $jenis_kunjungan_id;

    private static function connect() {
        $conn = mysqli_connect("localhost", "root", "", "bukutamu");
        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function save() {
        $conn = self::connect();
        $query = "INSERT INTO kunjungan (fullname, email, jenis_kunjungan_id)
            VALUES ('" . $this->fullname . "', '" . $this->email ."',"
            . $this->jenis_kunjungan_id . ")";

        mysqli_query($conn, $query);
        $insert_id = mysqli_insert_id($conn); //return the id of the inserted record
        mysqli_close($conn); //close connection

        return $insert_id;
    }

    public static function getAll() {
        $conn = self::connect();
        $query = "SELECT * FROM kunjungan";
        $result = mysqli_query($conn, $query); //Execute query
        mysqli_close($conn); //Close connection

        $entries = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $entry = new Kunjungan();
            $entry->id = $row['id'];
            $entry->timestamp = $row['timestamp'];
            $entry->fullname = $row['fullname'];
            $entry->email = $row['email'];
            $entry->jenis_kunjungan_id = $row['jenis_kunjungan_id'];
            array_push($entries, $entry);
        }

        return $entries;
    }
}
<?php
// app/models/plants.php
require_once '../config/database.php';

class plants {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllPlants() {
        $query = $this->db->query("SELECT * FROM plants INNER JOIN categories ON plants.id_kategori = categories.id_kategori");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllcategories() {
        $query = $this->db->query("SELECT * FROM categories");
        return $query->fetchall(pdo::FETCH_ASSOC);
    }

    public function find($id_tanaman) {
        $query = $this->db->prepare("SELECT * FROM plants WHERE id_tanaman = :id_tanaman");
        $query->bindParam(':id_tanaman', $id_tanaman, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_tanaman, $id_kategori, $deskripsi, $harga, $penjual) {
        $query = $this->db->prepare("INSERT INTO plants (nama_tanaman, id_kategori, deskripsi, harga, penjual) VALUES (:nama_tanaman, :id_kategori, :deskripsi, :harga, :penjual)");
        $query->bindParam(':nama_tanaman', $nama_tanaman);
        $query->bindParam(':id_kategori', $id_kategori, PDO::PARAM_INT);
        $query->bindParam(':deskripsi', $deskripsi);
        $query->bindParam(':harga', $harga, PDO::PARAM_INT);
        $query->bindParam(':penjual', $penjual);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id_tanaman, $data) {
        $query = "UPDATE plants SET nama_tanaman = :nama_tanaman, id_kategori = :id_kategori, deskripsi = :deskripsi, harga = :harga, penjual = :penjual WHERE id_tanaman = :id_tanaman";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_tanaman', $data['nama_tanaman']);
        $stmt->bindParam(':id_kategori', $data['id_kategori']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':penjual', $data['penjual']);
        $stmt->bindParam(':id_tanaman', $id_tanaman);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id_tanaman) {
        $query = "DELETE FROM plants WHERE id_tanaman = :id_tanaman";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_tanaman', $id_tanaman);
        return $stmt->execute();
    }
}

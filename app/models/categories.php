<?php
// app/models/categories.php
require_once '../config/database.php';

class Categories {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllCategories() {
        $query = $this->db->query("SELECT * FROM categories");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_kategori) {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id_kategori = :id_kategori");
        $query->bindParam(':id_kategori', $id_kategori, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_kategori, $deskripsi) {
        $query = $this->db->prepare("INSERT INTO categories (nama_kategori, deskripsi) VALUES (:nama_kategori, :deskripsi)");
        $query->bindParam(':nama_kategori', $nama_kategori);
        $query->bindParam(':deskripsi', $deskripsi);
        return $query->execute();
    }

    // Update categories data by ID
    public function update($id_kategori, $data) {
        $query = "UPDATE categories SET nama_kategori = :nama_kategori, deskripsi = :deskripsi WHERE id_kategori = :id_kategori";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_kategori', $data['nama_kategori']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':id_kategori', $id_kategori);
        return $stmt->execute();
    }

    // Delete categories by ID
    public function delete($id_kategori) {
        $query = "DELETE FROM categories WHERE id_kategori = :id_kategori";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_kategori', $id_kategori);
        return $stmt->execute();
    }
}

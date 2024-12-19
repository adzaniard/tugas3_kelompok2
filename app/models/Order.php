<?php
// app/models/Order.php
require_once '../config/database.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllOrders() {
        $query = $this->db->query("SELECT *
        FROM orders 
        INNER JOIN plants ON orders.id_tanaman = plants.id_tanaman 
        INNER JOIN users ON orders.id_user = users.id_user");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllplants() {
        $query = $this->db->query("SELECT * FROM plants");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_order) {
        $query = $this->db->prepare("SELECT * FROM orders WHERE id_order = :id_order");
        $query->bindParam(':id_order', $id_order, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($id_tanaman, $id_user, $status_pesanan) {
        $query = $this->db->prepare("INSERT INTO orders (id_tanaman, id_user, status_pesanan) VALUES (:id_tanaman, :id_user, :status_pesanan)");
        $query->bindParam(':id_tanaman', $id_tanaman);
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':status_pesanan', $status_pesanan);
        return $query->execute();
    }

    // Update order data by ID
    public function update($id_order, $data) {
        $query = "UPDATE orders SET id_tanaman = :id_tanaman, id_user = :id_user, status_pesanan = :status_pesanan WHERE id_order = :id_order";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_tanaman', $data['id_tanaman']);
        $stmt->bindParam(':id_user', $data['id_user']);
        $stmt->bindParam(':status_pesanan', $data['status_pesanan']);
        $stmt->bindParam(':id_order', $id_order);
        return $stmt->execute();
    }

    // Delete order by ID
    public function delete($id_order) {
        $query = "DELETE FROM orders WHERE id_order = :id_order";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_order', $id_order);
        return $stmt->execute();
    }
}
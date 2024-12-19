<?php
// app/controllers/OrderController.php
require_once '../app/models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    public function index() {
        $orders = $this->orderModel->getAllOrders();
        require_once '../app/views/order/index.php';
    }

    public function dashboard() {
        require_once '../app/views/halamanUtama.php';
    }

    public function create() {
        $users = $this->orderModel->getAllUsers();
        $plants = $this->orderModel->getAllplants();
        require_once '../app/views/order/create.php';
    }

    public function store() {
        $id_tanaman = $_POST['id_tanaman'];
        $id_user = $_POST['id_user'];
        $status_pesanan = $_POST['status_pesanan'];
        $this->orderModel->add($id_tanaman, $id_user, $status_pesanan);
        header('Location: /order/index');
    }
    // Show the edit form with the order data
    public function edit($id_order) {
        $order = $this->orderModel->find($id_order); // Assume find() gets order by ID
        $users = $this->orderModel->getAllUsers();
        $plants = $this->orderModel->getAllplants();
        require_once __DIR__ . '/../views/order/edit.php';

    }

    // Process the update request
    public function update($id_order, $data) {
        $updated = $this->orderModel->update($id_order, $data);
        if ($updated) {
            header("Location: /order/index"); // Redirect to order list
        } else {
            echo "Failed to update order.";
        }
    }

    // Process delete request
    public function delete($id_order) {
        $deleted = $this->orderModel->delete($id_order);
        if ($deleted) {
            header("Location: /order/index"); // Redirect to order list
        } else {
            echo "Failed to delete order.";
        }
    }
}

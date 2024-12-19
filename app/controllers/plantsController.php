<?php
// app/controllers/plantsController.php
require_once '../app/models/plants.php';

class plantsController {
    private $plantsModel;

    public function __construct() {
        $this->plantsModel = new plants();
    }

    public function index() {
        $plants = $this->plantsModel->getAllplants();
        require_once '../app/views/plants/index.php';

    }

    public function dashboard() {
        require_once '../app/views/halamanUtama.php';
    }


    public function create() {
        $categories = $this->plantsModel->getAllcategories();
        require_once '../app/views/plants/create.php';
    }

    public function store() {
        $nama_tanaman = $_POST['nama_tanaman'];
        $id_kategori = $_POST['id_kategori'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $penjual = $_POST['penjual'];
        $this->plantsModel->add($nama_tanaman, $id_kategori, $deskripsi, $harga, $penjual);
        header('Location: /plants/index');
    }
    // Show the edit form with the plants data
    public function edit($id_tanaman) {
        $plants = $this->plantsModel->find($id_tanaman); // Assume find() gets plants by ID
        $categories = $this->plantsModel->getallcategories();
        require_once __DIR__ . '/../views/plants/edit.php';
    }

    // Process the update request
    public function update($id_tanaman, $data) {
        $updated = $this->plantsModel->update($id_tanaman, $data);
        if ($updated) {
            header("Location: /plants/index"); // Redirect to plants list
        } else {
            echo "Failed to update plants.";
        }
    }

    // Process delete request
    public function delete($id_tanaman) {
        $deleted = $this->plantsModel->delete($id_tanaman);
        if ($deleted) {
            header("Location: /plants/index"); // Redirect to plants list
        } else {
            echo "Failed to delete plants.";
        }
    }
}

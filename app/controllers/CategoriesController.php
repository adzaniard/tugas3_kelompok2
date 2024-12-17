<?php
// app/controllers/CategoriesController.php
require_once '../app/models/categories.php';

class CategoriesController {
    private $CategoriesModel;

    public function __construct() {
        $this->CategoriesModel = new Categories();
    }

    public function index() {
        $categories = $this->CategoriesModel->getAllCategories();
        require_once '../app/views/categories/index.php';

    }

    public function create() {
        require_once '../app/views/categories/create.php';
    }

    public function store() {
        $nama_kategori = $_POST['nama_kategori'];
        $deskripsi = $_POST['deskripsi'];
        $this->CategoriesModel->add($nama_kategori, $deskripsi);
        header('Location: /categories/index');
    }
    // Show the edit form with the categories data
    public function edit($id_kategori) {
        $categories = $this->CategoriesModel->find(    $id_kategori); // Assume find() gets categories by ID
        require_once __DIR__ . '/../views/categories/edit.php';
    }

    // Process the update request
    public function update($id_kategori, $data) {
        $updated = $this->CategoriesModel->update(  $id_kategori, $data);
        if ($updated) {
            header("Location: /categories/index"); // Redirect to categories list
        } else {
            echo "Failed to update Categories.";
        }
    }

    // Process delete request
    public function delete($id_kategori) {
        $deleted = $this->CategoriesModel->delete($id_kategori);
        if ($deleted) {
            header("Location: /categories/index"); // Redirect to categories list
        } else {
            echo "Failed to delete kategori.";
        }
    }
}

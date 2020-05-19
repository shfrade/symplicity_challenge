<?php

require_once "model/CategoryDAO.php";
require_once "model/Category.php";
require_once "view/View.php";

use Valitron\Validator;

class CategoryController
{
    private $data;

    public function index()
    {
        $this->data = array();
        $catdao = new CategoryDAO();

        try {
            $categories = $catdao->selectAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/index.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function show($id)
    {
        $this->data = array();
        $catdao = new CategoryDAO();

        try {
            $categories = $catdao->select($id);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        // check if the category exists.
        if (count($categories) == 0) {
            header('location: index.php?category=index&error=NOT_FOUND');
        }
        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/show.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function create()
    {
        $newCategory = new Category();
        $this->data['category'] = $newCategory;
        View::load('view/template/header.html');
        View::load('view/category/create.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function store($data)
    {
        try {
            $catdao = new CategoryDAO();
            $v = new Validator($data);
            $v->rule('required', ['name', 'description']);
            if (!empty($data)) {
                $newCategory = new Category();
                $newCategory->setName($data['name']);
                $newCategory->setDescription($data['description']);
            }
            if ($v->validate()) {
                $catdao->insert($newCategory);
                header('location: index.php?category=index&message=CREATE_SUCCESS');
            } else {
                $this->data = [];
                $this->data['category'] = $newCategory;
                $this->data['errors'] = $this->handleValidationErrors($v->errors());
                View::load('view/template/header.html');
                View::load('view/category/create.php', $this->data);
                View::load('view/template/footer.html');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id)
    {
        $this->data = array();
        $catdao = new CategoryDAO();
        try {
            $categories = $catdao->select($id);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->data['categories'] = $categories;

        View::load('view/template/header.html');
        View::load('view/category/edit.php', $this->data);
        View::load('view/template/footer.html');
    }

    public function update($data)
    {
        try {
            $v = new Validator($data);
            $catdao = new CategoryDAO();
            $v->rule('required', ['name', 'description']);
            if ($v->validate()) {
                $categoryEdit = new Category();
                $categoryEdit->setId($data['id']);
                $categoryEdit->setName($data['name']);
                $categoryEdit->setDescription($data['description']);
                $catdao->update($categoryEdit);
                header('location: index.php?category=index&message=UPDATE_SUCCESS');
            } else {
                $this->data = [];
                $categories = $catdao->select($data['id']);
                $this->data['categories'] = $categories;
                $this->data['errors'] = $this->handleValidationErrors($v->errors());
                View::load('view/template/header.html');
                View::load('view/category/edit.php', $this->data);
                View::load('view/template/footer.html');
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $catdao = new CategoryDAO();
        try {
            $category = $catdao->select($id);
            // check if the category exists first.
            if (count($category) == 0) {
                header('location: index.php?category=index&error=NOT_FOUND');
                return false;
            }
            // if exists, this category cannot have any product attached.
            $category = $category[0];
            if ($category->getTotal() > 0) {
                header('location: index.php?category=index&error=PRODUCTS');
                return false;
            }
            // then safely removes the category
            $catdao->delete($id);
            header('location: index.php?category=index&message=DELETE_SUCCESS');
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function handleValidationErrors($errors)
    {
        $data = [];
        foreach ($errors as $errors) {
            foreach ($errors as $validation) {
                array_push($data, $validation);
            }
        }
        return $data;
    }
}

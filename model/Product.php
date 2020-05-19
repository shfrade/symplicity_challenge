<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $image;
    private $price;
    private $category_id;
    private $category_name;

    public function __construct($id = null, $name = null, $description = null, $image = null, $price = null, $category_id = null, $category_name = null)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setImage($image);
        $this->setPrice($price);
        $this->setCategoryId($category_id);
        // I used categoryName here are for two reasons:
        // 1-  stay with the 'style guide'
        // 2-  performance (so it does just one select with full data and not one for each row in the index).
        $this->setCategoryName($category_name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }
}

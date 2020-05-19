<?php

class Category
{
    private $id;
    private $name;
    private $description;
    private $total;

    public function __construct($id = null, $name = null, $description = null, $total = 0)
    {
        $this->setId($id);
        $this->setName($name) ;
        $this->setDescription($description);
        $this->setTotal($total);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($valor)
    {
        if (is_numeric($valor)) {
            $this->total = $valor;
        } else {
            $this->total = 0;
            return false;
        }
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
}
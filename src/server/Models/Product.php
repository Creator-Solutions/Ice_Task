<?php

class Product
{

    private string $admin_name;
    private string $isbn;
    private string $book_name;
    private string $description;
    private int $instock;
    private float $price;
    private string $image;

    public function __construct($arr)
    {
        $this->admin_name = $arr['Admin_Name'];
        $this->isbn = $arr['ISBN'];
        $this->book_name = $arr['Book_Name'];
        $this->description = $arr['Description'];
        $this->instock = intval($arr['InStock']);
        $this->price = floatval($arr['Price']);
        $this->image = $arr['Image'];
    }

    /**
     * @return mixed|string
     */
    public function getAdminName()
    {
        return $this->admin_name;
    }


    /**
     * @return mixed|string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return mixed|string
     */
    public function getBookName()
    {
        return $this->book_name;
    }

    /**
     * @return mixed|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getInstock(): int
    {
        return $this->instock;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return mixed|string
     */
    public function getImage()
    {
        return $this->image;
    }
}
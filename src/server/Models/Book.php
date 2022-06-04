<?php

class Book
{
    private string $admin_id;
    private string $isbn;

    private string $displayName;
    private string $bookName;
    private string $course;
    private int $instock;
    private string $price;
    private string $image;

    public function __construct($admin_id="", $isbn, $displayName, $bookName="", $course="", $instock="", $price, $image)
    {
        $this->admin_id = $admin_id;
        $this->isbn = $isbn;
        $this->displayName = $displayName;
        $this->bookName = $bookName;
        $this->course = $course;
        $this->instock = $instock;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * Return Admin ID
     * @return string
     */
    public function getAdminId(): string
    {
        return $this->admin_id;
    }

    /**
     * Return Book ISB
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * Return Book Display Name
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * Return Book Name if not empty
     * @return mixed|string
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * Returns the Book Course
     * @return string
     */
    public function getCourse(): string
    {
        return $this->course;
    }

    /**
     * Return if in stock (1/0)
     * @return int
     */
    public function getInstock(): int
    {
        return $this->instock;
    }

    /**
     * Return image URL
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }





}
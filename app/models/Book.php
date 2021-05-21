<?php

class Book
{
    private $db;

    public function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getBooks()
    {
        $sql = 'SELECT * FROM products WHERE deleted = 0 AND type = 2';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAdminByEmail($email)
    {
        $sql = 'SELECT * FROM admins WHERE email=:email';
        $query = $this->db->prepare($sql);
        $query->execute([':email' => $email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}

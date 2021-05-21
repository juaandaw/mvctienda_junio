<?php

class Course
{
    private $db;

    public function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getCourses()
    {
        $sql = 'SELECT * FROM products WHERE deleted = 0 AND type = 1';
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

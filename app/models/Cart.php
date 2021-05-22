<?php

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function verifyProduct($product_id, $user_id)
    {
        $sql = 'SELECT * FROM carts WHERE product_id = :product_id AND user_id = :user_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':product_id' => $product_id,
            ':user_id'    => $user_id,
        ];
        $query->execute($params);
        return $query->rowCount();
    }

    public function addProduct($product_id, $user_id)
    {
        $sql = 'SELECT * FROM products WHERE id=:id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $product_id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        $sql2 = 'INSERT INTO carts(state, user_id, product_id, quantity, discount, send, date, price)
            VALUES (:state, :user_id, :product_id, :quantity, :discount, :send, :date, :price)';
        $query2 = $this->db->prepare($sql2);
        $params2 = [
            ':state' => 0,
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => 1,
            ':discount' => $product->discount,
            ':send' => $product->send,
            ':date' => date('Y-m-d H:i:s'),
            ':price' => $product->price,
        ];
        $query2->execute($params2);
        return $query2->rowCount();
    }

    public function getCart($user_id)
    {
        $sql = 'SELECT c.user_id as user, c.product_id as product, c.quantity as quantity, c.send as send,
            c.discount as discount, p.price as price, p.image as image, p.description as description,
            p.name as name FROM carts as c, products as p WHERE c.user_id=:user_id AND state=0 AND 
            c.product_id=p.id';
        $query = $this->db->prepare($sql);
        $query->execute([':user_id' => $user_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($user, $product,$quantity)
    {
        $sql = 'UPDATE carts SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id'  => $user,
            ':product_id' => $product,
            ':quantity' => $quantity,
        ];
        return $query->execute($params);
    }

    public function delete($product, $user)
    {
        $sql = 'DELETE FROM carts WHERE user_id=:user_id AND product_id=:product_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id'  => $user,
            ':product_id' => $product
        ];
        return $query->execute($params);
    }

    public function addresses($dataForm,$user)
    {
        $sql = 'INSERT INTO addresses(first_name,last_name_1,last_name_2,
                      email,address,city,state,zipcode,country,user_id)
                      VALUES (:first_name,:last_name_1,:last_name_2,
                      :email,:address,:city,:state,:zipcode,:country,:user_id)';
        $query = $this->db->prepare($sql);
        $params = [
            ':first_name' => $dataForm['first_name'],
            ':last_name_1' => $dataForm['last_name1'],
            ':last_name_2' => $dataForm['last_name2'],
            ':email' => $dataForm['email'],
            ':address' => $dataForm['address'],
            ':city' => $dataForm['city'],
            ':state' => $dataForm['state'],
            ':zipcode' => $dataForm['zipcode'],
            ':country' => $dataForm['country'],
            ':user_id' => $user->id,
        ];
        $query->execute($params);
    }

    public function getAdresses($user_id)
    {
        $sql = 'SELECT * FROM addresses WHERE user_id=:user_id order by id desc limit 1';
        $query = $this->db->prepare($sql);
        $query->execute([':user_id' => $user_id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function closeCart($id, $state)
    {
        $sql = 'UPDATE carts SET state=:state, date=:date WHERE user_id=:user_id AND state=0';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $id,
            ':state'   => $state,
            ':date'    => date('Y-m-d H:i:s')
        ];
        return $query->execute($params);
    }

    public function sales()
    {
        $sql = 'SELECT sum(p.price * c.quantity) as cost, sum(c.discount) as discount, sum(c.send) as send,
                        c.date as date, c.user_id as user_id
                FROM carts as c, products as p
                WHERE c.product_id = p.id
                AND c.state = 1
                GROUP BY date(c.date), c.user_id';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function show($date, $id)
    {
        $sql = 'SELECT p.price as price, c.quantity as quantity, c.discount as discount, c.send as send,
                    p.name as name, c.date as date
                FROM carts as c, products as p 
                WHERE c.product_id = p.id
                AND c.user_id = :user_id
                AND c.state = 1
                AND date(date)=:date';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $id,
            ':date'    => $date,
        ];
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function dailySales()
    {
        $sql = 'SELECT sum(p.price * c.quantity) - sum(c.discount) + sum(c.send) as sale, 
                        date(c.date) as date
                FROM carts as c, products as p
                WHERE c.product_id = p.id
                AND c.state = 1
                GROUP BY date(c.date)';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

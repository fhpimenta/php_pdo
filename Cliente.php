<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 10:45
 */
class Cliente
{

    private $db;
    private $id;
    private $name;
    private $email;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function listar($ordem = null)
    {
        if($ordem) {
            $query = "select * from clientes order by {$ordem}";
        }
        else {
            $query = "select * from clientes";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "select * from clientes where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterar()
    {
        $query = "update clientes set name=:name, email=:email where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':email', $this->getEmail());

        if($stmt->execute()) {
            return true;
        }

    }

    public function inserir()
    {
        $query = "insert into clientes(name,email) values(:name,:email)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':email', $this->getEmail());

        if($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "delete from clientes where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        if($stmt->execute()) {
            return true;
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
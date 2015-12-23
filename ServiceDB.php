<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 14:53
 */
class ServiceDB
{
    private $db;
    private $entity;

    public function __construct(\PDO $db, EntidadeInterface $entity)
    {
        $this->db = $db;
        $this->entity = $entity;
    }

    public function listar($ordem = null)
    {
        if($ordem) {
            $query = "select * from {$this->entity->getTableName()} order by {$ordem}";
        }
        else {
            $query = "select * from {$this->entity->getTableName()}";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $query = "select * from {$this->entity->getTableName()} where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterar()
    {
        $query = "update {$this->entity->getTableName()} set name=:name, email=:email where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->entity->getId());
        $stmt->bindValue(':name', $this->entity->getName());
        $stmt->bindValue(':email', $this->entity->getEmail());

        if($stmt->execute()) {
            return true;
        }

    }

    public function inserir()
    {
        $query = "insert into {$this->entity->getTableName()}(name,email) values(:name,:email)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':name', $this->entity->getName());
        $stmt->bindValue(':email', $this->entity->getEmail());

        if($stmt->execute()) {
            return true;
        }
    }

    public function deletar($id)
    {
        $query = "delete from {$this->entity->getTableName()} where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);

        if($stmt->execute()) {
            return true;
        }
    }

    public function getColumns()
    {
        $query = "show columns from {$this->entity->getTableName()}";

        $resultado = $this->db->query($query);

        return $resultado->fetchAll(PDO::FETCH_COLUMN, 0);
    }
}
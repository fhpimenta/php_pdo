<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 10:45
 */
class Cliente implements EntidadeInterface
{
    private $tableName = "clientes";
    private $id;
    private $name;
    private $email;

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
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

    public function getData()
    {
        $data = array();

        if(isset($this->id)) ? $data['id']
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 23/12/15
 * Time: 15:39
 */
interface EntidadeInterface
{

    public function setTableName($tableName);
    public function getTableName();

    public function setId($id);
    public function getId();
}
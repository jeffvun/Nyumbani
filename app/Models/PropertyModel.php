<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class PropertyModel
{
    protected $db;
    protected $table= 'tbl_property';

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }


    public function addProperty($data1)
    {
          $builder = $this->db->table('tbl_property');
          $builder->insert($data1);
          $propertyID = $this->db->insertID();
          return $this->db->insertID();
    }

// Created this custom model to return the primary key after insert since
// database guys refused to fold
// All love though :(

}

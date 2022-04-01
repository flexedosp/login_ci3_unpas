<?php

class auth_model extends CI_Model
{
    public function addAccount($data)
    {
        return $this->db->insert('user', $data);
    }

    // public function recountRow()
    // {
    //     $countRow = $this->db->count_all('user');

    //     for( $count = 0; $count < $countRow){
    //         $this->db->query("UPDATE user SET id = " . $count );

    //     }



    //     return $this->db->query('ALTER TABLE user AUTO_INCREMENT = 1;');

    // }
}

<?php

class Facebookmodel extends CI_Model
{

    private $table = 'fb_users';

    function __construct()
    {
        parent::__construct();
    }


    function CheckUserExist($param)
    {
        $result = $this->db->get_where($this->table, array('user_id' => $param));
        $result->num_rows();
        if ($result->num_rows()>0) return true;

    }


  function getToken($param)
    {
        $result = $this->db->get_where($this->table, array('user_id' => $param));
        $row = $result->row_array();
        if ($result->num_rows()>0) return $row;
        else return false;

    }

    function selectAll()
    {
        return $this->db->get($this->table)->result();
    }

    function insert_entry($param)
    {
        $this->user_id = $param['user_id'];
        $this->name = $param['name'];
        $this->access_token = $param['token'];
        $this->db->insert($this->table, $this);
    }

    function update_entry($param)
    {
        $parama=array(
                'access_token'=>$param['token']
                );
        $this->db->where('user_id',$param['user_id']);
        $this->db->update($this->table,$parama);
    }

}
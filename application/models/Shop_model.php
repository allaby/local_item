<?php

class Shop_model extends CI_Model{


    private $item_table = "items";
    private $img_table = "images";
    private $category_table = "categories";

    private const ELEM_ACTIV = 1;
    private const ELEM_DESACTIV = 1;


    function get_item(){
        $this->db->select($this->item_table.'.*');
        $this->db->select($this->category_table.'.category_id as category_id, '.$this->category_table.'.name as category_name, ');
        $this->db->join($this->category_table,$this->category_table.'.category_id = '.$this->item_table.'.category_id');
    }

    public function countItem(){
        $this->get_item();
        return $this->db->get($this->item_table)->num_rows();
    }

    function getItems($item_id = false, $limit = false, $start = false){
        $this->get_item();
        if($item_id == true){
            $this->db->where($this->item_table.'.item_id',$item_id);
            return $this->db->get($this->item_table)->row_array();
        }else if($limit == true and $start == true){
            $this->db->limit($limit, $start);
        }
        return $this->db->get($this->item_table)->result();
    }



}
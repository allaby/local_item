<?php

class Shop_model extends CI_Model
{


    private $item_table = "items";
    private $img_table = "images";
    private $category_table = "categories";
    private $order_table = "orders";
    private $order_detail_table = "order_details";

    private const ELEM_ACTIV = 1;
    private const ELEM_DESACTIV = 0;


    function get_item()
    {
        $this->db->select($this->item_table . '.*');
        $this->db->select($this->category_table . '.category_id as category_id, ' . $this->category_table . '.name as category_name, ');
        $this->db->join($this->category_table, $this->category_table . '.category_id = ' . $this->item_table . '.category_id');
    }

    public function countItem()
    {
        $this->get_item();
        return $this->db->get($this->item_table)->num_rows();
    }

    function getItems($item_id = false, $limit = false, $start = false)
    {
        $this->get_item();
        if ($item_id == true) {
            $this->db->where($this->item_table . '.item_id', $item_id);
            return $this->db->get($this->item_table)->row_array();
        } else if ($limit == true and $start == true) {
            $this->db->limit($limit, $start);
        }
        return $this->db->get($this->item_table)->result();
    }

    public function getImg_path($item_id)
    {
        $this->db->select($this->img_table . '.path');
        $this->db->where($this->img_table . '.item_id', $item_id);
        $this->db->where($this->img_table . '.feath_img', self::ELEM_ACTIV);
        return $this->db->get($this->img_table)->row_array();
    }

    public function neworder($data)
    {
        $this->db->insert($this->order_table, $data);
        return $this->db->insert_id();
    }


    public function insert_order_line($data)
    {
        $this->db->insert($this->order_detail_table, $data);
        return true;
    }

    public function getCat($category)
    {
        $this->db->select($this->category_table . '.*');
        $this->db->where($this->category_table . '.category_id', $category);
        return $this->db->get($this->category_table)->row_array();
    }


    public function getrelateditems($cat)
    {
        $this->get_item();
        $this->db->where($this->item_table . '.category_id', $cat);
        $this->db->limit(6);
        return $this->db->get($this->item_table)->result();
    }

    public function getFeImg($item_id)
    {
        $this->db->select($this->img_table . '.*');
        $this->db->where($this->img_table . '.feath_img', 1);
        $this->db->where($this->img_table . '.item_id', $item_id);
        return $this->db->get($this->img_table)->row_array();
    }

    public function getAllCat($cat = false)
    {
        $this->db->select($this->category_table . '.*');
        // $this->db->select_sum($this->item_table . '.item_id');
        // $this->db->join($this->item_table, $this->item_table . '.category_id = ' . $this->category_table . '.category_id', 'left');
        if ($cat) {
            $this->db->where($this->category_table . '.category_id', $cat);
            return $this->db->get($this->category)->row_array();
        } else {
            return $this->db->get($this->category_table)->result();
        }
    }
}

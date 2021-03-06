<?php

class Shop_model extends CI_Model
{


    private $item_table = "items";
    private $img_table = "images";
    private $category_table = "categories";
    private $order_table = "orders";
    private $order_detail_table = "order_details";
    private $inventory_table = "inventories";
    private $invoice_table = "invoices";
    private $address_table = "addresses";

    private const ELEM_ACTIV = 1;
    private const ELEM_DESACTIV = 0;


    function get_item()
    {
        $this->db->select($this->item_table . '.*');
        $this->db->select($this->category_table . '.category_id as category_id, ' . $this->category_table . '.name as category_name, ');
        $this->db->select($this->img_table . '.path as imgpath');
        $this->db->join($this->category_table, $this->category_table . '.category_id = ' . $this->item_table . '.category_id');
        $this->db->join($this->img_table, $this->img_table . '.item_id = ' . $this->item_table . '.item_id', 'left');
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
        } else if ($limit == true and $start == false) {
            $this->db->limit($limit);
        }
        $this->db->order_by($this->item_table . '.item_id', 'DESC');
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

    public function getOrders($order = false)
    {
        $this->db->select($this->order_table . '.*');
        if ($order) {
            $this->db->where($this->order_table . '.order_id', $order);
            return $this->db->get($this->order_table)->row_array();
        } else {
            $this->db->order_by($this->order_table . '.order_id', 'DESC');
            return $this->db->get($this->order_table)->result();
        }
    }


    public function insert_order_line($data)
    {
        $this->db->insert($this->order_detail_table, $data);
        return true;
    }

    public function getCat($category = false)
    {
        $this->db->select($this->category_table . '.*');
        if ($category) {
            $this->db->where($this->category_table . '.category_id', $category);
            return $this->db->get($this->category_table)->row_array();
        } else {
            $this->db->order_by($this->category_table . '.category_id', 'DESC');
            return $this->db->get($this->category_table)->result();
        }
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
            $this->db->order_by($this->category_table . '.category_id', 'DESC');
            return $this->db->get($this->category_table)->result();
        }
    }

    public function checkcatnam($catname)
    {
        $this->db->select($this->category_table . '.*');
        $this->db->where($this->category_table . '.name', $catname);
        return $this->db->get($this->category_table)->num_rows();
    }


    public function insertCat($data)
    {
        $this->db->insert($this->category_table, $data);
        return true;
    }


    public function getCustOrders($contact_id)
    {
        $this->db->select($this->order_table . '.*');
        $this->db->where($this->order_table . '.contact_id', $contact_id);
        $this->db->order_by($this->order_table . '.creation_date','DESC');
        return $this->db->get($this->order_table)->result();
    }


    public function getOrderlines($order_id)
    {
        $this->db->select($this->order_detail_table . '.*');
        $this->db->where($this->order_detail_table . '.order_id', $order_id);
        $this->db->select($this->item_table . '.name as item_name');
        $this->db->select($this->item_table . '.price_max as unit_price');
        $this->db->select($this->item_table . '.reference as item_ref');
        $this->db->join($this->item_table, $this->item_table . '.item_id = ' . $this->order_detail_table . '.item_id');
        return $this->db->get($this->order_detail_table)->result();
    }
    public function updateItemStock($item_id, $qty)
    {
        $stock = $this->getItems($item_id)['stock_av'];
        $newstock = $qty + $stock;
        $data = array(
            "stock_av" => $newstock
        );
        $this->db->where($this->item_table . '.item_id', $item_id);
        $this->db->update($this->item_table, $data);
        return true;
        // var_dump($stock);
    }


    public function newInventoty($data)
    {
        $this->db->insert($this->inventory_table, $data);
        return true;
    }

    public function newItem($data)
    {
        $this->db->insert($this->item_table, $data);
        return $this->db->insert_id();
    }

    public function newInvoice($data)
    {
        $this->db->insert($this->invoice_table, $data);
        return $this->db->insert_id();
    }


    public function insertFeaImg($data)
    {
        $this->db->insert($this->img_table, $data);
        return true;
    }
    public function getInvoice($invoice_id)
    {
        $this->db->select($this->invoice_table . '.*');
        $this->db->where($this->invoice_table . '.invoice_id', $invoice_id);
        return $this->db->get($this->invoice_table)->row_array();
    }


    public function getAddbyID($address_id)
    {
        $this->db->select($this->address_table . '.*');
        $this->db->where($this->address_table . '.address_id', $address_id);
        return $this->db->get($this->address_table)->row_array();
    }
}

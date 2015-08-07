<?php
class Filter_relation_model extends CI_Model {

    public $id;
    public $filter_id;
    public $product_id;

    const TABLE = 'filters_relations';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);

        $data = $query->result();

        return end($data);
    }

    public function delete_by_id($id)
    {
        $query = $this->db->delete($this->table, ['id' => $id]);

        return (boolean) $query;
    }

    public function product_save($id)
    {
        $this->db->delete($this::TABLE, ['product_id' => $id]);

        if (!empty($_POST['filters'])) {
            foreach ($_POST['filters'] as $filter_id) {
                $fr = new Filter_relation_model();
                $fr->filter_id = $filter_id;
                $fr->product_id = $id;
                $fr->db->insert($fr::TABLE, $fr);
            }
            return true;
        }

        return false;
    }

    public function get_by_product($id)
    {
        $this->db->select('f.id as filter_id, f.name as filter_name, fc.id as category_id, fc.name as category_name');
        $this->db->from($this::TABLE.' fr');
        $this->db->join(Filter_model::TABLE.' f', 'f.id = fr.filter_id');
        $this->db->join(Filter_category_model::TABLE.' fc', 'f.filter_category = fc.id');
        $this->db->where('fr.product_id', $id);
        $query = $this->db->get();

        $data = $query->result_array();

        $return_data = array();
        foreach ($data as $fr) {
            $return_data[$fr['category_id']]['filter_id'] = $fr;
        }

        return $return_data;
    }

    public function get_all()
    {
        $this->db->select('f.id as filter_id, f.name as filter_name, fc.id as category_id, fc.name as category_name');
        $this->db->from($this::TABLE.' fr');
        $this->db->join(Filter_model::TABLE.' f', 'f.id = fr.filter_id');
        $this->db->join(Filter_category_model::TABLE.' fc', 'f.filter_category = fc.id');
        $query = $this->db->get();

        $data = $query->result_array();

        $return_data = array();
        foreach ($data as $fr) {
            $return_data[$fr['category_id']][$fr['filter_id']] = $fr;
        }
        return $return_data;
    }
}
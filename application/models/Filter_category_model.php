<?php
class Filter_category_model extends CI_Model {

    public $id;
    public $name;
    public $date;

    const TABLE = 'filter_categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $query = $this->db->get($this::TABLE);

        return $query->result();
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this::TABLE, ['id' => $id]);

        $data = $query->result();

        return end($data);
    }

    public function delete_by_id($id)
    {
        $query = $this->db->delete($this::TABLE, ['id' => $id]);

        return (boolean) $query;
    }
}
<?php
class Filter_model extends CI_Model {

    public $filter_category;
    public $name;
    public $date;

    const TABLE = 'filters';

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

    public function insert_all()
    {
        foreach ($_POST['filters'] as $c) {
            if (!empty($c)) {
                $c_obj = new Filter_category_model();
                $c_obj->name = $c['name'];
                if (!empty($c['id'])) {
                    $c_obj->db->where('id', $c['id']);
                    $c_obj->db->update($c_obj::TABLE, $c_obj);
                    $filter_category_id = $c['id'];
                } else {
                    $c_obj->db->insert($c_obj::TABLE, $c_obj);
                    $filter_category_id = $c_obj->db->insert_id();
                }

                if (!empty($c['filters'])) {
                    foreach ($c['filters'] as $f) {
                        $f_obj = new Filter_model();
                        $f_obj->filter_category = $filter_category_id;
                        $f_obj->name = $f['name'];
                        if (!empty($f['id'])) {
                            $f_obj->db->where('id', $f['id']);
                            $f_obj->db->update($f_obj::TABLE, $f_obj);
                        } else {
                            $f_obj->db->insert($f_obj::TABLE, $f_obj);
                        }
                    }
                }
            }
        }
    }

    public function get_all()
    {
        $query = $this->db->get(Filter_category_model::TABLE);
        $filter_categories = $query->result();

        foreach ($filter_categories as $fc) {
            $query = $this->db->get_where($this::TABLE, ['filter_category' => $fc->id]);

            $fc->filters = $query->result();
        }

        return $filter_categories;
    }
}
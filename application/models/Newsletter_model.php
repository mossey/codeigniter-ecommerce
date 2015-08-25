<?php
class Newsletter_model extends CI_Model {

    public $id;
    public $subject_romanian;
    public $subject_russian;
    public $content_romanian;
    public $content_russian;
    public $subscribers;
    public $image;
    public $date;

    private $table = 'newsletter';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $this->db->order_by("date", "desc");

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

    public function upload()
    {
        if (!empty($_FILES['image'])) {
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["image"]["tmp_name"];
                $name = $_FILES["image"]["name"];
                $name = substr(md5($name), 0, 3) . substr(time(), 0, 3) . '-' . strtolower($name);

                $path = "uploads/";

                if (move_uploaded_file($tmp_name, $path.$name)) {
                    return $name;
                }
            }
        }
        return false;
    }

    public function insert()
    {
        $this->subject_romanian = $_POST['subject_romanian'];
        $this->subject_russian = $_POST['subject_russian'];
        $this->content_romanian = $_POST['content_romanian'];
        $this->content_russian = $_POST['content_russian'];
        $this->subscribers = count($_POST['subscribers']);

        $this->image = $this->upload();
        if (empty($this->image)) unset($this->image);

        $this->db->insert($this->table, $this);
    }
}
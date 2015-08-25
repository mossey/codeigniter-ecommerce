<?php
class Offer_model extends CI_Model {

    public $until_date;
    public $products;
    public $content_romanian;
    public $content_russian;
    public $price;
    public $image;
    public $date;

    private $table = 'offers';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function get_available_offers()
    {
        $this->db->order_by("date DESC");
        $this->db->where('until_date >=', date('Y-m-d'));

        $query = $this->db->get($this->table);

        $results = $query->result();

        foreach ($results as $key => $result) {
            $results[$key] = $this->get_data_by_id($result->id);
        }

        return $results;
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);

        $data = $query->result();

        $offer = end($data);

        $offer->products = unserialize($offer->products);

        $offer->db_products = array();
        foreach ($offer->products as $id) {
            $offer->db_products[] = (new Product_model)->get_data_by_id($id);
        }

        return end($data);
    }

    public function delete_by_id($id)
    {
        $query = $this->db->delete($this->table, ['id' => $id]);

        return (boolean) $query;
    }

    public function insert()
    {
        $this->until_date = date('Y-m-d', strtotime($_POST['until_date']));
        $this->products = serialize($_POST['products']);
        $this->content_romanian = $_POST['content_romanian'];
        $this->content_russian = $_POST['content_russian'];
        $this->price = $_POST['price'];

        $this->image = $this->upload();
        if (empty($this->image)) unset($this->image);

        $this->db->insert($this->table, $this);
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

    public function update()
    {
        $this->until_date = date('Y-m-d', strtotime($_POST['until_date']));
        $this->products = serialize($_POST['products']);
        $this->content_romanian = $_POST['content_romanian'];
        $this->content_russian = $_POST['content_russian'];
        $this->price = $_POST['price'];

        $this->image = $this->upload();
        if (empty($this->image)) unset($this->image);

        $this->db->update($this->table, $this, "id = " . $_POST['id']);
    }

}
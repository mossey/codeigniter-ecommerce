<?php
class Product_model extends CI_Model {

    public $name;
    public $description;
    public $category;
    public $price;
    public $image;
    public $active;
    public $views;
    public $date;

    private $table = 'products';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_data()
    {
        $this->db->select('p.*, c.name as category_name');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_data_by_category($id)
    {
        $this->db->select('p.*, c.name as category_name');
        $this->db->from($this->table . ' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->where('p.category', $id);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_products_by_limit_and_order($limit = 20, $order_by = 'p.views', $order = 'asc')
    {
        $this->db->select('p.*, c.name as category_name');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->order_by('p.views', $order);
        $this->db->limit($limit);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_popular_products($limit = 20) {
        return $this->get_products_by_limit_and_order($limit, 'p.views', 'desc');
    }

    public function get_newest_products($limit = 20) {
        return $this->get_products_by_limit_and_order($limit, 'p.id');
    }

    public function get_popular_categories($limit = 20) {
        $this->db->select('c.*, COUNT(p.id) as products');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->group_by("c.name");
        $this->db->order_by("SUM(p.views) DESC");
        $this->db->limit($limit);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }
	
	public function get_footer_pages()
	{
		$footer_pages = array();
        $footer_pages['popular_categories'] = $this->get_popular_categories(5);
		$footer_pages['popular_products'] = $this->get_popular_products(5);
		$footer_pages['newest_products'] = $this->get_newest_products(5);

        return $footer_pages;
	}

    public function get_data_by_id($id, $admin = false)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);

        $data = $query->result();

        $product = end($data);

        $categories = new Filter_relation_model();
        $categories = $categories->get_by_product($product->id);

        if ($admin) {
            foreach ($categories as $category) {
                foreach ($category as $filter) {
                    $product->filters[$filter['filter_id']] = $filter;
                }
            }
        } else {
            foreach ($categories as $key => $category) {
                $category_name = '';
                $filter_names = array();

                foreach ($category as $filter) {
                    $category_name = $filter['category_name'];
                    $filter_names[] = $filter['filter_name'];
                }
                $product->categories[$key] = array('category_name' => $category_name, 'filter_names' => $filter_names);
            }
        }

        return $product;
    }

    public function update_views($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        $result = $query->result();
        $data = end($result);

        $views = $data->views + 1;

        $this->db->update($this->table, ['views' => $views], "id = " . $id);

        return end($data);
    }

    public function record_count() {
        return $this->db->count_all($this->table);
    }

    public function fetch_products($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function delete_by_id($id)
    {
        $query = $this->db->delete($this->table, ['id' => $id]);

        return (boolean) $query;
    }

    public function insert()
    {
        $this->name             = $_POST['name'];
        $this->description      = $_POST['description'];
        $this->price            = $_POST['price'];
        $this->category         = $_POST['category'];
        $this->active           = !empty($_POST['active']) ? $_POST['active'] : 0;

        $this->image = $this->upload();
        if (empty($this->image)) $this->image = 'no-image.jpeg';

        $this->db->insert($this->table, $this);
        $product_id = $this->db->insert_id();

        $fr = new Filter_relation_model();
        $fr->product_save($product_id);
    }

    public function upload()
    {
        if (!empty($_FILES['image'])) {
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["image"]["tmp_name"];
                $name = $_FILES["image"]["name"];
                $name = substr(md5($name), 0, 3) . substr(time(), 0, 3) . '-' . strtolower($name);

                $path = "uploads/";

                if (move_uploaded_file($tmp_name, $path . $name)) {
                    return $name;
                }
            }
        }
        return false;
    }

    public function update()
    {
        $this->name             = $_POST['name'];
        $this->description      = $_POST['description'];
        $this->price            = $_POST['price'];
        $this->category         = $_POST['category'];
        $this->active           = !empty($_POST['active']) ? $_POST['active'] : 0;

        $this->image = $this->upload();
        if (empty($this->image)) unset($this->image);

        $this->db->update($this->table, $this, "id = ".$_POST['id']);

        $fr = new Filter_relation_model();
        $fr->product_save($_POST['id']);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filters extends Admin {

    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['filters'] = $this->filter_model->get_all();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/filters', $this->data);
        $this->load->view('admin/footer', $this->data);
    }


    public function save($id = null)
    {
        if (!empty($_POST)) {
            $this->filter_model->insert_all();
            $this->session->set_flashdata('success', 'Filtrele au fost adaugate cu success.');
        }

        redirect('admin/filters');
    }
}

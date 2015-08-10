<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Admin {

    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function delete($id)
    {
        $this->comment_model->delete_by_id($id);

        $this->session->set_flashdata('success', 'Comentariul a fost sters cu succes.');

        redirect('admin/comments');
    }

    public function index()
    {
        $this->data['comments'] = $this->comment_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/comments', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
}

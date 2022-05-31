<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function index()
  {
    // $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    // echo 'Selamat Datang ' . $data['user']['username'];

    // $data['title'] = 'SIMS DigiSchool';
    // $this->load->view('templates/auth_header', $data);
    $this->load->view('user/index');
    // $this->load->view('templates/auth_footer');
  }
}

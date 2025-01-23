<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index(){
        return redirect('auth/login');
    }

    public function login()
    {

        if(isset($this->session->role)){
            $role = $this->session->role;
            if ($role == 'admin') {
                redirect('dashboard');
            } else if ($role == 'mahasiswa') {
                redirect('dashboard/mahasiswa');
            } else if ($role == 'dosen') {
                redirect('dashboard/dosen');
            }
        }

        $this->load->view('login');
    }
    public function action_login()
    {
        
        $this->load->model('User_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->authenticate_user($username, $password);
        if ($user) {
            // Set session data or perform other login actions
            $this->session->set_userdata('id', $user->id);
            $this->session->set_userdata('role', $user->role);
            if ($user->role == 'admin') {
                redirect('dashboard');
            } else if ($user->role == 'mahasiswa') {
                redirect('dashboard/mahasiswa');
            } else if ($user->role == 'dosen') {
                redirect('dashboard/dosen');
            }
        } else {
            // Handle login failure
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth/login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

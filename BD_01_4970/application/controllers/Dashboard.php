<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    // public function home()
    // {
    //     $this->load->view('home');
    // }
    // public function well()
    // {
    //     $this->load->view('well');
    // }
    public function __construct()
	{
        parent::__construct();
         if(empty($this->session->id)){
            return redirect('auth/login');
         }
    }

    public function index()
    {

        if($this->session->role!="admin"){
            return redirect('auth/login');
        }
        // Load the model
        $this->load->model('User_model');

        // Fetch data from the model
        $users = $this->User_model->get_users_by_role("mahasiswa");

        $data['users'] = $users;

        $this->load->view('dashboard/admin', $data);
    }

    public function dosen()
    {
        
        if($this->session->role!="dosen"){
            return redirect('auth/login');
        }
        // Load the model
        $this->load->model('User_model');
        $this->load->model('Matakuliah_model');

        // Fetch data from the model
        $students      = $this->User_model->get_users_by_role("mahasiswa");

        $matakuliah = $this->Matakuliah_model->get_all_matakuliah();

        $nilais     = $this->User_model->get_nilai_mahasiswa("mahasiswa");

        $data['students']      = $students;
        $data['matakuliah'] = $matakuliah;
        $data['nilai']      = $nilais;

        $this->load->view('dashboard/dosen', $data);
    }

    public function mahasiswa()
    {
        
        if($this->session->role!="mahasiswa"){
            return redirect('auth/login');
        }
        $id = $this->session->id;
        // Load the model
        $this->load->model('User_model');
        $this->load->model('Matakuliah_model');

        // Fetch data from the model
        $students      = $this->User_model->get_users_by_role("mahasiswa");

        $matakuliah = $this->Matakuliah_model->get_all_matakuliah();

        $nilais     = $this->User_model->get_nilai_mahasiswa_by_id($id);

        $data['students']      = $students;
        $data['matakuliah'] = $matakuliah;
        $data['nilai']      = $nilais;

        $this->load->view('dashboard/mahasiswa', $data);
    }

    // $this->load->view('layout/header');
    // $this->load->view('dashboard');
    // $this->load->view('layout/footer');
}

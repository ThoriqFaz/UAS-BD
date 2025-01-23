<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function create(){

        $this->load->model('User_model');

        $data['nama'] = $this->input->post('nama');
        $data['user'] = $this->input->post('nim');
        $data['password'] = $this->input->post('password');
        $data['role'] = 'mahasiswa';
        
        
        $user = $this->User_model->create($data);

        if($user){
            
            $this->session->set_flashdata('success', 'Success Add Mahasiswa');
            return redirect('dashboard');
        }
        else{
            $this->session->set_flashdata('error', 'Invalid username or password');
            
            return redirect('dashboard');
        }

        
    }

    public function cek_nilai(){
        
        $this->load->model('User_model');

        $input = json_decode(file_get_contents('php://input'), TRUE);

        $mahasiswa_id = isset($input['mahasiswa_id']) ? $input['mahasiswa_id'] : null;
        $matkul_id = isset($input['matkul_id']) ? $input['matkul_id'] : null;

        $cek = $this->User_model->get_nilai_mahasiswa_by_matakuliah($mahasiswa_id, $matkul_id);

        if ($cek) {
            echo json_encode(['nilai' => $cek[0]]); 
        }
        else{
            echo json_encode(['nilai' => null]); 
        }

    }

    public function update_nilai() {
        
        $this->load->model('User_model');
        // Cek apakah data dikirim melalui POST
        if ($this->input->post()) {
            // Ambil data dari form
            $mahasiswa_id = $this->input->post('nama');  // ID Mahasiswa
            $matkul_id = $this->input->post('matakuliah');  // ID Matakuliah
            $nilai = $this->input->post('nilai');  // Nilai yang baru
            $id_nilai = $this->input->post('nilai_id');  // Nilai yang baru


            // Lakukan validasi dan update nilai
            if ($mahasiswa_id && $matkul_id && $nilai) {
                // Panggil model untuk update nilai
                $update_result = $this->User_model->update_nilai($mahasiswa_id, $matkul_id, $nilai, $id_nilai);

                // Cek apakah update berhasil
                if ($update_result) {
                    $this->session->set_flashdata('success', 'Nilai berhasil diubah!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah nilai!');
                }

                redirect('dashboard/dosen');
            }
        }
    }

    public function update() {
        
        $this->load->model('User_model');
        // Cek apakah data dikirim melalui POST
        if ($this->input->post()) {
            // Ambil data dari form
            $nim = $this->input->post('nim'); //nim
            $nama = $this->input->post('nama');

            // Lakukan validasi dan update nilai
            if ($nim && $nama) {
                $data['nama'] = $nama;
                // Panggil model untuk update nilai
                $update_result = $this->User_model->update_user($nim, $data);

                // Cek apakah update berhasil
                if ($update_result) {
                    $this->session->set_flashdata('success', 'Nama berhasil diubah!');
                } else {
                    $this->session->set_flashdata('error', 'Nama mengubah nilai!');
                }

                redirect('dashboard');
            }
        }
    }


    public function delete(){
        $this->load->model('User_model');
        // Cek apakah data dikirim melalui POST
        if ($this->input->get()) {
            
            $nim = $this->input->get('delete_nim');
            // Lakukan validasi dan update nilai
            if ($nim) {
                // Panggil model untuk update nilai
                $result = $this->User_model->delete_user($nim);

                // Cek apakah update berhasil
                if ($result) {
                    $this->session->set_flashdata('success', 'Nama berhasil diubah!');
                } else {
                    $this->session->set_flashdata('error', 'Nama mengubah nilai!');
                }

                redirect('dashboard');
            }
        }
    }



}

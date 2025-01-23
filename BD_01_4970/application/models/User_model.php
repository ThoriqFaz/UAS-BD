
<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class User_model extends CI_Model
    {
        protected $table = 'user';

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function create($data) {
    
            return $this->db->insert($this->table, $data);
        }

        // Get all user
        public function get_all_users()
        {
            $query = $this->db->get('user');
            return $query->result();
        }
        public function get_users_by_role($role = "mahasiswa")
        {
            $this->db->where('role', $role);
            $query = $this->db->get('user');
            return $query->result();
        }

        public function get_nilai_mahasiswa_by_matakuliah($mahasiswa_id, $matkul_id){
            $this->db->select('score, id');
            $this->db->where('mahasiswa_id', $mahasiswa_id);
            $this->db->where('matakuliah_id', $matkul_id);
            $query = $this->db->get('nilai');
            return $query->result();
        }

        public function get_nilai_mahasiswa()
        {
            $this->db->select('nilai.*, user.nama, user.user, matakuliah.nama as matkul');
            $this->db->from('nilai');
            $this->db->join('user', 'nilai.mahasiswa_id = user.id');
            $this->db->join('matakuliah', 'matakuliah.id = nilai.matakuliah_id');
            // $this->db->where('user.role', 'mahasiwa');
            $query = $this->db->get();
            return $query->result();
        }
        public function get_nilai_mahasiswa_by_id($mahasiswa_id)
        {
            $this->db->select('nilai.*, user.nama, user.user, matakuliah.nama as matkul');
            $this->db->from('nilai');
            $this->db->join('user', 'nilai.mahasiswa_id = user.id');
            $this->db->join('matakuliah', 'matakuliah.id = nilai.matakuliah_id');
            $this->db->where('user.id', $mahasiswa_id);
            $query = $this->db->get();
            return $query->result();
        }

        public function insert_user($data)
        {
            return $this->db->insert('user', $data);
        }

        // Update user
        public function update_user($id, $data)
        {
            $this->db->where('user', $id);
            return $this->db->update('user', $data);
        }

        public function update_nilai($mahasiswa_id, $matkul_id, $nilai, $id_nilai)
        {

            if(isset($id_nilai) && $id_nilai!=''){
                $this->db->where('id', $id_nilai);
                $data['score'] = $nilai;
                return $this->db->update('nilai', $data);
            }
            else{
                
                $data['score'] = $nilai;
                $data['matakuliah_id'] =$matkul_id;
                $data['mahasiswa_id'] =$mahasiswa_id;
                return $this->db->insert('nilai', $data);
            }

        }


        // Delete user
        public function delete_user($nim)
        {
            $this->db->where('user', $nim);
            return $this->db->delete('user');
        }
        // Authenticate user
        public function authenticate_user($username, $password)
        {
            $this->db->where('user', $username);
            $query = $this->db->get('user');
            $user  = $query->row();

            if ($user && $password == $user->password) {
                return $user;
            } else {
                return false;
            }
        }
}

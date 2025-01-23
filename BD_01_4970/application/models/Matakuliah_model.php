
<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Matakuliah_model extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            // $this->db1 = $this->load->database('responsi_1', true);
            // $this->db2 = $this->load->database('responsi_2', true);
        }

        // Get all user
        public function get_all_matakuliah()
        {
            $query = $this->db->get('matakuliah');
            return $query->result();
        }

}

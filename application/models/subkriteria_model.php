<?php 

 class Subkriteria_model extends CI_Model {

 	public function tampil_data()
 	{
 		return $this->db->get('subkriteria');
 	}


 	public function countAllSub()
 	{
 		return $this->db->get('subkriteria')->num_rows();
 	}

 	public function input_data($data,$table)
 	{
 		$this->db->insert($table,$data);
 	}

 	public function insert_data($data,$table)
 	{
 		$this->db->insert($table,$data);
 	}

 	public function update_data($where,$data,$table)
 	{
 		$this->db->where($where);
 		$this->db->update($table,$data);
 	}

 	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	


}
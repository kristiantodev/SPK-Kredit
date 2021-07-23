  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelayakan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        
	}

	public function index()
	{
        $query = $this->db->query("SELECT alternatif.nama_nasabah, kredit.aproved, kredit.tgl_kredit, k1.nama_sub as nama_sub1, k2.nama_sub as nama_sub2, k3.nama_sub as nama_sub3, k4.nama_sub as nama_sub4, k5.nama_sub as nama_sub5, k1.bobot_sub as bobot1, k2.bobot_sub as bobot2 , k3.bobot_sub as bobot3 , k4.bobot_sub as bobot4 , k5.bobot_sub as bobot5, k1.bobot_global as bobot_global1, k2.bobot_global as bobot_global2, k3.bobot_global as bobot_global3,
            k4.bobot_global as bobot_global4, k5.bobot_global as bobot_global5      
            FROM kredit INNER JOIN alternatif ON kredit.id_alternatif = alternatif.id_alternatif
            INNER JOIN subkriteria as k1 ON k1.id_sub = kredit.c1
            INNER JOIN subkriteria as k2 ON k2.id_sub = kredit.c2
            INNER JOIN subkriteria as k3 ON k3.id_sub = kredit.c3
            INNER JOIN subkriteria as k4 ON k4.id_sub = kredit.c4
            INNER JOIN subkriteria as k5 ON k5.id_sub = kredit.c5");

        $query2 = $this->db->query("SELECT alternatif.nama_nasabah, kredit.aproved, kredit.tgl_kredit, k1.nama_sub as nama_sub1, k2.nama_sub as nama_sub2, k3.nama_sub as nama_sub3, k4.nama_sub as nama_sub4, k5.nama_sub as nama_sub5, k1.bobot_sub as bobot1, k2.bobot_sub as bobot2 , k3.bobot_sub as bobot3 , k4.bobot_sub as bobot4 , k5.bobot_sub as bobot5, k1.bobot_global as bobot_global1, k2.bobot_global as bobot_global2, k3.bobot_global as bobot_global3,
            k4.bobot_global as bobot_global4, k5.bobot_global as bobot_global5, 
            ROUND((POW(k1.bobot_sub, k1.bobot_global))*(POW(k2.bobot_sub,k2.bobot_global))*(POW(k3.bobot_sub ,k3.bobot_global))*(POW(k4.bobot_sub,k4.bobot_global))*(POW(k5.bobot_sub,k5.bobot_global)),3) AS nilai_s, kredit.aproved, kredit.id_kredit       
            FROM kredit INNER JOIN alternatif ON kredit.id_alternatif = alternatif.id_alternatif
            INNER JOIN subkriteria as k1 ON k1.id_sub = kredit.c1
            INNER JOIN subkriteria as k2 ON k2.id_sub = kredit.c2
            INNER JOIN subkriteria as k3 ON k3.id_sub = kredit.c3
            INNER JOIN subkriteria as k4 ON k4.id_sub = kredit.c4
            INNER JOIN subkriteria as k5 ON k5.id_sub = kredit.c5
            ORDER BY nilai_s DESC");
		 
         $data=array(
            "kredit"=>$query->result(),
            "hasil"=>$query2->result(),

        );

		$this->load->view('templates_kredit/header');
        $this->load->view('templates_kredit/sidebar');
        $this->load->view('bagiankredit/keputusan',$data);
        $this->load->view('templates_kredit/footer');
	}


   public function aproved($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Aproved");
            redirect('pimpinan/kelayakan');
        }else{
            $this->db->set('aproved', "yes");
            $this->db->where('id_kredit', $id);
            $this->db->update('kredit');
            $this->session->set_flashdata('sukses',"Data Berhasil Diaproved");
            redirect('pimpinan/kelayakan');
        }
    }



	
}

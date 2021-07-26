  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kredit extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        
	}

	public function index()
	{
		$query = $this->db->query("SELECT * FROM subkriteria WHERE nama_kriteria='Usia'");
		$query2 = $this->db->query("SELECT * FROM subkriteria WHERE nama_kriteria='Tanggungan'");
		$query3 = $this->db->query("SELECT * FROM subkriteria WHERE nama_kriteria='Besar Gaji'");
		$query4 = $this->db->query("SELECT * FROM subkriteria WHERE nama_kriteria='Besar Pinjaman'");
		$query5 = $this->db->query("SELECT * FROM subkriteria WHERE nama_kriteria='Riwayat nasabah'");
        $query6 = $this->db->query("SELECT alternatif.nama_nasabah, kredit.aproved, kredit.tgl_kredit, k1.nama_sub as nama_sub1, k2.nama_sub as nama_sub2, k3.nama_sub as nama_sub3, k4.nama_sub as nama_sub4, k5.nama_sub as nama_sub5, alternatif.nik 
            FROM kredit INNER JOIN alternatif ON kredit.id_alternatif = alternatif.id_alternatif
            INNER JOIN subkriteria as k1 ON k1.id_sub = kredit.c1
            INNER JOIN subkriteria as k2 ON k2.id_sub = kredit.c2
            INNER JOIN subkriteria as k3 ON k3.id_sub = kredit.c3
            INNER JOIN subkriteria as k4 ON k4.id_sub = kredit.c4
            INNER JOIN subkriteria as k5 ON k5.id_sub = kredit.c5");
		 
         $data=array(
         	"criteria1"=>$query->result(),
            "criteria2"=>$query2->result(),
            "criteria3"=>$query3->result(),
            "criteria4"=>$query4->result(),
            "criteria5"=>$query5->result(),
            "nasabah"=>$this->db->get('alternatif')->result(),
            "kredit"=>$query6->result(),

        );

		$this->load->view('templates_kredit/header');
        $this->load->view('templates_kredit/sidebar');
        $this->load->view('bagiankredit/kredit',$data);
        $this->load->view('templates_kredit/footer');
	}


	public function add()
    {
        $this->form_validation->set_rules('id_alternatif', 'id_alternatif', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('bagiankredit/kredit');
        }else{

            $data=array(
                "id_alternatif"=>$_POST['id_alternatif'],
                "tgl_kredit"=>$_POST['tgl_kredit'],
                "c1"=>$_POST['c1'],
                "c2"=>$_POST['c2'],
                "c3"=>$_POST['c3'],
                "c4"=>$_POST['c4'],
                "c5"=>$_POST['c5'],
                "aproved"=>"no"
            );
            $this->db->insert('kredit',$data);
            $this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
            redirect('bagiankredit/kredit');

        }
    }


	
}

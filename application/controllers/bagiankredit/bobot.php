  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bobot extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        
	}

	public function index()
	{
		 $query = $this->db->query("SELECT SUM(bobot_sub) as totalBobot from subkriteria where nama_kriteria='Usia' GROUP BY nama_kriteria");
		 $query2 = $this->db->query("SELECT SUM(bobot_sub) as totalBobot from subkriteria where nama_kriteria='Tanggungan' GROUP BY nama_kriteria");
		 $query3 = $this->db->query("SELECT SUM(bobot_sub) as totalBobot from subkriteria where nama_kriteria='Besar Gaji' GROUP BY nama_kriteria");
		 $query4 = $this->db->query("SELECT SUM(bobot_sub) as totalBobot from subkriteria where nama_kriteria='Besar Pinjaman' GROUP BY nama_kriteria");
		 $query5 = $this->db->query("SELECT SUM(bobot_sub) as totalBobot from subkriteria where nama_kriteria='Riwayat Nasabah' GROUP BY nama_kriteria");

		 $querySubkriteria = $this->db->query("SELECT * FROM subkriteria INNER JOIN kriteria ON subkriteria.nama_kriteria = kriteria.nama_kriteria ORDER BY subkriteria.nama_kriteria DESC");
		 
         $data=array(
         	"c1"=>$query->row(),
            "c2"=>$query2->row(),
            "c3"=>$query3->row(),
            "c4"=>$query4->row(),
            "c5"=>$query5->row(),
            "kriteria"=>$this->db->get('kriteria')->result(),
            "subkriteria"=>$querySubkriteria->result(),
        );

		$this->load->view('templates_kredit/header');
        $this->load->view('templates_kredit/sidebar');
        $this->load->view('bagiankredit/bobot',$data);
        $this->load->view('templates_kredit/footer');
	}


	public function add()
    {
        $this->form_validation->set_rules('validasi', 'validasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('bagiankredit/bobot');
        }else{

            $i=1;
            while (isset($_POST['id_sub'.$i])) {

            $data=array(
                "bobot_global"=> $_POST['bobot_global'.$i]
            );

            $this->db->where('id_sub', $_POST['id_sub'.$i] );
            $this->db->update('subkriteria',$data);

                 $i++;
            }
            
            redirect('bagiankredit/bobot');
        }
    }


	
}

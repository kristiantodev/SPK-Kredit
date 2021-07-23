<?php 

class Kriteria extends CI_Controller{
	public function index()
	{
		$data['kriteria']	= $this->kriteria_model->tampil_data()->result();
			$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/kriteria',$data);
 		$this->load->view('templates_kredit/footer');
	}

	public function input()
	{
		$data	= array(
			'id_kriteria'		=> set_value('id_kriteria'),
			'nama_kriteria'		=> set_value('nama_kriteria'),
			'Type'				=> set_value('Type'),
			'bobot_kriteria'	=> set_value('bobot_kriteria')
			);

		$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/kriteria_form',$data);
 		$this->load->view('templates_kredit/footer');
	}

	public function input_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else {
			$data = array(
				'id_kriteria'  => $this->input->post('id_kriteria', TRUE),
				'nama_kriteria'	=> $this->input->post('nama_kriteria', TRUE),
                'Type' => $this->input->post('Type', TRUE),
                'bobot_kriteria' => $this->input->post('bobot_kriteria', TRUE),
			);

			$this->kriteria_model->input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Kriteria Berhasil Disimpan!</strong>
  </div>');
			redirect('bagiankredit/kriteria');
		}
	}


    public function _rules()
    {
         $this->form_validation->set_rules('id_kriteria','id_kriteria','required',['required' => 'Kode Kriteria Wajib Diisi']);
         $this->form_validation->set_rules('nama_kriteria','nama_kriteria','required',['required' => 'Kode Kriteria Wajib Diisi']);
    }

    public function update($id)
    {
        $where = array('id_kriteria' =>  $id);
        $data['kriteria'] = $this->kriteria_model->edit_data($where,'kriteria')->result();
        $this->load->view('templates_kredit/header');
        $this->load->view('templates_kredit/sidebar');
        $this->load->view('bagiankredit/kriteria_update',$data);
        $this->load->view('templates_kredit/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_kriteria');
        $id_kriteria    = $this->input->post('id_kriteria');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $Type           = $this->input->post('Type');
        $bobot_kriteria = $this->input->post('bobot_kriteria');

        $data = array(
            'id_kriteria'   => $id_kriteria,
            'nama_kriteria' => $nama_kriteria,
            'Type'          => $Type,
            'bobot_kriteria'=> $bobot_kriteria
        );

        $where = array(
            'id_kriteria' => $id
        );

        $this->kriteria_model->update_data($where,$data,'kriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Kriteria Berhasil Diupdate!</strong>
                </div>');
        redirect('bagiankredit/bobot');
    }

    public function delete($id)
    {
        $where = array('id_kriteria' => $id);
        $this->kriteria_model->hapus_data($where,'kriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Kriteria Berhasil Dihapus!</strong>
                </div>');
        redirect('bagiankredit/kriteria');
    }
}

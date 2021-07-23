<?php 

class Subkriteria extends CI_Controller{
	public function index()
	{
		

		$data['subkriteria']	= $this->subkriteria_model->tampil_data()->result();

		$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/subkriteria',$data);
 		$this->load->view('templates_kredit/footer');
	}

	public function input()
	{
		$data['kriteria'] = $this->subkriteria_model->tampil_data('kriteria')->result();
		$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/subkriteria_form',$data);
 		$this->load->view('templates_kredit/footer');

	}

	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->input();
		}else{
			$id_sub 		= $this->input->post('id_sub');
			$nama_kriteria 	= $this->input->post('nama_kriteria');
			$nama_sub 		= $this->input->post('nama_sub');
			$bobot_sub		 = $this->input->post('bobot_sub');

			$data = array(
				'id_sub'	=> $id_sub,
				'nama_kriteria'	=> $nama_kriteria,
				'nama_sub'	=> $nama_sub,
				'bobot_sub'	=> $bobot_sub,
			);

			$this->subkriteria_model->insert_data($data,'subkriteria');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Subkriteria Berhasil Disimpan!</strong>
  			</div>');
			redirect('bagiankredit/subkriteria');
		}
	}

	public function _rules()
    {
         $this->form_validation->set_rules('id_sub','id_sub','required',['required' => 'Kode Subriteria Wajib Diisi']);
         $this->form_validation->set_rules('nama_sub','nama_sub','required',['required' => 'Nama Subkriteria Wajib Diisi']);
    }

    public function update($id)
    {
    	$where = array('id_sub' => $id);

    	$data['subkriteria'] = $this->db->query("select * from subkriteria sub, kriteria krt where sub.nama_kriteria=krt.nama_kriteria and sub.id_sub='$id'")->result();
    	$data['kriteria'] = $this->subkriteria_model->tampil_data('kriteria')->result();

    	$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/subkriteria_update',$data);
 		$this->load->view('templates_kredit/footer');
    }

    public function update_aksi()
    {
    	$id             = $this->input->post('id_sub');
        $id_sub    		= $this->input->post('id_sub');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $nama_sub       = $this->input->post('nama_sub');
        $bobot_sub 		= $this->input->post('bobot_sub');

        $data = array(
            'id_sub'   		=> $id_sub,
            'nama_kriteria' => $nama_kriteria,
            'nama_sub'      => $nama_sub,
            'bobot_sub'		=> $bobot_sub
        );

        $where = array(
            'id_sub' => $id
        );

        $this->subkriteria_model->update_data($where,$data,'subkriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Subkriteria Berhasil Diupdate!</strong>
                </div>');
        redirect('bagiankredit/subkriteria');
    }


    public function delete($id)
    {
    	$where = array('id_sub' => $id);
        $this->subkriteria_model->hapus_data($where,'subkriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Subkriteria Berhasil Dihapus!</strong>
                </div>');
        redirect('bagiankredit/subkriteria');
    
    }
}
<?php 

class Nasabah extends CI_Controller{
	public function index()
	{
		$data['alternatif']	= $this->nasabah_model->tampil_data()->result();
		$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/nasabah',$data);
 		$this->load->view('templates_kredit/footer');
	}

	public function input()
	{
		$data	= array(
			'nama_nasabah'		=> set_value('nama_nasabah'),
			'nik'				=> set_value('nik'),
			'ttl'	            => set_value('ttl'),
            'alamat'            => set_value('alamat'),
            'no_tlp'               => set_value('no_tlp')

			);

		$this->load->view('templates_kredit/header');
 		$this->load->view('templates_kredit/sidebar');
 		$this->load->view('bagiankredit/nasabah_form',$data);
 		$this->load->view('templates_kredit/footer');
	}

	public function input_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->input();
		}else {
			$data = array(
				'nama_nasabah'	=> $this->input->post('nama_nasabah', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'ttl' => $this->input->post('ttl', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'no_tlp' => $this->input->post('no_tlp', TRUE),
			);

			$this->nasabah_model->input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Nasabah Berhasil Disimpan!</strong>
  </div>');
			redirect('bagiankredit/nasabah');
		}
	}


    public function _rules()
    {
         $this->form_validation->set_rules('nama_nasabah','nama_nasabah','required',['required' => 'Nama Wajib Diisi']);
         $this->form_validation->set_rules('nik','nik','required',['required' => 'NIK Wajib Diisi']);
          $this->form_validation->set_rules('ttl','ttl','required',['required' => 'Tempat TAnggal Lahir Wajib Diisi']);
           $this->form_validation->set_rules('alamat','alamat','required',['required' => 'Alamat Wajib Diisi']);
            $this->form_validation->set_rules('no_tlp','no_tlp','required',['required' => 'Nomor Telepon Wajib Diisi']);
    }

   public function update($id)
    {
        $where = array('id_alternatif' =>  $id);
        $data['alternatif'] = $this->nasabah_model->edit_data($where,'alternatif')->result();
        $this->load->view('templates_kredit/header');
        $this->load->view('templates_kredit/sidebar');
        $this->load->view('bagiankredit/alternatif_update',$data);
        $this->load->view('templates_kredit/footer');
    }

    public function update_aksi()
    {
        $id             = $this->input->post('id_alternatif');
        $nama_nasabah   = $this->input->post('nama_nasabah');
        $nik            = $this->input->post('nik');
        $ttl            = $this->input->post('ttl');
        $alamat         = $this->input->post('alamat');
        $no_tlp         = $this->input->post('no_tlp');


        $data = array(
            'nama_nasabah'   => $nama_nasabah,
            'nik'             => $nik,
            'ttl'             => $ttl,
            'alamat'          => $alamat,
            'no_tlp'          => $no_tlp
        );

        $where = array(
            'id_alternatif' => $id
        );

        $this->nasabah_model->update_data($where,$data,'alternatif');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Nasabah Berhasil Diupdate!</strong>
                </div>');
        redirect('bagiankredit/nasabah');
    }

    public function delete($id)
    {
        $where = array('id_alternatif' => $id);
        $this->nasabah_model->hapus_data($where,'alternatif');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data Nasabah Berhasil Dihapus!</strong>
                </div>');
        redirect('bagiankredit/nasabah');
    }
}

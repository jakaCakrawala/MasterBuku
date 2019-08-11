<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_buku_c extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_m');
        $this->load->model('Penulis_m');
        $this->load->model('Ketegori_m');
		$this->API="http://localhost/buku/buku/";
	}

	public function index()
	{
		$this->data['buku'] = json_decode($this->curl->simple_get($this->API.'/buku'));
		$this->load->view('buku/view_buku', $this->data);

	}

	// Buku

	public function cari_buku()
	{
		$this->load->view('buku/view_cari_buku');
	}

	public function act_cari_buku()
	{
		$this->data['buku'] = 0;
		$this->data['hasil'] = '';
		$filter = $this->input->post('filter');
		$cari    = $this->input->post('cari');
		if ($filter == 1) {
			$this->data['buku'] = json_decode($this->curl->simple_get($this->API.'/bukuJudulBuku',array('cari'=>$cari),array(CURLOPT_BUFFERSIZE => 10)));
			$this->data['hasil'] = "Hasil Pencarian Judul Buku = ".$cari;

		} elseif ($filter == 2) {
			$this->data['buku'] = json_decode($this->curl->simple_get($this->API.'/buku_penulis',array('cari'=>$cari),array(CURLOPT_BUFFERSIZE => 10)));
			$this->data['hasil'] = "Hasil Pencarian Nama Penulis Buku = ".$cari;

		}elseif ($filter == 3) {
			$this->data['buku'] = json_decode($this->curl->simple_get($this->API.'/buku_Kategori',array('cari'=>$cari),array(CURLOPT_BUFFERSIZE => 10)));
			$this->data['hasil'] = "Hasil Pencarian Kategori Buku = ".$cari;
		}
		$this->load->view('buku/view_cari_buku_hasil', $this->data);
	}

	public function view_addBuku()
	{
		$this->data['penulis'] 	= $this->Penulis_m->get();
		$this->data['ketegori'] = $this->Ketegori_m->get();
		$this->load->view('buku/view_tambah_buku', $this->data);
	}

	public function view_editBuku($id)
	{
		$this->data['buku'] = json_decode($this->curl->simple_get($this->API.'/bukuByid/'.$id));
		$this->data['penulis'] 	= $this->Penulis_m->get();
		$this->data['ketegori'] = $this->Ketegori_m->get();
		$this->load->view('buku/view_ubah_buku', $this->data);
	}

	// insert data kontak
    public function create_buku(){
    
            $data = array(
            
                'judul_buku'    	=>  $this->input->post('judul_buku'),
                'cetakan'       	=>  $this->input->post('cetakan'),
                'penerbit'			=>  $this->input->post('penerbit'),
                'id_penulis'		=>  $this->input->post('id_penulis'),
                'id_kategori'		=>  $this->input->post('id_kategori'),
            );

            $insert =  $this->curl->simple_post($this->API.'/bukuPost', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }

            redirect('master_buku_c');   
    
    }

    // insert data kontak
    public function update_buku(){
    
            $data = array(

            	'id_buku'    		=>  $this->input->post('id_buku'),
                'judul_buku'    	=>  $this->input->post('judul_buku'),
                'cetakan'       	=>  $this->input->post('cetakan'),
                'penerbit'			=>  $this->input->post('penerbit'),
                'id_penulis'		=>  $this->input->post('id_penulis'),
                'id_kategori'		=>  $this->input->post('id_kategori'),
            );

            $insert =  $this->curl->simple_put($this->API.'/bukuEdit', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }

            redirect('master_buku_c');   
    
    }

     // delete data kontak
    function delete_buku($id){

        if(empty($id)){
            redirect('master_buku_c');
        }else{
        
            $delete =  $this->curl->simple_delete($this->API.'/bukuHapus', array('id_buku'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
        
            if($delete)
            {
        
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
        
            }else
        
            {
        
               $this->session->set_flashdata('hasil','Delete Data Gagal');
        
            }
        
            redirect('master_buku_c');
        
        }
    
    }

    // End Buku

    // start penulis

    public function penulis()
    {
    	$this->data['penulis'] = $this->Penulis_m->get();
		$this->load->view('penulis/view_penulis', $this->data);
    }

    public function tambahPenulis()
    {
    	$this->data['penulis'] = $this->Penulis_m->get();
		$this->load->view('penulis/tambah_penulis', $this->data);
    }

    public function UbahPenulis($id)
    {
    	$this->data['penulis'] = $this->Penulis_m->get_by(array('id_penulis' => $id));
		$this->load->view('penulis/ubah_penulis', $this->data);
    }

    public function act_tambahPenulis()
    {

		$data = $this->Penulis_m->array_from_post(
			array(
				'nama_penulis',
				'alamat_penulis',
				'kontak_penulis'
				));

		$simpan = $this->Penulis_m->save($data,null);

		if ($simpan == 1) {
        
            $this->session->set_flashdata('tambah_s', 'tambah');    
            redirect('master_buku_c/penulis');
        
        }elseif($simpan == -1) {
            
            $this->session->set_flashdata('error_id_null_s', 'error');    
            redirect('master_buku_c/penulis');
       
        }else{

            $this->session->set_flashdata('peringatan_s', 'peringatan');
          	redirect('master_buku_c/penulis');
        
        }

    }

    public function act_ubahPenulis($id)
    {

		$data = $this->Penulis_m->array_from_post(
			array(
				'nama_penulis',
				'alamat_penulis',
				'kontak_penulis'
				));

		$simpan = $this->Penulis_m->save($data,$id);

		if ($simpan == 1) {
        
            $this->session->set_flashdata('ubah_s', 'ubah');    
            redirect('master_buku_c/penulis');
        
        }elseif($simpan == -1) {
            
            $this->session->set_flashdata('error_id_null_s', 'error');    
            redirect('master_buku_c/penulis');
       
        }else{

            $this->session->set_flashdata('peringatan_s', 'peringatan');
          	redirect('master_buku_c/penulis');
        
        }

    }


    public function hapusPenulis($value)
    {
    	$del = $this->Penulis_m->delete($value);
		
		if ($del == false) {
			
			$this->session->set_flashdata('error_id_null_s', 'error_id_null');    
            redirect('master_buku_c/penulis');
		
		}elseif ($del['code'] == 1451){
			
			$this->session->set_flashdata('error_id_use_s', 'error_id_use');    
            redirect('master_buku_c/penulis');
			
		}else{

			$this->session->set_flashdata('berhasil_s', 'berhasil');    
			redirect('master_buku_c/penulis');

		}

    }

    //end Penulis

    // start kategori
    public function kategori()
    {
    	$this->data['kategori'] = $this->Ketegori_m->get();
		$this->load->view('kategori/view_kategori', $this->data);
    }

    public function tambahKategori()
    {
    	$this->data['kategori'] = $this->Ketegori_m->get();
		$this->load->view('kategori/tambah_kategori', $this->data);
    }

    public function UbahKategori($id)
    {
    	$this->data['kategori'] = $this->Ketegori_m->get_by(array('id_ketegori' => $id));
		$this->load->view('kategori/ubah_kategori', $this->data);
    }

    public function act_tambahKategori()
    {

		$data = $this->Ketegori_m->array_from_post(
			array(
				'nama_kategori',
				));

		$simpan = $this->Ketegori_m->save($data,null);

		if ($simpan == 1) {
        
            $this->session->set_flashdata('tambah_s', 'tambah');    
            redirect('master_buku_c/kategori');
        
        }elseif($simpan == -1) {
            
            $this->session->set_flashdata('error_id_null_s', 'error');    
            redirect('master_buku_c/kategori');
       
        }else{

            $this->session->set_flashdata('peringatan_s', 'peringatan');
          	redirect('master_buku_c/kategori');
        
        }

    }

    public function act_ubahKategori($id)
    {

		$data = $this->Ketegori_m->array_from_post(
			array(
				'nama_kategori',
				));

		$simpan = $this->Ketegori_m->save($data,$id);

		if ($simpan == 1) {
        
            $this->session->set_flashdata('ubah_s', 'ubah');    
            redirect('master_buku_c/kategori');
        
        }elseif($simpan == -1) {
            
            $this->session->set_flashdata('error_id_null_s', 'error');    
            redirect('master_buku_c/kategori');
       
        }else{

            $this->session->set_flashdata('peringatan_s', 'peringatan');
          	redirect('master_buku_c/kategori');
        
        }

    }

    public function hapusKategori($value)
    {
    	$del = $this->Ketegori_m->delete($value);
		
		if ($del == false) {
			
			$this->session->set_flashdata('error_id_null_s', 'error_id_null');    
            redirect('master_buku_c/kategori');
		
		}elseif ($del['code'] == 1451){
			
			$this->session->set_flashdata('error_id_use_s', 'error_id_use');    
            redirect('master_buku_c/kategori');
			
		}else{

			$this->session->set_flashdata('berhasil_s', 'berhasil');    
			redirect('master_buku_c/kategori');

		}

    }





}

/* End of file master_buku_c.php */
/* Location: ./application/controllers/master_buku_c.php */
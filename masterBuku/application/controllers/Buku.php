<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;


class Buku extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('buku_m');
        $this->load->model('Penulis_m');
        $this->load->model('Ketegori_m');
    }

    function buku_get()
    {
    
       $user = $this->buku_m->get();
       $this->response(
        array( "result" => $user, 200)
       );

       if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

    function bukuJudulBuku_get()
    {
       $cari = $this->get('cari');
       $query =  'SELECT id_buku,judul_buku, cetakan, penerbit , nama_penulis ,nama_kategori   
                    FROM buku
                    JOIN penulis  ON buku.id_penulis = penulis.id_penulis
                    JOIN ketegori ON buku.id_kategori  = ketegori.id_ketegori
                    WHERE buku.judul_buku  LIKE '.'"'.$cari.'%"';
       $getBuku = $this->Penulis_m->get_by_query($query);
      
       $this->response(
        array( "result" => $getBuku, 200)
       );

       if (!empty($getBuku))
        {
            $this->set_response($getBuku, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

    function buku_penulis_get()
    {
       $cari = $this->get('cari');
       $query =  'SELECT id_buku,judul_buku, cetakan, penerbit , nama_penulis ,nama_kategori   
                    FROM buku
                    JOIN penulis  ON buku.id_penulis = penulis.id_penulis
                    JOIN ketegori ON buku.id_kategori  = ketegori.id_ketegori
                    WHERE penulis.nama_penulis LIKE '.'"'.$cari.'%"';
       $getBuku = $this->Penulis_m->get_by_query($query);
      
       $this->response(
        array( "result" => $getBuku, 200)
       );

       if (!empty($getBuku))
        {
            $this->set_response($getBuku, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

    function buku_Kategori_get()
    {
       $cari = $this->get('cari');
       $query =  'SELECT id_buku,judul_buku, cetakan, penerbit , nama_penulis ,nama_kategori   
                    FROM buku
                    JOIN penulis  ON buku.id_penulis = penulis.id_penulis
                    JOIN ketegori ON buku.id_kategori  = ketegori.id_ketegori
                    WHERE ketegori.nama_kategori LIKE '.'"'.$cari .'%"';
       $getBuku = $this->Penulis_m->get_by_query($query);
      
       $this->response(
        array( "result" => $getBuku, 200)
       );

       if (!empty($getBuku))
        {
            $this->set_response($getBuku, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

    function bukuPost_post() {

        $data = array(

           'judul_buku'     => $this->post('judul_buku'),
           'cetakan'        => $this->post('cetakan'),
           'penerbit'       => $this->post('penerbit'),
           'id_penulis'     => $this->post('id_penulis'),
           'id_kategori'    => $this->post('id_kategori')

        );

        $insert = $this->buku_m->save($data,null);
        
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

    }


    function bukuByid_get($id)
    {
    
       $user = $this->buku_m->get_by(array('id_buku' => $id));
       $this->response(
        array( "result" => $user, 200)
       );

        if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                    'status' => FALSE,
                    'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    
    }

     //Memperbarui data kontak yang telah ada
    function bukuEdit_put() {
        $id = $this->put('id_buku');
        $data = array(
           'id_buku'        => $this->put('id_buku'), 
           'judul_buku'     => $this->put('judul_buku'),
           'cetakan'        => $this->put('cetakan'),
           'penerbit'       => $this->put('penerbit'),
           'id_penulis'     => $this->put('id_penulis'),
           'id_kategori'    => $this->put('id_kategori')

        );        

        $insert = $this->buku_m->save($data,$id);
        
        if ($insert) {
        
            $this->response($data, 200);
        
        } else {
        
            $this->response(array('status' => 'fail', 502));
        
        }

    }

    //Menghapus salah satu data kontak
    function bukuHapus_delete() {
    
        $id = $this->delete('id_buku');
 
        $delete = $this->buku_m->delete($id);
    
        if ($delete) {
    
            $this->response(array('status' => 'success'), 201);
    
        } else {
            $this->response(array('status' => 'fail', 502));
    
        }
    
    }



}

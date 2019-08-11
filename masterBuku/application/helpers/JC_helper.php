<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function getKetegori($id = NULL)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Ketegori_m');
    // Call a function of the model
    return $CI->Ketegori_m->get_by(array('id_ketegori' => $id),true);

}

function getPenulis($id = NULL)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Penulis_m');
    // Call a function of the model
    return $CI->Penulis_m->get_by(array('id_penulis' => $id),true);

}

function getBuku($id = NULL)
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Buku_m');
    // Call a function of the model
    return $CI->Buku_m->get_by(array('id_buku' => $id),true);

}


/* End of file ELTRAN_helper.php */
/* Location: ./application/helpers/ELTRAN_helper.php */
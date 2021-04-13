<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Detail extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_detailpengiriman');
        if ($id == '') {
            $detail = $this->db->get('detail_pengiriman')->result();
        } else {
            $this->db->where('id_detailpengiriman', $id);
            $detail = $this->db->get('detail_pengiriman')->result();
        }
        $this->response($detail, 200);
    }
    function index_post()
    {
        $data = array(
            'id_pengiriman'           => $this->post('id_pengiriman'),
            'nama_pengirim'              => $this->post('nama_pengirim'),
            'nomorhp'                    => $this->post('nomorhp'),
            'tujuan'                     => $this->post('tujuan'),
            'jumlah'                     => $this->post('jumlah'),
            'jenis_kendaraan'            => $this->post('jenis_kendaraan'),
            'nomor_kendaraan'            => $this->post('nomor_kendaraan'),
            'tanggal'                    => $this->post('tanggal'),
            'tanggal_diterima'           => $this->post('tanggal_diterima'),
            'status_pengiriman'           => $this->post('status_pengiriman'),
            
        );
        $insert = $this->db->insert('detail_pengiriman',$data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_detailpengiriman');
        $data = array(
            


            'nama_pengirim'              => $this->put('nama_pengirim'),
            'nomorhp'                    => $this->put('nomorhp'),
            'tujuan'                     => $this->put('tujuan'),
            'jumlah'                     => $this->put('jumlah'),
            'jenis_kendaraan'            => $this->put('jenis_kendaraan'),
            'nomor_kendaraan'            => $this->put('nomor_kendaraan'),
            'tanggal'                    => $this->put('tanggal'),
            'tanggal_diterima'       => $this->put('tanggal_diterima'),
            'status_pengiriman'           => $this->put('status_pengiriman'),
        );
        $this->db->where('id_detailpengiriman', $id);
        $update = $this->db->update('detail_pengiriman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_detailpengiriman');
        $this->db->where('id_detailpengiriman', $id);
        $delete = $this->db->delete('detail_pengiriman');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

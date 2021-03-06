<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi_model extends CI_Model
{
    public function insertReservasi($data)
    {
        return $this->db->insert('tb_reservasi', $data);
    }

    public function getReservasi($tipe, $param = NULL, $limit = NULL)
    {
        // $this->db->order_by('id_reservasi', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            $this->db->select('tb_user.*, tb_jasa.*, tb_reservasi.*, tb_paguyuban.nama_paguyuban, tb_paguyuban.deskripsi_paguyuban, tb_paguyuban.alamat_paguyuban, tb_paguyuban.telepon_paguyuban, tb_paguyuban.foto_paguyuban, tb_paguyuban.lat_paguyuban, tb_paguyuban.lng_paguyuban, tb_paguyuban.paguyuban_created, tb_paguyuban.paguyuban_updated, tb_paguyuban.no_rekening, tb_paguyuban.pemilik_rekening');
            $this->db->join('tb_user', 'tb_reservasi.id_user = tb_user.id_user');
            $this->db->join('tb_paguyuban', 'tb_reservasi.id_paguyuban = tb_paguyuban.id_paguyuban');
            $this->db->join('tb_jasa', 'tb_reservasi.id_jasa = tb_jasa.id_jasa');
            return $this->db->get('tb_reservasi')->result_array();
        }

        if ($tipe == 'all_paguyuban') {
            $this->db->select('tb_user.*, tb_jasa.*, tb_reservasi.*, tb_paguyuban.nama_paguyuban, tb_paguyuban.deskripsi_paguyuban, tb_paguyuban.alamat_paguyuban, tb_paguyuban.telepon_paguyuban, tb_paguyuban.foto_paguyuban, tb_paguyuban.lat_paguyuban, tb_paguyuban.lng_paguyuban, tb_paguyuban.paguyuban_created, tb_paguyuban.paguyuban_updated, tb_paguyuban.no_rekening, tb_paguyuban.pemilik_rekening');
            $this->db->order_by('tb_reservasi.status_reservasi', 'ASC');
            $this->db->where('tb_paguyuban.id_paguyuban', $param);
            $this->db->join('tb_user', 'tb_reservasi.id_user = tb_user.id_user');
            $this->db->join('tb_paguyuban', 'tb_reservasi.id_paguyuban = tb_paguyuban.id_paguyuban');
            $this->db->join('tb_jasa', 'tb_reservasi.id_jasa = tb_jasa.id_jasa');
            return $this->db->get('tb_reservasi')->result_array();
        }

        if ($tipe == 'id_reservasi') {
            $this->db->select('tb_user.*, tb_jasa.*, tb_reservasi.*, tb_paguyuban.nama_paguyuban, tb_paguyuban.deskripsi_paguyuban, tb_paguyuban.alamat_paguyuban, tb_paguyuban.telepon_paguyuban, tb_paguyuban.foto_paguyuban, tb_paguyuban.lat_paguyuban, tb_paguyuban.lng_paguyuban, tb_paguyuban.paguyuban_created, tb_paguyuban.paguyuban_updated, tb_paguyuban.no_rekening, tb_paguyuban.pemilik_rekening');
            $this->db->join('tb_user', 'tb_reservasi.id_user = tb_user.id_user');
            $this->db->join('tb_paguyuban', 'tb_reservasi.id_paguyuban = tb_paguyuban.id_paguyuban');
            $this->db->join('tb_jasa', 'tb_reservasi.id_jasa = tb_jasa.id_jasa');
            return $this->db->get_where('tb_reservasi', ['id_reservasi' => $param])->row_array();
        }

        if ($tipe == 'id_user') {
            $this->db->select('tb_user.*, tb_jasa.*, tb_reservasi.*, tb_paguyuban.nama_paguyuban, tb_paguyuban.deskripsi_paguyuban, tb_paguyuban.alamat_paguyuban, tb_paguyuban.telepon_paguyuban, tb_paguyuban.foto_paguyuban, tb_paguyuban.lat_paguyuban, tb_paguyuban.lng_paguyuban, tb_paguyuban.paguyuban_created, tb_paguyuban.paguyuban_updated, tb_paguyuban.no_rekening, tb_paguyuban.pemilik_rekening');
            $this->db->order_by('tb_reservasi.reservasi_created', 'DESC');
            $this->db->join('tb_user', 'tb_reservasi.id_user = tb_user.id_user');
            $this->db->join('tb_paguyuban', 'tb_reservasi.id_paguyuban = tb_paguyuban.id_paguyuban');
            $this->db->join('tb_jasa', 'tb_reservasi.id_jasa = tb_jasa.id_jasa');
            return $this->db->get_where('tb_reservasi', ['tb_reservasi.id_user' => $param])->result_array();
        }
    }

    public function updateReservasi($tipe, $data, $param)
    {
        if ($tipe == 'id_reservasi') {
            return $this->db->update('tb_reservasi', $data, ['id_reservasi' => $param]);
        }
    }

    public function deleteReservasi($tipe, $param = 'id_reservasi')
    {
        if ($tipe == 'id_reservasi') {
            return $this->db->delete('tb_reservasi', ['id_reservasi' => $param]);
        }
    }

    public function countReservasi($tipe, $param = NULL)
    {
        if ($tipe == 'all') {
            return $this->db->count_all_results('tb_reservasi');
        }

        if ($tipe == 'all_paguyuban') {
            $this->db->where('id_paguyuban', $param);
            return $this->db->count_all_results('tb_reservasi');
        }

        if ($tipe == 'unconfirmed_paguyuban') {
            $this->db->where('id_paguyuban', $param);
            $this->db->where('status_reservasi', 0);
            return $this->db->count_all_results('tb_reservasi');
        }
    }
}
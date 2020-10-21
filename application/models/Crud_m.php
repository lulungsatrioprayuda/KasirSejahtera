<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_m extends CI_Model
{
    public function get_data_crud($id = null)
    {
        $this->db->from('crud');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($input)
    {
        $params = [
            'nama_crud' => $input['nama'],
            'nohp_crud' => $input['nohp']
        ];

        $this->db->where('id', $input['id']);
        $this->db->update('crud', $params);
    }

    public function add($input)
    {
        $params = [
            // sebelah kiri nama_crud sesuai dengan colom yang ada di database
            // sebelah kanan  $input['nama'] sesuai dengan nama inputan di suatu form

            'nama_crud' => $input['nama'],
            'nohp_crud' => $input['nohp']

        ];

        $this->db->insert('crud', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('crud');
    }
}

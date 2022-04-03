<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{
    public function changeUserProfile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile';
            // $config['max_width'] = '1024';
            // $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                // var_dump($old_image);
                // die;

                if ($old_image != 'default_male.svg' or $old_image != 'default_female.svg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        return $this->db->update('user');
    }

    public function updateUserPassword($pass)
    {
        $this->db->set('password', $pass);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');
        return;
    }
}

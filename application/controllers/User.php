<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userMod');
        if (($this->session->userdata('email') == NULL)) {
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->userMod->changeUserProfile($_POST);

            // $name = $this->input->post('name');
            // $email = $this->input->post('email');

            // //cek jika ada gambar yang akan diupload
            // $upload_image = $_FILES['image']['name'];
            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png|svg';
            //     $config['max_size']     = '2048';
            //     $config['upload_path'] = './assets/img/profile';
            //     // $config['max_width'] = '1024';
            //     // $config['max_height'] = '768';

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('image')) {
            //         $old_image = $data['user']['image'];
            //         // var_dump($old_image);
            //         // die;

            //         if ($old_image != 'default_male.svg' or $old_image != 'default_female.svg') {
            //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
            //         }

            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('image', $new_image);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            // }

            // $this->db->set('name', $name);
            // $this->db->where('email', $email);
            // $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Your Profile has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect(base_url('user'));
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword1 = $this->input->post('newPassword1');
            $newPassword2 = $this->input->post('newPassword2');

            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Wrong Current Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect(base_url('user/changepassword'));
            } else {
                if ($currentPassword == $newPassword1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                New Password cannot be the same as your Current Password!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                    redirect(base_url('user/changepassword'));
                } else {
                    //password sudah ok
                    $passHash = password_hash($newPassword1, PASSWORD_DEFAULT);

                    $this->userMod->updateUserPassword($passHash);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Your Password Has Changed
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                    redirect(base_url('user/changepassword'));
                }
            }
        }
    }
}

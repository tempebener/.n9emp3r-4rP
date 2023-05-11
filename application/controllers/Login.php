<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    // Validasi Input Login User
    private function _validLogin()
    {
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', 
        //     [
        //         'required' => 'Email Tidak Boleh Kosong!',
        //         'valid_email' => 'Email Tidak Valid!'
        //     ]
        // );
        $this->form_validation->set_rules('id', 'id', 'trim|required', 
            [
                'required' => 'Username Tidak Boleh Kosong!'
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required',
            [
                'required' => 'Password Tidak Boleh Kosong!'
            ]
        );
    }

    // Halaman Login Aplikasi
	public function index()
	{
		$data ['title'] 	= "ASI | Login";
		$this->load->view('v_login/index', $data);
	}

    // Cek User Login
	public function cekUser()
	{
		
        //Cek Validasi Input Login User
        $this->_validLogin();

        // $email      = $this->input->post('email');
        $idUsers  = $this->input->post('id');
        $password   = $this->input->post('password');

        //Jika Data Valid
        if ($this->form_validation->run()) {
            //Cek Email User yang terdapat didalam database
            // $user = $this->M_user->cekUserByEmail($email)->row_array();
            $user = $this->M_user->cekUserById($idUsers)->row_array();
            //Jika User Ada
            if ($user) {
                //Jika User sudah diaktivasi
                if ($user['access_app'] == 1) {
                    //Cek Password
                    $p = $this->encryption->decrypt($user['password']);
                    //Jika Password benar
                    if ($password == $p) {
                        $data = [
                            'id'        => $user['id'],
                            'name'      => $user['name'],
                            // 'email'     => $user['email'],
                            'level_id'   => $user['level_id']
                        ];
                        $this->session->set_userdata($data);
                        //Cek level_id apakah Admin atau Member
                        if ($user['level_id'] == 1) {
                            //Admin
                            $validasi = [
                                'success'   => true,
                                'link'   => base_url('dashboard')
                                ];
                            echo json_encode($validasi);
                        } else {
                            //Member
                            $validasi = [
                                'success'   => true,
                                'link'   => base_url('profil')
                                ];
                            echo json_encode($validasi);
                        }
                        
                     } 

                    //Password Salah
                    else {
                        $validasi = [
                            'error'   => true,
                            'password_error' => 'Password Salah!'
                        ];
                        echo json_encode($validasi);
                    }   
                }
                //User belum diaktivasi 
                else {
                    $validasi = [
                        'error'   => true,
                        // 'email_error' => 'Segera Aktifkan Akun Anda!'
                        'id_error' => 'Segera Aktifkan Akun Anda!'
                    ];
                    echo json_encode($validasi);
                }
            } 

            //User Tidak Ada
            else {
                $validasi = [
                    'error'   => true,
                    // 'email_error' => 'Username Tidak Terdaftar!'
                    'id_error' => 'Username Tidak Terdaftar!'
                ];
                echo json_encode($validasi);
            }
        } 

        //Data Tidak Valid
        else {
            $validasi = [
                'error'   => true,
                // 'email_error' => form_error('email'),
                'id_error' => form_error('idUsers'),
                'password_error' => form_error('password')
            ];
            echo json_encode($validasi);
        }

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
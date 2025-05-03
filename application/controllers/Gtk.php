<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gtk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'modelApp');
		is_server_gtk_active();
		is_logged_in_as_gtk();
	}

	public function index()
	{
		redirect(base_url('gtk/dashboard'));
	}

	public function dashboard()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionNama']   = $this->db->get_where('user_gtk', ['username' => $data['sessionUser']]);
		$data['sessionNama']   = $data['sessionNama']->row('namaLengkap');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();
		$data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['pageCollumn']   = "1-column";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('gtk/dashboard', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
	}

	public function profil()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionNama']   = $this->db->get_where('user_gtk', ['username' => $data['sessionUser']]);
		$data['sessionNama']   = $data['sessionNama']->row('namaLengkap');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();
		$data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['pageCollumn']   = "1-column";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('gtk/profil', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
	}

	public function akun()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = "0";
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();
		$data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['pageCollumn']   = "1-column";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('gtk/akun', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
	}

	public function editProfil()
	{
		$username       = $this->session->userdata('username');

		$fotoGTK        = $_FILES['fotoGTK']['name'];
		$namaLengkap    = htmlspecialchars($this->input->post('namaLengkap', true));
		$namaPanggil    = htmlspecialchars($this->input->post('namaPanggil', true));
		$gelarDepan     = htmlspecialchars($this->input->post('gelarDepan', true));
		$gelarBelakang  = htmlspecialchars($this->input->post('gelarBelakang', true));
		$jenisKelamin   = htmlspecialchars($this->input->post('jenisKelamin', true));
		$nik            = htmlspecialchars($this->input->post('nik', true));
		$nukg           = htmlspecialchars($this->input->post('nukg', true));
		$nuptk          = htmlspecialchars($this->input->post('nuptk', true));
		$nip            = htmlspecialchars($this->input->post('nip', true));

		if ($fotoGTK) {
			$file_name                = str_replace(' ', '_', $namaLengkap);
			$file_name                = str_replace('.', '_', $file_name);
			$config['file_name']      = $file_name;
			$extName                  = explode('.', $fotoGTK);
			$extName                  = strtolower(end($extName));
			$new_filename             = $file_name . '.' . $extName;

			$config['allowed_types']  = 'jpeg|jpg|png';
			$config['max_size']       = '1024';
			$config['upload_path']    = './assets/files/images/fotoGuru/';

			$old_foto  = $this->modelApp->getProfilGtk($username);
			$old_image = $old_foto['foto'];
			if ($old_image != null) {
				unlink(FCPATH . 'assets/files/images/fotoGuru/' . $new_filename);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('fotoGTK')) {
				$this->db->set('foto', $new_filename);
			} else {
				echo $this->upload->display_errors();
			}
		}

		if ($namaLengkap) {
			$this->db->set(
				[
					'namaLengkap'     => $namaLengkap,
					'namaPanggil'     => $namaPanggil,
					'gelarDepan'      => $gelarDepan,
					'gelarBelakang'   => $gelarBelakang,
					'jk'              => $jenisKelamin,
					'nik'             => $nik,
					'nukg'            => $nukg,
					'nuptk'           => $nuptk,
					'nip'             => $nip,
					'date_updated'    => time(),
				]
			);
		}

		$this->db->where('username', $username);
		$this->db->update('profil_gtk');

		if ($gelarDepan) {
			$gelarDepan = $gelarDepan . ' ';
		} else {
			$gelarDepan = "";
		}

		if ($gelarBelakang) {
			$gelarBelakang = ', ' . $gelarBelakang;
		} else {
			$gelarBelakang = "";
		}

		$namaGelar = $gelarDepan . $namaLengkap . $gelarBelakang;

		if ($namaGelar) {
			$this->db->set(
				[
					'namaLengkap'     => $namaGelar,
					'date_updated'    => time(),
				]
			);
		}

		$this->db->where('username', $username);
		$this->db->update('user_gtk');


		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil anda telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('gtk/profil'));
	}

	public function editAkun()
	{
		$username      = $this->session->userdata('username');
		$password      = htmlspecialchars($this->input->post('password', true));
		$password2     = htmlspecialchars($this->input->post('password2', true));
		$hashPass      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		if (password_verify('#MerdekaBelajar!', $hashPass)) {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Akun anda tidak diperbarui !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		} else {
			if ($password == $password2) {
				$this->session->set_userdata('is_change', "0");
				$this->db->set('password', $hashPass);
				$this->db->where('username', $username);
				$this->db->update('user_gtk');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Akun anda berhasil diperbarui !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			} else {
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['error'](
              'Akun anda tidak diperbarui !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			}
		}
		redirect(base_url('gtk/akun'));
	}
}

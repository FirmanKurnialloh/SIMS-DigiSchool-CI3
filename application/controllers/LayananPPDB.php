<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LayananPPDB extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'modelApp');
		$this->load->model('PPDB_Model', 'ModelPPDB');
		$this->load->helper('ppdb_helper', 'ppdbHelper');
		is_server_gtk_active();
		is_logged_in_as_gtk();
	}

	// AUTH
	public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'required' => 'Username Tidak Boleh Kosong!',
			'trim' => 'Username Tidak Boleh Mengandung Spasi!',
			'is_unique' => 'Username Sudah Digunakan !'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'required' => 'Password Tidak Boleh Kosong!',
			'min_length' => 'Password Minimal 8 Karakter Huruf dan Angka!',
			'trim' => 'Password Tidak Boleh Mengandung Spasi !'
		]);

		if ($this->form_validation->run() == false) {
			$data['serverSetting'] = $this->modelApp->getServerSetting();
			$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'username'      => htmlspecialchars($this->input->post('username', true)),
				'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id'       =>  2,
				'is_active'     =>  1,
				'date_created'  => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('notif', '
      <div class="alert alert-primary" role="alert">
          <h4 class="alert-heading">Berhasil !</h4>
          <div class="alert-body">
            Akun anda telah terdaftar! silahkan login untuk melanjutkan pendaftaran.
          </div>
      </div>');
			redirect(base_url('auth/ppdb'));
		}
	}

	public function ppdb()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username Tidak Boleh Kosong!',
			'trim' => 'Username Tidak Boleh Mengandung Spasi!',
			'is_unique' => 'Username Sudah Digunakan!'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password Tidak Boleh Kosong!',
			'min_length' => 'Password Minimal 8 Karakter Huruf dan Angka!',
			'trim' => 'Password Tidak Boleh Mengandung Spasi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['serverSetting'] = $this->modelApp->getServerSetting();
			$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login-ppdb');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login_ppdb();
		}
	}

	private function _login_ppdb()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect(base_url('user'));
				} else {
					$this->session->set_flashdata('notif', '
          <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Gagal !</h4>
              <div class="alert-body">
                Password Salah !
              </div>
          </div>');
					redirect(base_url('auth/gtk'));
				}
			} else {
				$this->session->set_flashdata('notif', '
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Gagal !</h4>
            <div class="alert-body">
              Akun Tidak Aktif !
            </div>
        </div>');
				redirect(base_url('auth/gtk'));
			}
		} else {
			$this->session->set_flashdata('notif', '
      <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Gagal !</h4>
          <div class="alert-body">
            Akun Tidak terdaftar !
          </div>
      </div>');
			redirect(base_url('auth/gtk'));
		}
	}

	// PAGE DASHBOARD
	public function index()
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
		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

		$url_param = $this->uri->segment('3');
		$base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
		$tapel = base64_decode($base_64);

		$data['url_param']     = $tapel;
		$data['pageCollumn']   = "1-column";
		$data['page']          = "Layanan PPDB";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('gtk/ppdb/dashboard', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('gtk/ppdb/ajax', $data);
	}

	function indexLoad()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();
		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
		$page                  = $this->input->post("page");
		$this->load->view($page, $data);
	}

	public function switchAccess()
	{
		$data = [
			'id'         => htmlspecialchars($this->input->post('id', true)),
			'is_active'  => htmlspecialchars($this->input->post('is_active', true)),
		];
		$checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		$row           = $checkData->row_array();
		if ($checkData->num_rows() == "1") {
			if ($data['is_active'] == "0") {
				$query = "UPDATE `ppdb_tapel` SET `is_active` = '0'";
				$this->db->query($query);
				$this->db->set('is_active', '1');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Hak Akses PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			} else {
				$query = "UPDATE `ppdb_tapel` SET `is_active` = '0'";
				$this->db->query($query);
				$this->db->set('is_active', '0');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Hak Akses PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Non-Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			}
		} elseif ($checkData->num_rows() == "0") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'PPDB Tahun Pelajaran " .  $row['tapel'] . " Tidak Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/settings'));
	}

	public function switchRegistrasi1()
	{
		$data = [
			'id'              => htmlspecialchars($this->input->post('id', true)),
			'is_active_reg1'  => htmlspecialchars($this->input->post('is_active_reg1', true)),
		];
		$checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		$row           = $checkData->row_array();
		if ($checkData->num_rows() == "1") {
			if ($data['is_active_reg1'] == "0") {
				$query = "UPDATE `ppdb_tapel` SET `is_active_reg1` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_reg1', '1');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Registrasi PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			} else {
				$query = "UPDATE `ppdb_tapel` SET `is_active_reg1` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_reg1', '0');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Registrasi PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Non-Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			}
		} elseif ($checkData->num_rows() == "0") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'PPDB Tahun Pelajaran " .  $row['tapel'] . " Tidak Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/settings'));
	}

	public function switchRegistrasi2()
	{
		$data = [
			'id'              => htmlspecialchars($this->input->post('id', true)),
			'is_active_reg2'  => htmlspecialchars($this->input->post('is_active_reg2', true)),
		];
		$checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		$row           = $checkData->row_array();
		if ($checkData->num_rows() == "1") {
			if ($data['is_active_reg2'] == "0") {
				$query = "UPDATE `ppdb_tapel` SET `is_active_reg2` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_reg2', '1');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Daftar Ulang PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			} else {
				$query = "UPDATE `ppdb_tapel` SET `is_active_reg2` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_reg2', '0');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Daftar Ulang PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Non-Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			}
		} elseif ($checkData->num_rows() == "0") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'PPDB Tahun Pelajaran " .  $row['tapel'] . " Tidak Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/settings'));
	}

	public function switchResult()
	{
		$data = [
			'id'                => htmlspecialchars($this->input->post('id', true)),
			'is_active_result'  => htmlspecialchars($this->input->post('is_active_result', true)),
		];
		$checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		$row           = $checkData->row_array();
		if ($checkData->num_rows() == "1") {
			if ($data['is_active_result'] == "0") {
				$query = "UPDATE `ppdb_tapel` SET `is_active_result` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_result', '1');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Pengumuman PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			} else {
				$query = "UPDATE `ppdb_tapel` SET `is_active_result` = '0'";
				$this->db->query($query);
				$this->db->set('is_active_result', '0');
				$this->db->where('id', $data['id']);
				$this->db->update('ppdb_tapel');
				$this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Pengumuman PPDB Tahun Pelajaran " .  $row['tapel'] . " Di Non-Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
			}
		} elseif ($checkData->num_rows() == "0") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'PPDB Tahun Pelajaran " .  $row['tapel'] . " Tidak Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/settings'));
	}

	// PAGE SETTING
	public function settings()
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
		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
		$data['pageCollumn']   = "0-column";
		$data['page']          = "Modul PPDB";
		$data['url_param']     = getDecodeURLParam($this->uri->segment('3'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('settings/menu', $data);
		$this->load->view('gtk/ppdb/settings', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('gtk/ppdb/ajax', $data);
	}

	function settingsLoad()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();

		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

		$page                  = $this->input->post("page");
		$this->load->view($page, $data);
	}

	public function tambahTapel()
	{
		$data = [
			'tapel'              => htmlspecialchars($this->input->post('tapel', true)),
			'kepalaSekolah'      => htmlspecialchars($this->input->post('kepalaSekolah', true)),
			'is_active_reg1'     => htmlspecialchars($this->input->post('is_active_reg1', true)),
		];
		$checkData        = $this->db->get_where('ppdb_tapel', ['tapel' => $data['tapel']]);
		if ($checkData->num_rows() == "0") {
			$this->db->insert('ppdb_tapel', $data);
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Tahun Pelajaran " .  $data['tapel'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		} elseif ($checkData->num_rows() == "1") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Tahun Pelajaran " .  $data['tapel'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/settings'));
	}

	public function deleteTapel()
	{
		$data = [
			'id'         => htmlspecialchars($this->input->post('id', true)),
			'tapel'      => htmlspecialchars($this->input->post('tapel', true)),
		];
		$checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		if ($checkData->num_rows() == "1") {
			$this->db->delete('ppdb_tapel', ['id' => $data['id']]);
			$response['status']   = 'success';
			$response['judul']    = 'Berhasil !';
			$response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Telah Dihapus!';
		} elseif ($checkData->num_rows() == "0") {
			$response['status']   = 'error';
			$response['judul']    = 'Gagal !';
			$response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Tidak Ditemukan!';
		}
		echo json_encode($response);
	}

	// PAGE SETUP
	public function setUp()
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
		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
		$data['url_param']     = getDecodeURLParam($this->uri->segment('3'));

		is_ppdb_exist($data['url_param']);

		$data['pageCollumn']   = "1-column";
		$data['page']          = "PPDB " . $data['url_param'];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('gtk/ppdb/setup', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('gtk/ppdb/ajax', $data);
	}

	function setupLoad()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();

		if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
			is_ppdb_active();
		}
		$data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

		$page                  = $this->input->post("page");
		$url_param             = $this->input->post("tapel");
		$data['persuratan']    = $this->ModelPPDB->getPersuratan($url_param)->row_array();
		$kepalaSekolah         = $data['persuratan']['kepalaSekolah'];
		$data['kepalaSekolah'] = $this->ModelPPDB->getKepalaSekolah($kepalaSekolah)->row_array();
		$data['page']          = $url_param;

		$this->load->view($page, $data);
	}

	function editPersuratan()
	{
		$dataProfile = [
			'nip'                   => htmlspecialchars($this->input->post('nip', true)),
		];

		$ppdbPersuratan = [
			'id'                    => htmlspecialchars($this->input->post('id', true)),
			'kepalaSekolah'         => htmlspecialchars($this->input->post('kepalaSekolah', true)),
			'SKPanitia'             => htmlspecialchars($this->input->post('SKPanitia', true)),
			'tanggalSKPanitia'      => htmlspecialchars($this->input->post('tanggalSKPanitia', true)),
			'SKPenerimaan'          => htmlspecialchars($this->input->post('SKPenerimaan', true)),
			'tanggalSKPenerimaan'   => htmlspecialchars($this->input->post('tanggalSKPenerimaan', true)),
			'tanggalMasuk'          => htmlspecialchars($this->input->post('tanggalMasuk', true)),
			'ttd'                   => htmlspecialchars($this->input->post('ttd', true)),
		];

		$tapel                    = htmlspecialchars($this->input->post('tapel', true));
		$url_param                = getEncodeURLParam($tapel);

		$this->db->set($dataProfile);
		$this->db->where('username', $ppdbPersuratan['kepalaSekolah']);
		$this->db->update('profil_gtk');

		$this->db->set($ppdbPersuratan);
		$this->db->where('id', $ppdbPersuratan['id']);
		$this->db->update('ppdb_tapel');
		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Persuratan PPDB Tahun Pelajaran " . $tapel . " telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('LayananPPDB/SetUp/') . $url_param);
	}

	function tambahPanitia()
	{
		$data = [
			'tapel'      => htmlspecialchars($this->input->post('tapel', true)),
			'role_id'    => htmlspecialchars($this->input->post('jabatan', true)),
			'username'   => htmlspecialchars($this->input->post('panitia', true)),
		];
		$url_param        = getEncodeURLParam($data['tapel']);
		$checkData        = $this->db->get_where('ppdb_panitia', ['tapel' => $data['tapel'], 'username' => $data['username']]);
		if ($checkData->num_rows() == "0") {
			$this->db->insert('ppdb_panitia', $data);
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Panitia PPDB Tahun Pelajaran " .  $data['tapel'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		} elseif ($checkData->num_rows() >= "1") {
			$this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Panitia PPDB Tahun Pelajaran " .  $data['tapel'] . " Sudah Terdaftar !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
		}
		redirect(base_url('LayananPPDB/SetUp/' . $url_param));
	}

	public function deletePanitia()
	{
		$data = [
			'tapel'      => htmlspecialchars($this->input->post('tapel', true)),
			'username'   => htmlspecialchars($this->input->post('username', true)),
		];
		$checkData     = $this->db->get_where('ppdb_panitia', ['username' => $data['username']]);
		if ($checkData->num_rows() == "1") {
			$this->db->delete('ppdb_panitia', ['username' => $data['username']]);
			$response['status']   = 'success';
			$response['judul']    = 'Berhasil !';
			$response['pesan']    = 'Panitia ' . $data['username'] . ' Telah Dihapus!';
		} elseif ($checkData->num_rows() == "0") {
			$response['status']   = 'error';
			$response['judul']    = 'Gagal !';
			$response['pesan']    = 'Panitia ' . $data['username'] . ' Tidak Ditemukan!';
		}
		echo json_encode($response);
	}

	public function resetDataPanitia()
	{
		$tapel         = htmlspecialchars($this->input->post('tapel', true));
		$query         = "SELECT `username` FROM `ppdb_panitia` WHERE `tapel` = '$tapel'";
		$queryPanitia  = $this->db->query($query)->result_array();
		foreach ($queryPanitia as $rowUsername) {
			$this->db->delete('ppdb_panitia', ['username' => $rowUsername['username']]);
		}
		$response['status']   = 'success';
		$response['judul']    = 'Berhasil !';
		$response['pesan']    = 'Database Telah Direset!';
		echo json_encode($response);
	}

	public function editKontakSekolah()
	{
		$url_param  = htmlspecialchars($this->input->post('tapel', true));
		$url_param  = getEncodeURLParam($url_param);
		$web        = htmlspecialchars($this->input->post('web', true));
		$email      = htmlspecialchars($this->input->post('email', true));
		$tel        = htmlspecialchars($this->input->post('tel', true));
		$fax        = htmlspecialchars($this->input->post('fax', true));
		$facebook   = htmlspecialchars($this->input->post('facebook', true));
		$instagram  = htmlspecialchars($this->input->post('instagram', true));
		$youtube    = htmlspecialchars($this->input->post('youtube', true));
		$whatsapp   = htmlspecialchars($this->input->post('whatsapp', true));

		if ($email) {
			$this->db->set(
				[
					'web'       => $web,
					'email'     => $email,
					'telepon'   => $tel,
					'fax'       => $fax,
					'facebook'  => $facebook,
					'instagram' => $instagram,
					'youtube'   => $youtube,
					'whatsapp'  => $whatsapp
				]
			);
		}

		$this->db->update('profil_sekolah');
		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Kontak Sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('LayananPPDB/SetUp/' . $url_param));
	}
}

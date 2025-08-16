<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'modelApp');
		$this->load->model('Web_Model', 'modelWeb');
		is_admin();
	}
	
	
	public function switchAccess()
	{
		$data = [
			'id' => htmlspecialchars($this->input->post('id', true)),
			'is_active' => htmlspecialchars($this->input->post('is_active', true)),
		];
		$checkData = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
		$row = $checkData->row_array();
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
              'Hak Akses PPDB Tahun Pelajaran " . $row['tapel'] . " Di Aktifkan !',
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
              'Hak Akses PPDB Tahun Pelajaran " . $row['tapel'] . " Di Non-Aktifkan !',
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
            'PPDB Tahun Pelajaran " . $row['tapel'] . " Tidak Tersedia !',
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
	
	public function index()
	{
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();

		// Ambil nama kepala sekolah dari tabel user_gtk
		$data['kepalaSekolah'] = $this->db
			->where('role_id_1', 3)
			->or_where('role_id_2', 3)
			->get('user_gtk')
			->row();
			
		if ($this->db->get('setting_server')->row('web-sekolah') == '1') {
			$this->load->view('web/header', $data);
			$this->load->view('web/home', $data);
			$this->load->view('web/footer', $data);
		} else { 
			$data['sessionUser'] = $this->session->userdata('username');
			$data['sessionNama'] = $this->db->get_where('user_gtk', ['username' => $data['sessionUser']]);
			$data['sessionNama'] = $data['sessionNama']->row('namaLengkap');
			$data['sessionRole1'] = $this->session->userdata('role_id_1');
			$data['sessionRole2'] = $this->session->userdata('role_id_2');
			$data['is_change'] = $this->session->userdata('is_change');
			$data['serverSetting'] = $this->modelApp->getServerSetting();
			$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
			$data['tapelAktif'] = $this->modelApp->getTapelAktif();
			$data['profilGTK'] = $this->modelApp->getProfilGtk($data['sessionUser']);
			$data['userGTK'] = $this->modelApp->getUserGTK($data['sessionUser']);
			$data['page'] = "Profil Sekolah";
			$data['pageCollumn'] = "0-column";
			$this->load->view('templates/header', $data);
			$this->load->view('errors/custom/soon', $data);
			// $this->load->view('templates/footer', $data);
		}
	}
	public function tentang()
	{
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		$this->load->view('web/header', $data);
		$this->load->view('web/tentang', $data);
		$this->load->view('web/footer', $data);
	}
	public function sambutan()
	{
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		// $this->load->view('web/header', $data);
		$this->load->view('web/sambutan', $data);
		// $this->load->view('web/footer', $data);
	}

	// PAGE SETTING
	public function beranda()
	{
		$data['sessionUser'] = $this->session->userdata('username');
		$data['sessionNama'] = $this->db->get_where('user_gtk', ['username' => $data['sessionUser']]);
		$data['sessionNama'] = $data['sessionNama']->row('namaLengkap');
		$data['sessionRole1'] = $this->session->userdata('role_id_1');
		$data['sessionRole2'] = $this->session->userdata('role_id_2');
		$data['is_change'] = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		$data['tapelAktif'] = $this->modelApp->getTapelAktif();
		$data['profilGTK'] = $this->modelApp->getProfilGtk($data['sessionUser']);
		$data['userGTK'] = $this->modelApp->getUserGTK($data['sessionUser']);
		$data['page'] = "Modul Web Sekolah";
		$data['pageCollumn'] = "0-column";
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('settings/menu', $data);
		$this->load->view('gtk/web/settings', $data);
		$this->load->view('templates/modal', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('gtk/web/ajax', $data);

	}

	function berandaLoad()
	{
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		$page = $this->input->post("page");
		$this->load->view($page, $data);
	}

	public function editBerandaWebSekolah()
	{
		$fotoKS = $_FILES['fotoKS']['name'];
		$judulBesar = $this->input->post('judulBesar', true);
		$deskripsiSingkat = $this->input->post('deskripsiSingkat', true);
		$tagline = $this->input->post('tagline', true);
		$taglineDeskripsi = $this->input->post('taglineDeskripsi', true);

		if ($fotoKS) {
			$file_name = str_replace(' ', '_', "fotoKS");
			$file_name = str_replace('.', '_', $file_name);
			$config['file_name'] = $file_name;
			$extName = explode('.', $fotoKS);
			$extName = strtolower(end($extName));
			$new_filename = $file_name . '.' . $extName;

			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = '1024';
			$config['upload_path'] = './assets/files/images/fotoGuru/';

			$old_image = $this->modelApp->getWebSekolah();
			$old_image = $old_image['fotoKS'];
			if ($old_image != null) {
				unlink(FCPATH . 'assets/files/images/fotoGuru/' . $new_filename);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('fotoKS')) {
				$this->db->set('fotoKS', $new_filename);
			} else {
				echo $this->upload->display_errors();
			}
		}

		if ($judulBesar) {
			$this->db->set(
				[
					'judulBesar' => $judulBesar,
					'deskripsiSingkat' => $deskripsiSingkat,
					'tagline' => $tagline,
					'taglineDeskripsi' => $taglineDeskripsi,
				]
			);
		}

		$this->db->update('web_sekolah');
		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Website sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('web/beranda'));
	}

	public function editLokasiSekolah()
	{
		$logoPemerintah = $_FILES['logoPemerintah']['name'];
		$namaPemerintah = htmlspecialchars($this->input->post('namaPemerintah', true));
		$bentukPemerintah = htmlspecialchars($this->input->post('bentukPemerintah', true));
		$jl = htmlspecialchars($this->input->post('jl', true));
		$kp = htmlspecialchars($this->input->post('kp', true));
		$rt = htmlspecialchars($this->input->post('rt', true));
		$rw = htmlspecialchars($this->input->post('rw', true));
		$desa = htmlspecialchars($this->input->post('desa', true));
		$kecamatan = htmlspecialchars($this->input->post('kecamatan', true));
		$kabupaten = htmlspecialchars($this->input->post('kabupaten', true));
		$provinsi = htmlspecialchars($this->input->post('provinsi', true));
		$pos = htmlspecialchars($this->input->post('pos', true));
		$lat = htmlspecialchars($this->input->post('lat', true));
		$long = htmlspecialchars($this->input->post('long', true));

		if ($logoPemerintah) {
			$file_name = str_replace(' ', '_', $namaPemerintah);
			$file_name = str_replace('.', '_', $file_name);
			$config['file_name'] = $file_name;
			$extName = explode('.', $logoPemerintah);
			$extName = strtolower(end($extName));
			$new_filename = $file_name . '.' . $extName;

			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = '1024';
			$config['upload_path'] = './assets/files/images/logo/';

			$old_image = $this->modelApp->getProfilSekolah();
			$old_image = $old_image['logoPemerintah'];
			if ($old_image != null) {
				unlink(FCPATH . 'assets/files/images/logo/' . $new_filename);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('logoPemerintah')) {
				$this->db->set('logoPemerintah', $new_filename);
			} else {
				echo $this->upload->display_errors();
			}
		}

		if ($namaPemerintah) {
			$this->db->set(
				[
					'namaPemerintah' => $namaPemerintah,
					'bentukPemerintah' => $bentukPemerintah,
					'jl' => $jl,
					'kp' => $kp,
					'rt' => $rt,
					'rw' => $rw,
					'desa' => $desa,
					'kecamatan' => $kecamatan,
					'kabupaten' => $kabupaten,
					'provinsi' => $provinsi,
					'pos' => $pos,
					'lat' => $lat,
					'long' => $long,
				]
			);
		}

		$this->db->update('profil_sekolah');
		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('settings/sekolah'));
	}

	public function editKontakSekolah()
	{
		$web = htmlspecialchars($this->input->post('web', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$tel = htmlspecialchars($this->input->post('tel', true));
		$fax = htmlspecialchars($this->input->post('fax', true));
		$facebook = htmlspecialchars($this->input->post('facebook', true));
		$instagram = htmlspecialchars($this->input->post('instagram', true));
		$youtube = htmlspecialchars($this->input->post('youtube', true));
		$whatsapp = htmlspecialchars($this->input->post('whatsapp', true));

		if ($email) {
			$this->db->set(
				[
					'web' => $web,
					'email' => $email,
					'telepon' => $tel,
					'fax' => $fax,
					'facebook' => $facebook,
					'instagram' => $instagram,
					'youtube' => $youtube,
					'whatsapp' => $whatsapp
				]
			);
		}

		$this->db->update('profil_sekolah');
		$this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
		redirect(base_url('settings/sekolah'));
	}

}

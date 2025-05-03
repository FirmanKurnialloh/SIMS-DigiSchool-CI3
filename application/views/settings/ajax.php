<script>
	$(document).ready(function() {
		sekolahLoad();
		tapelLoad();
		mapelLoad();
		ekskulLoad();
		kelasLoad();
		gtkLoad();
		bioGTKLoad();
		pdLoad();
		dbLoad();

		function sekolahLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/sekolahLoad') ?>",
				type: "POST",
				data: {
					page: "settings/sekolahLoad"
				},
				success: function(data) {
					$("#sekolahPage").html(data);
				}
			});
		}

		function tapelLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/tapelLoad') ?>",
				type: "POST",
				data: {
					page: "settings/tapelLoad"
				},
				success: function(data) {
					$("#tapelPage").html(data);
				}
			});
		}

		function mapelLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/mapelLoad') ?>",
				type: "POST",
				data: {
					page: "settings/mapelLoad"
				},
				success: function(data) {
					$("#mapelPage").html(data);
				}
			});
		}

		function ekskulLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/ekskulLoad') ?>",
				type: "POST",
				data: {
					page: "settings/ekskulLoad"
				},
				success: function(data) {
					$("#ekskulPage").html(data);
				}
			});
		}

		function kelasLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/kelasLoad') ?>",
				type: "POST",
				data: {
					page: "settings/kelasLoad"
				},
				success: function(data) {
					$("#kelasPage").html(data);
				}
			});
		}

		function gtkLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/gtkLoad') ?>",
				type: "POST",
				data: {
					page: "settings/gtkLoad"
				},
				success: function(data) {
					$("#gtkPage").html(data);
				}
			});
		}

		function bioGTKLoad(username) {
			$.ajax({
				url: "<?= base_url('settings/bioGTKLoad') ?>",
				type: "POST",
				data: {
					page: "settings/bioGTKLoad", // view yang ingin dimuat
					username: username // username yang dikirim ke controller
				},
				success: function(data) {
					$("#bioGTKPage").html(data); // ganti isi elemen bioPage
				},
				error: function(xhr) {
					console.error("Gagal memuat biodata:", xhr.responseText);
					$("#bioGTKPage").html("<p>Terjadi kesalahan saat memuat biodata.</p>");
				}
			});
		}

		// Panggil langsung saat halaman siap
		$(document).ready(function() {
			bioGTKLoad("<?= $userGTK['username']; ?>"); // username dikirim dari parent view
		});

		function pdLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/pdLoad') ?>",
				type: "POST",
				data: {
					page: "settings/pdLoad"
				},
				success: function(data) {
					$("#pdPage").html(data);
				}
			});
		}

		function dbLoad() {
			$.ajax({
				cache: false,
				url: "<?= base_url('settings/dbLoad') ?>",
				type: "POST",
				data: {
					page: "errors/custom/soon"
				},
				success: function(data) {
					$("#dbPage").html(data);
				}
			});
		}


	});

	$("#serverGuruSwitch").click(function() {
		var formServerGuru = $('#formSwitchServerGuru').serialize();
		var statusServerGuru = document.getElementById("statusServerGuru").value;
		$.ajax({
			type: 'POST',
			url: "<?= base_url('settings/swtichServerGuru'); ?>",
			data: formServerGuru,
			cache: false,
			success: function(data) {
				if (statusServerGuru == 0) {
					setTimeout(function() {
						toastr['success'](
							'Guru dapat login kedalam aplikasi !',
							'Server Guru Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusServerGuru").value = "1"
					document.getElementById("serverGuruSwitchLabel").innerHTML = "Aktif";
				} else {
					setTimeout(function() {
						toastr['error'](
							'Guru tidak dapat login kedalam aplikasi !',
							'Server Guru Tidak Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusServerGuru").value = "0"
					document.getElementById("serverGuruSwitchLabel").innerHTML = "Tidak Aktif";
				}
			}
		});
	});


	$("#serverSiswaSwitch").click(function() {
		var formServerSiswa = $('#formSwitchServerGuru').serialize();
		var statusServerSiswa = document.getElementById("statusServerSiswa").value;
		$.ajax({
			type: 'POST',
			url: "<?= base_url('settings/swtichServerSiswa'); ?>",
			data: formServerSiswa,
			cache: false,
			success: function(data) {
				if (statusServerSiswa == 0) {
					setTimeout(function() {
						toastr['success'](
							'Siswa dapat login kedalam aplikasi !',
							'Server Siswa Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusServerSiswa").value = "1"
					document.getElementById("serverSiswaSwitchLabel").innerHTML = "Aktif";
				} else {
					setTimeout(function() {
						toastr['error'](
							'Siswa tidak dapat login kedalam aplikasi !',
							'Server Siswa Tidak Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusServerSiswa").value = "0"
					document.getElementById("serverSiswaSwitchLabel").innerHTML = "Tidak Aktif";
				}
			}
		});
	});

	$("#switchModulPPDB").click(function() {
		var formSwitchModulPPDB = $('#formSwitchModulPPDB').serialize();
		var statusModulPPDB = document.getElementById("statusModulPPDB").value;
		$.ajax({
			type: 'POST',
			url: "<?= base_url('layananPPDB/switchModulPPDB'); ?>",
			data: formSwitchModulPPDB,
			cache: false,
			success: function(data) {
				if (statusModulPPDB == 0) {
					setTimeout(function() {
						toastr['success'](
							'Semua User dapat mengakses modul !',
							'Modul PPDB Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusModulPPDB").value = "1"
					document.getElementById("LabelswitchModulPPDB").innerHTML = "Aktif";
				} else {
					setTimeout(function() {
						toastr['error'](
							'Semua User tidak dapat mengakses modul !',
							'Modul PPDB Tidak Aktif !', {
								closeButton: true,
								tapToDismiss: true
							}
						);
					}, 0);
					document.getElementById("statusModulPPDB").value = "0"
					document.getElementById("LabelswitchModulPPDB").innerHTML = "Tidak Aktif";
				}
			}
		});
	});

	// FUNGSI PENGATURAN TAPEL START
	$(document).on('click', '#hapusTapel', function(e) {
		var id = $(this).data('id');
		var tapel = $(this).data('tapel');
		var semester = $(this).data('semester');
		SwalDeleteTapel(id, tapel, semester);
		e.preventDefault();
	});

	function SwalDeleteTapel(id, tapel, semester) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Tahun Pelajaran ' + tapel + ' Semester ' + semester + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteTapel'); ?>',
							data: 'id=' + id + '&tapel=' + tapel + '&semester=' + semester,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Tahun Pelajaran ' + tapel + ' Semester ' + semester + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN TAPEL END
	// FUNGSI PENGATURAN MAPEL START
	$(document).on('click', '#hapusMapel', function(e) {
		var id = $(this).data('id');
		var mapel = $(this).data('mapel');
		var kelompok = $(this).data('kelompok');
		SwalDeleteMapel(id, mapel, kelompok);
		e.preventDefault();
	});

	function SwalDeleteMapel(id, mapel, kelompok) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Mata Pelajaran ' + mapel + ' Kelompok ' + kelompok + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteMapel'); ?>',
							data: 'id=' + id + '&namaMapel=' + mapel + '&kelompokMapel=' + kelompok,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Mata Pelajaran ' + mapel + ' Kelompok ' + kelompok + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN MAPEL END
	// FUNGSI PENGATURAN EKSKUL START
	$(document).on('click', '#hapusEkskul', function(e) {
		var id = $(this).data('id');
		var ekskul = $(this).data('ekskul');
		SwalDeleteEkskul(id, ekskul);
		e.preventDefault();
	});

	function SwalDeleteEkskul(id, ekskul) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Ekstrakurikuler ' + ekskul + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteEkskul'); ?>',
							data: 'id=' + id + '&namaEkskul=' + ekskul,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Ekstrakurikuler ' + ekskul + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN EKSKUL END
	// FUNGSI PENGATURAN KELAS START
	$(document).on('click', '#hapusKelas', function(e) {
		var id = $(this).data('id');
		var kelas = $(this).data('kelas');
		SwalDeleteKelas(id, kelas);
		e.preventDefault();
	});

	function SwalDeleteKelas(id, kelas) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Kelas ' + kelas + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteKelas'); ?>',
							data: 'id=' + id + '&kelas=' + kelas,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Kelas ' + kelas + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN KELAS END
	// FUNGSI PENGATURAN AKUN GTK START
	$(document).on('click', '#resetDataGTK', function(e) {
		SwalResetDataGTK();
		e.preventDefault();
	});

	function SwalResetDataGTK() {

		Swal.fire({
			title: 'Anda yakin ingin mereset DATABASE AKUN dan PROFIL GTK ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'warning',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, Reset Database!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/resetDataGTK'); ?>',
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistems!',
								text: 'Database Gagal Direset !',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}

	$(document).on('click', '#resetPassGTK', function(e) {
		var id = $(this).data('id');
		var username = $(this).data('username');
		SwalResetPassGTK(id, username);
		e.preventDefault();
	});

	function SwalResetPassGTK(id, username) {

		Swal.fire({
			title: 'Anda yakin ingin mereset password akun dengan username ' + username + ' ? ',
			text: "Password akan direset menjadi password default! #MerdekaBelajar!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, Reset Password!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/resetAkunGTK'); ?>',
							data: 'id=' + id + '&username=' + username,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Password akun dengan username ' + username + ' Gagal Direset !',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}

	$(document).on('click', '#hapusAkunGTK', function(e) {
		var username = $(this).data('username');
		SwalDeleteAkunGTK(username);
		e.preventDefault();
	});

	function SwalDeleteAkunGTK(username) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Akun Dengan Username ' + username + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteAkunGTK'); ?>',
							data: 'username=' + username,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Akun dengan username ' + username + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN AKUN GTK END
	// FUNGSI PENGATURAN AKUN PD START
	$(document).on('click', '#resetDataPD', function(e) {
		SwalResetDataPD();
		e.preventDefault();
	});

	function SwalResetDataPD() {

		Swal.fire({
			title: 'Anda yakin ingin mereset DATABASE AKUN dan PROFIL PESERTA DIDIK ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'warning',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, Reset Database!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/resetDataPD'); ?>',
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Database Gagal Direset !',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}

	$(document).on('click', '#hapusAkunPD', function(e) {
		var nisn = $(this).data('nisn');
		SwalDeleteAkunPD(nisn);
		e.preventDefault();
	});

	function SwalDeleteAkunPD(nisn) {

		Swal.fire({
			title: 'Anda Yakin Ingin Menghapus Akun Dengan NISN ' + nisn + ' ? ',
			text: "Anda tidak dapat mengembalikan data yang dihapus!",
			icon: 'question',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Ya, hapus data!',
			cancelButtonText: 'Batalkan!',
			customClass: {
				confirmButton: 'btn btn-primary btn-sm',
				cancelButton: 'btn btn-outline-danger btn-sm ms-1'
			},
			buttonsStyling: false,
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							type: 'POST',
							url: '<?= base_url('settings/deleteAkunPD'); ?>',
							data: 'nisn=' + nisn,
							dataType: 'json',
							cache: false,
						})
						.done(function(response) {
							Swal.fire({
									icon: response.status,
									title: response.judul,
									text: response.pesan,
									allowOutsideClick: false,
									customClass: {
										confirmButton: 'btn btn-success btn-sm'
									}
								})
								.then(function(result) {
									if (result.value) {
										location.reload()
									}
								})
						})
						.fail(function(response) {
							Swal.fire({
								icon: 'error',
								title: 'Terdapat Kesalahan Sistem!',
								text: 'Akun dengan NISN ' + nisn + ' Gagal Dihapus!',
								allowOutsideClick: false,
								customClass: {
									confirmButton: 'btn btn-danger btn-sm'
								}
							}).then(function(result) {
								if (result.value) {
									location.reload()
								}
							})
						});
				});
			},
		});

	}
	// FUNGSI PENGATURAN AKUN PD END
</script>
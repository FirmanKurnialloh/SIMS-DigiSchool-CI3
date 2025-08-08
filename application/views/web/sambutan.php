<!doctype html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>Sambutan Kepala Sekolah — [Nama Sekolah]</title>
	<style>
		:root {
			--bg: #f6f9fc;
			--card: #ffffff;
			--accent: #0b63d6;
			--muted: #65748b
		}

		body {
			font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
			line-height: 1.5;
			margin: 0;
			background: linear-gradient(180deg, var(--bg), #ffffff);
			color: #0f1724
		}

		.container {
			max-width: 980px;
			margin: 36px auto;
			padding: 24px
		}

		.card {
			background: var(--card);
			border-radius: 14px;
			box-shadow: 0 6px 24px rgba(15, 23, 36, .06);
			padding: 22px
		}

		.header {
			display: flex;
			gap: 16px;
			align-items: center
		}

		.logo {
			width: 84px;
			height: 84px;
			border-radius: 12px;
			background: linear-gradient(135deg, var(--accent), #2ca8ff);
			display: flex;
			align-items: center;
			justify-content: center;
			color: white;
			font-weight: 700;
			font-size: 18px
		}

		h1 {
			margin: 0;
			font-size: 20px
		}

		.meta {
			color: var(--muted);
			font-size: 13px
		}

		.sambutan-short {
			margin-top: 18px;
			font-size: 15px
		}

		.actions {
			margin-top: 18px;
			display: flex;
			gap: 10px;
			flex-wrap: wrap
		}

		.btn {
			border: 0;
			padding: 10px 14px;
			border-radius: 10px;
			font-weight: 600;
			cursor: pointer
		}

		.btn-primary {
			background: var(--accent);
			color: #fff
		}

		.btn-ghost {
			background: transparent;
			color: var(--accent);
			border: 1px solid rgba(11, 99, 214, .12)
		}

		.content-full {
			margin-top: 18px;
			padding-top: 12px;
			border-top: 1px dashed #eef2f7;
			display: none
		}

		.quote {
			font-style: italic;
			color: var(--muted);
			margin-top: 12px
		}

		footer {
			margin-top: 20px;
			color: var(--muted);
			font-size: 13px
		}

		/* Responsive */
		@media (max-width:640px) {
			.header {
				flex-direction: row
			}

			.logo {
				width: 64px;
				height: 64px
			}
		}

		/* simple fade */
		.fade-in {
			animation: fadeIn .28s ease both
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(6px)
			}

			to {
				opacity: 1;
				transform: none
			}
		}
	</style>
</head>

<body>
	<main class="container">
		<section class="card fade-in" aria-labelledby="judul-sambutan">
			<div class="header">
				<div class="logo" aria-hidden="true">LOGO</div>
				<div>
					<h1 id="judul-sambutan">Sambutan Kepala Sekolah</h1>
					<div class="meta">Website Resmi <strong id="nama-sekolah">[Nama Sekolah]</strong> • <span
							id="tahun">2025</span></div>
				</div>
			</div>

			<p class="sambutan-short" id="teks-singkat">
				Selamat datang di <strong id="nama-sekolah-2">[Nama Sekolah]</strong>. Website ini kami hadirkan sebagai media
				informasi dan komunikasi bagi siswa, orang tua, alumni, dan masyarakat luas. Kami berkomitmen memberikan
				pendidikan yang berkualitas, membentuk karakter mulia, serta menyiapkan generasi yang cerdas dan siap menghadapi
				tantangan masa depan.
			</p>

			<div class="actions">
				<button class="btn btn-primary" id="toggle-full">Baca Selengkapnya</button>
				<button class="btn btn-ghost" id="copy-html" title="Salin HTML">Salin HTML</button>
				<button class="btn" id="print" title="Cetak">Cetak</button>
			</div>

			<div class="content-full" id="full-content" aria-hidden="true">
				<p>
					<strong>Assalamu’alaikum warahmatullahi wabarakatuh</strong><br>
					Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya sehingga kita dapat terus
					melaksanakan kegiatan pendidikan dan pembelajaran dengan sebaik-baiknya. Selamat datang di Website Resmi
					<strong id="nama-sekolah-3">[Nama Sekolah]</strong>. Media ini kami sediakan untuk memberikan informasi
					program, kegiatan, prestasi, dan layanan pendidikan kepada siswa, orang tua, alumni, dan masyarakat luas.
				</p>

				<p>
					Kami berkomitmen mewujudkan pendidikan yang bermutu dan berkarakter. Lingkungan belajar di <strong>[Nama
						Sekolah]</strong> kami upayakan kondusif, kreatif, dan inspiratif agar setiap siswa dapat berkembang secara
					akademik dan karakter. Kami berharap seluruh civitas akademika dapat bekerjasama dengan orang tua dan
					masyarakat untuk mencapai visi dan misi sekolah.
				</p>

				<p class="quote">Semoga website ini memberi manfaat dan menjadi jembatan komunikasi yang baik antara sekolah dan
					semua pemangku kepentingan.</p>

				<p>
					Wassalamu’alaikum warahmatullahi wabarakatuh<br>
					<strong id="nama-kepsek">[Nama Kepala Sekolah]</strong><br>
					Kepala <span id="nama-sekolah-4">[Nama Sekolah]</span>
				</p>
			</div>

			<footer>
				<small>&copy; <span id="copy-year"></span> <span id="nama-sekolah-5">[Nama Sekolah]</span> — Semua hak
					dilindungi.</small>
			</footer>
		</section>
	</main>

	<script>
		// Auto-set year
		const yearEl = document.getElementById('copy-year');
		const tahunEl = document.getElementById('tahun');
		const now = new Date();
		yearEl.textContent = now.getFullYear();
		tahunEl.textContent = now.getFullYear();

		// Toggle full content
		const btn = document.getElementById('toggle-full');
		const full = document.getElementById('full-content');
		let open = false;
		btn.addEventListener('click', () => {
			open = !open;
			full.style.display = open ? 'block' : 'none';
			full.setAttribute('aria-hidden', String(!open));
			btn.textContent = open ? 'Tutup' : 'Baca Selengkapnya';
		});

		// Copy HTML button (copies the inner HTML of the card)
		document.getElementById('copy-html').addEventListener('click', async () => {
			const card = document.querySelector('.card').outerHTML;
			try {
				await navigator.clipboard.writeText(card);
				alert('HTML sambutan disalin ke clipboard.');
			} catch (e) {
				alert('Gagal menyalin. Anda dapat menyalin manual.');
			}
		});

		// Print
		document.getElementById('print').addEventListener('click', () => window.print());

		// Small accessibility: allow keyboard toggle
		btn.addEventListener('keyup', (e) => { if (e.key === 'Enter' || e.key === ' ') btn.click(); });
	</script>
</body>

</html>

<!-- Footer -->
<footer class="bg-gray-800 text-white">
	<div class="container mx-auto px-6 py-12">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
			<!-- Footer Column 1 -->
			<div>
				<div class="flex items-center space-x-4 mb-4">
					<img src="https://placehold.co/40x40/FFFFFF/374151?text=L" alt="Logo" class="h-10 w-10 rounded-full">
					<span class="text-xl font-bold">Pendidikan Digital</span>
				</div>
				<p class="text-gray-400">Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</p>
				<p class="text-gray-400 mt-2">Jalan Jenderal Sudirman, Senayan, Jakarta 10270</p>
			</div>
			<!-- Footer Column 2 -->
			<div>
				<h4 class="font-bold mb-4">Tautan</h4>
				<ul class="space-y-2">
					<li><a href="index.php" class="text-blue-400 hover:text-white">Beranda</a></li>
					<li><a href="tentang.php" class="text-gray-400 hover:text-white">Tentang</a></li>
					<li><a href="program.php" class="text-gray-400 over:text-white">Program</a></li>
					<li><a href="kontak.php" class="text-gray-400 hover:text-white">Kebijakan</a></li>
				</ul>
			</div>
			<!-- Footer Column 3 -->
			<div>
				<h4 class="font-bold mb-4">Sumber Daya</h4>
				<ul class="space-y-2">
					<li><a href="dokumen.php" class="text-gray-400 hover:text-white">Dokumen</a></li>
					<li><a href="berita.php" class="text-gray-400 hover:text-white">Berita</a></li>
					<li><a href="galeri.php" class="text-gray-400 hover:text-white">Galeri</a></li>
					<li><a href="faq.php" class="text-gray-400 hover:text-white">FAQ</a></li>
				</ul>
			</div>
			<!-- Footer Column 4 -->
			<div>
				<h4 class="font-bold mb-4">Ikuti Kami</h4>
				<div class="flex space-x-4">
					<a href="#" class="text-gray-400 hover:text-white">
						<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
							<path fill-rule="evenodd"
								d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
								clip-rule="evenodd" />
						</svg>
					</a>
					<a href="#" class="text-gray-400 hover:text-white">
						<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
							<path
								d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
						</svg>
					</a>
					<a href="#" class="text-gray-400 hover:text-white">
						<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
							<path fill-rule="evenodd"
								d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.525c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm6.406-11.845a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"
								clip-rule="evenodd" />
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="mt-8 border-t border-gray-700 pt-8 text-center text-gray-400">
			<p>Copyright &copy; <span id="copyright-year"><?= date("Y") ?></span> <?= $profilSekolah['namaSekolah'] ?> Hak
				Cipta Dilindungi. </p>
		</div>
	</div>
</footer>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		// Hilangkan loader saat halaman selesai dimuat
		const loader = document.getElementById('page-loader');
		setTimeout(() => {
			loader.style.opacity = '0';
			setTimeout(() => loader.style.display = 'none', 500);
		}, 300); // delay sedikit biar smooth
	});

	// Saat klik link internal, tampilkan loader lagi
	document.querySelectorAll('a').forEach(link => {
		link.addEventListener('click', function (e) {
			const href = this.getAttribute('href');

			// Cek apakah link adalah internal (bukan #, bukan javascript)
			if (href && !href.startsWith('#') && !href.startsWith('javascript:') && !this.target) {
				e.preventDefault(); // cegah pindah langsung
				const loader = document.getElementById('page-loader');
				loader.style.display = 'flex';
				loader.style.opacity = '1';

				// Setelah animasi loading sebentar, pindah halaman
				setTimeout(() => {
					window.location.href = href;
				}, 300); // 0.3 detik animasi masuk
			}
		});
	});
</script>

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
<script>
	// Load YouTube API
	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('profilVideo', {
			events: {
				'onStateChange': onPlayerStateChange
			}
		});
	}

	function onPlayerStateChange(event) {
		let overlay = document.getElementById('overlayText');

		// Saat video diputar, overlay hilang
		if (event.data === YT.PlayerState.PLAYING) {
			overlay.style.opacity = 0;
		}

		// Saat video selesai, overlay muncul lagi
		if (event.data === YT.PlayerState.ENDED) {
			overlay.style.opacity = 1;
		}

		// Jika video di-pause, overlay muncul
		if (event.data === YT.PlayerState.PAUSED) {
			overlay.style.opacity = 1;
		}
	}
</script>
</body>

</html>

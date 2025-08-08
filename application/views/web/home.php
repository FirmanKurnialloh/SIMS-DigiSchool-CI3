<!-- Main Content -->
<main>
	<!-- Hero Section -->
	<section class="py-10 mb-0 bg-white">
		<div class="container mx-auto px-6">
			<div class="flex flex-col md:flex-row items-center">
				<div class="md:w-1/2 mb-10 md:mb-0">
					<h1 class="text-4xl md:text-4xl font-bold text-gray-800 leading-tight mb-4">
						<?= $webSekolah['judulBesar']; ?>
					</h1>
					<p class="text-gray-600 mb-8">
						<?= $webSekolah['deskripsiSingkat']; ?>
					</p>
					<button
						class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Baca
						selengkapnya</button>
				</div>

				<div class="md:w-1/2 flex flex-col justify-end items-center h-full">
					<div class="border-4 border-blue-500 rounded-lg overflow-hidden shadow-lg">
						<?php if (!empty($webSekolah['fotoKS'])): ?>
							<img src="<?= base_url('assets/files/images/fotoGuru/' . $webSekolah['fotoKS']); ?>"
								alt="Foto Kepala Sekolah" class="w-1000 h-1000 object-cover">
						<?php else: ?>
							<img src="https://placehold.co/400x400/E5E7EB/374151?text=Foto+Kepala+Sekolah" alt="Foto Kepala Sekolah"
								class="w-72 h-72 object-cover">
						<?php endif; ?>
					</div>
					<p class="mt-3 text-lg font-semibold text-gray-800">
						<?= !empty($kepalaSekolah) ? $kepalaSekolah->namaLengkap : 'Nama Kepala Sekolah'; ?>
					</p>

					<p class="mt-0 text-lg font-semibold text-gray-800">Kepala <?= $profilSekolah['namaSekolah']; ?></p>
				</div>

			</div>
		</div>
	</section>

	<!-- Secondary Section -->
	<section class="bg-blue-50 py-16">
		<div class="container mx-auto px-6">
			<div class="flex flex-col md:flex-row items-center justify-between">
				<div class="md:w-1/2 mb-6 md:mb-0">
					<h2 class="text-3xl font-bold text-gray-800">Satsumi Religius dan Unggul !</h2>
				</div>
				<div class="md:w-1/2">
					<p class="text-gray-600">Kami Selalu berupaya mencetak generasi yang beriman, berakhlak mulia, dan memiliki
						keunggulan di berbagai bidang, sehingga mampu menjadi teladan serta membawa manfaat bagi masyarakat, bangsa,
						dan agama.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Featured Content Section -->
	<section class="py-16">
		<div class="container mx-auto px-6">
			<div class="relative rounded-lg shadow-xl overflow-hidden" style="padding-top: 56.25%; /* 16:9 ratio */">
				<!-- YouTube Embed -->
				<iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/ZV_0SklLkcg"
					title="YouTube video player" frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
					referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
				</iframe>
			</div>
		</div>
	</section>


	<!-- News Section -->
	<section class="py-16 bg-white">
		<div class="container mx-auto px-6">
			<h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Berita Terbaru Kami</h2>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
				<!-- News Card 1 -->
				<div
					class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition duration-300">
					<img src="https://placehold.co/600x400/E5E7EB/374151?text=Berita+1" alt="Berita 1"
						class="w-full h-48 object-cover">
					<div class="p-6">
						<h3 class="font-bold text-xl mb-2">Direktorat SMA Hadirkan Karya Sekolah Berbasis Komunitas</h3>
						<p class="text-gray-600 text-sm mb-4">15 Juli 2025 - Direktorat SMA</p>
						<a href="#" class="text-blue-600 hover:underline font-semibold">Baca selengkapnya &rarr;</a>
					</div>
				</div>
				<!-- News Card 2 -->
				<div
					class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition duration-300">
					<img src="https://placehold.co/600x400/E5E7EB/374151?text=Berita+2" alt="Berita 2"
						class="w-full h-48 object-cover">
					<div class="p-6">
						<h3 class="font-bold text-xl mb-2">Wamendikbudristek Buka ToT Koding dan Kecerdasan Artifisial</h3>
						<p class="text-gray-600 text-sm mb-4">14 Juli 2025 - Pusat Pendidikan</p>
						<a href="#" class="text-blue-600 hover:underline font-semibold">Baca selengkapnya &rarr;</a>
					</div>
				</div>
				<!-- News Card 3 -->
				<div
					class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition duration-300">
					<img src="https://placehold.co/600x400/E5E7EB/374151?text=Berita+3" alt="Berita 3"
						class="w-full h-48 object-cover">
					<div class="p-6">
						<h3 class="font-bold text-xl mb-2">Peran Kunci Fasilitator dalam Pembelajaran Koding Luring</h3>
						<p class="text-gray-600 text-sm mb-4">12 Juli 2025 - Bidang Training</p>
						<a href="#" class="text-blue-600 hover:underline font-semibold">Baca selengkapnya &rarr;</a>
					</div>
				</div>
			</div>
			<div class="text-center mt-12">
				<button
					class="bg-white text-blue-600 border border-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300">Lihat
					semua postingan</button>
			</div>
		</div>
	</section>
</main>

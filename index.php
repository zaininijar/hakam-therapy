<?php include 'layouts/header.php'; ?>

<main>
    <section class="bg-gradient-to-tr from-emerald-200 to-white">
        <div class="container mx-auto md:px-20 px-4 border h-[500px]">
            <div class="flex items-center justify-center w-full h-full">
                <div class="flex flex-col text-center md:w-2/3 w-full text-emerald-900 justify-center items-center">
                    <h2 class="text-3xl">
                        Temukan Kesejahteraan di <strong>Hakam<span class="text-emerald-500">Therapy</span></strong>
                    </h2>
                    <p class="mt-4 text-xs md:text-lg">
                        Kesehatan sejati dari keselarasan tubuh dan pikiran. Terapi pijat & bekam kami hadirkan
                        keharmonisan bagi tubuh & jiwa. Temukan kenyamanan & ketenangan dalam sentuhan kami.
                        Jadwalkan pengalaman penyembuhan hari ini.
                    </p>
                    <a href="register-therapy.php"
                        class="flex items-center justify-between gap-2 mt-4 shadow border rounded-full border-emerald-400 text-white px-8 py-2 bg-gradient-to-tr hover:bg-gradient-to-tl from-emerald-500 to-emerald-400">
                        Pesan Sekarang
                        <span>
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                    fill="rgba(255,255,255,1)"></path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="my-24">
            <div class="container mx-auto md:px-20 px-4">
                <h2 class="text-2xl text-center text-emerald-800 font-bold">Manfaat Therapy pijat dan Bekam</h2>
                <div class="mt-8">
                    <ul class="__benefits-container">
                        <li class="__card-benefit md:col-span-2">
                            Tuntaskan Rasa Sakit Tubuh dengan Terapi Pijat dan Bekam Tradisional
                        </li>
                        <li class="__card-benefit md:col-span-2">
                            Hadirkan Kembali Energi dan Semangat Hidup dengan Terapi Bekam dan Pijat
                        </li>
                        <li class="__card-benefit md:col-span-2">
                            Rasakan Perubahan Positif dalam Tenggang Waktu Singkat dengan Terapi Pijat dan Bekam Kami
                        </li>
                        <li class="__card-benefit md:col-span-3">
                            Temukan Kembali Kenyamanan Tubuh dan Maksimalkan Produktivitasmu dengan Terapi Pijat dan
                            Bekam Berkualitas Tinggi
                        </li>
                        <li class="__card-benefit md:col-span-3">
                            Hilangkan Segala Ketegangan Tubuh dan Perbaiki Sirkulasi Darah dengan Terapi Pijat dan Bekam
                            Holistik Kami
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="container mx-auto md:px-20 px-4">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="w-full rounded-md overflow-hidden md:col-span-3">
                    <img class="object-cover object-center w-full rounded-md h-full" src="assets/images/1.png" alt="">
                </div>
                <div class="w-full rounded-md overflow-hidden">
                    <img class="object-cover object-center w-full rounded-md h-full" src="assets/images/2.jpeg" alt="">
                </div>
                <div class="w-full rounded-md overflow-hidden">
                    <img class="object-cover object-center w-full rounded-md h-full" src="assets/images/3.jpeg" alt="">
                </div>
                <div class="w-full rounded-md overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="assets/images/4.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php'; ?>
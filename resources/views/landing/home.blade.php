<x-layout-landing>
    <x-slot:title>Sora Clinic</x-slot:title>
    {{-- Home --}}
    <section id="home" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 py-14 md:py-24 lg:h-screen w-full">
            <div class="flex flex-col justify-center gap-2 order-2 md:order-1">
                <h1 class="text-center md:text-left text-3xl lg:text-6xl font-bold font-poppins">
                    Kesehatan yang Lebih Baik <span
                        class="bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent">Dimulai dari
                        Sini</span>
                </h1>
                <p class="text-center md:text-left  text-medium lg:text-lg text-base font-poppins text-secondary">Kami
                    berkomitmen
                    memberikan
                    layanan
                    kesehatan
                    terbaik
                    dengan
                    perhatian penuh
                    pada setiap aspek kebutuhan
                    Anda.</p>
            </div>
            <div class="flex flex-col justify-center items-center order-1 md:order-2">
                <img src="/images/landing/Hero.png" alt="hero" class="">
            </div>
        </div>
    </section>

    {{-- Dokter --}}
    <section id="dokter" class=" px-4 sm:px-6 bg-slate-100">
        <div class="flex flex-col gap-7 text-center w-full py-16 md:py-24 mx-auto max-w-7xl">
            <div>
                <h1 class="text-3xl lg:text-6xl font-bold font-poppins">
                    Dokter Ahli Kami
                </h1>
                <p class="lg:text-lg text-base font-poppins text-secondary md:w-1/2 mx-auto">Dokter kami memiliki
                    keahlian
                    dan standar
                    yang
                    tinggi,
                    memastikan
                    pelayanan medis terbaik sesuai kebutuhan dan harapan pasien.
                </p>
            </div>
            <div class="grid grid-cols-4 gap-2 md:gap-7 h-full w-full">
                <div
                    class="group rounded-xl bg-gradient-to-b from-primary  lg:to-primaryLight h-48 sm:h-52  md:h-64 lg:h-96  overflow-hidden relative">
                    <img src="/images/landing/Doctor_1.svg" alt="" class="w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 w-full py-2 bg-transparent backdrop-blur-3xl opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-white text-xs md:text-lg text-poppins font-semibold">Dr. Anisa Farida, Sp.A.</p>
                        <p class="text-white text-xs md:text-base">Dokter Anak</p>
                    </div>
                </div>
                <div
                    class="group rounded-xl bg-gradient-to-b from-primary to-primaryLight h-48 sm:h-52  md:h-64 lg:h-96  overflow-hidden relative">
                    <img src="/images/landing/Doctor_2.svg" alt="" class="w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 w-full py-2 bg-transparent backdrop-blur-3xl opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-white text-xs md:text-lg text-poppins font-semibold">Dr. Rudi Santoso, Sp.PD</p>
                        <p class="text-white text-xs md:text-base">Dokter Umum</p>
                    </div>
                </div>
                <div
                    class="group rounded-xl bg-gradient-to-b from-primary to-primaryLight h-48 sm:h-52  md:h-64 lg:h-96  overflow-hidden relative">
                    <img src="/images/landing/Doctor_3.svg" alt="" class="w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 w-full py-2 bg-transparent backdrop-blur-3xl opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-white text-xs md:text-lg text-poppins font-semibold">Dr. Andi Wijaya, Sp.JP</p>
                        <p class="text-white text-xs md:text-base">Dokter Jantung</p>
                    </div>
                </div>
                <div
                    class="group rounded-xl bg-gradient-to-b from-primary to-primaryLight h-48 sm:h-52  md:h-64 lg:h-96  overflow-hidden relative">
                    <img src="/images/landing/Doctor_4.svg" alt="" class="w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 w-full py-2 bg-transparent backdrop-blur-3xl opacity-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-white text-xs md:text-lg text-poppins font-semibold">Dr. Siti Rahmawati, Sp.OG
                        </p>
                        <p class="text-white text-xs md:text-base">Dokter Kandungan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <section id="FAQs" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 py-14 md:py-24 w-full gap-6 md:gap-0">
            <div class="flex flex-col gap-2 ">
                <h1 class="text-center md:text-left text-3xl lg:text-6xl font-bold font-poppins">
                    Pertanyaan yang Sering Ditanyakan
                </h1>
                <p class="text-center md:text-left text-medium lg:text-lg text-base font-poppins text-secondary">
                    Jawaban untuk Pertanyaan yang Paling Sering Ditanyakan.</p>
            </div>
            <div class="flex flex-col items w-full lg:text-lg">
                <div x-data="{
                    activeAccordion: '',
                    setActiveAccordion(id) {
                        this.activeAccordion = (this.activeAccordion == id) ? '' : id
                    }
                }" class="relative w-full mx-auto">

                    <div x-data="{ id: $id('accordion') }"
                        :class="{
                            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                                id,
                            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                        }"
                        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                        <button @click="setActiveAccordion(id)"
                            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                            <span>Apa itu Sora Clinic?</span>
                            <div :class="{ 'rotate-90': activeAccordion == id }"
                                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                                <div
                                    class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                                <div :class="{ 'rotate-90': activeAccordion == id }"
                                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                            </div>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-5 pt-0 opacity-70">
                                Klinik Soko Rahayu adalah tempat pelayanan kesehatan yang berkomitmen menjadi pilar bagi
                                kesejahteraan pasien. Dengan layanan medis terpercaya dan penuh perhatian, kami
                                mendukung setiap langkah Anda menuju hidup yang lebih sehat dan sejahtera.
                            </div>
                        </div>
                    </div>
                    <div x-data="{ id: $id('accordion') }"
                        :class="{
                            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                                id,
                            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                        }"
                        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                        <button @click="setActiveAccordion(id)"
                            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                            <span>Bagaimana cara mendaftar antrian?</span>
                            <div :class="{ 'rotate-90': activeAccordion == id }"
                                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                                <div
                                    class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                                <div :class="{ 'rotate-90': activeAccordion == id }"
                                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                            </div>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-5 pt-0 opacity-70">
                                Anda dapat mendaftar antrian secara online melalui website kami. Masuk akun, Pilih
                                klinik tujuan, pilih layanan yang dibutuhkan, lalu pilih jadwal yang tersedia. Setelah
                                konfirmasi, Anda akan menerima tiket antrian digital yang dapat ditunjukkan saat datang
                                ke klinik.
                            </div>
                        </div>
                    </div>
                    <div x-data="{ id: $id('accordion') }"
                        :class="{
                            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                                id,
                            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                        }"
                        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                        <button @click="setActiveAccordion(id)"
                            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                            <span>Apakah ada layanan untuk memanggil ke rumah?</span>
                            <div :class="{ 'rotate-90': activeAccordion == id }"
                                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                                <div
                                    class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                                <div :class="{ 'rotate-90': activeAccordion == id }"
                                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                            </div>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-5 pt-0 opacity-70">
                                Saat ini, kami belum menyediakan layanan kunjungan ke rumah. Seluruh pemeriksaan
                                dilakukan di klinik kami.
                            </div>
                        </div>
                    </div>
                    <div x-data="{ id: $id('accordion') }"
                        :class="{
                            'border-neutral-200/60 text-neutral-800': activeAccordion ==
                                id,
                            'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
                        }"
                        class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
                        <button @click="setActiveAccordion(id)"
                            class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                            <span>Apakah terdapat layanan asuransi?</span>
                            <div :class="{ 'rotate-90': activeAccordion == id }"
                                class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                                <div
                                    class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                                <div :class="{ 'rotate-90': activeAccordion == id }"
                                    class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                                </div>
                            </div>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-5 pt-0 opacity-70">
                                Ya, kami bekerja sama dengan beberapa penyedia asuransi kesehatan untuk memudahkan
                                proses pelayanan Anda. Silakan hubungi klinik untuk informasi lebih lanjut.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-landing>

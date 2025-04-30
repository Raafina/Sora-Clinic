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
        <div class="flex flex-col gap-7 text-center w-full py-16 md:pt-24 md:pb-16 mx-auto max-w-7xl">
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
</x-layout-landing>

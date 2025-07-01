 <style>
     .navbar-fixed {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         z-index: 9999;
         background-color: rgba(255, 255, 255, 0.7);
         backdrop-filter: blur(8px);
         box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
     }
 </style>

 <header class="absolute bg-transparent top-0 left-0 w-full z-10">
     <div class="mx-auto max-w-7xl">
         <div class="flex items-center justify-between">
             <div class="px-4">
                 <a href="#home" class="font-bold text-lg text-primary py-3 block">
                     <img src="/images/logo/primary.svg" alt="logo" class="w-32">
                 </a>
             </div>

             <div class="hidden lg:block lg:order-2">
                 <nav id="nav-menu-desktop" class="bg-transparent">
                     <ul class="flex">
                         <li class="group">
                             <a href="#home"
                                 class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">Home</a>
                         </li>
                         <li class="group">
                             <a href="#dokter"
                                 class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">Dokter</a>
                         </li>
                         <li class="group">
                             <a href="#FAQs"
                                 class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">FAQ's</a>
                         </li>
                     </ul>
                 </nav>
             </div>

             <div class="flex items-center space-x-2 px-4 lg:order-3">
                 <a href="{{ route('login') }}" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                     class="bg-gradient-to-t from-[#7CBCFF] to-[#329EFF] hover:from-[#329EFF] hover:to-[#329EFF] text-white font-medium rounded-lg px-8 py-2 transition duration-300 ease-in-out">
                     Login</a>

                 <button id="hamburger" class="block lg:hidden text-center 2">
                     <span class="hamburger-line origin-center transition duration-300 ease-in-out"></span>
                     <span class="hamburger-line origin-center transition duration-300 ease-in-out"></span>
                     <span class="hamburger-line origin-center transition duration-300 ease-in-out"></span>
                 </button>
             </div>

             <nav id="nav-menu"
                 class="hidden bg-white max-w-[250px] w-full rounded-lg shadow-lg absolute right-4 top-full lg:hidden">
                 <ul class="block">
                     <li class="group">
                         <a href="#home"
                             class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">Home</a>
                     </li>
                     <li class="group">
                         <a href="#dokter"
                             class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">Dokter</a>
                     </li>
                     <li class="group">
                         <a href="#FAQs"
                             class="group-hover:text-primary font-medium hover:underline px-8 py-4 h-full flex rounded-lg transition duration-300 ease-in-out text-base">FAQ's</a>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </header>


 <script>
     // navbar
     const header = document.querySelector('header');
     const fixNav = header.offsetTop;

     window.addEventListener('scroll', () => {
         if (window.scrollY > fixNav) {
             header.classList.add('navbar-fixed');
         } else {
             header.classList.remove('navbar-fixed');
         }
     });

     // hamburger
     const hamburger = document.querySelector('#hamburger');
     const navMenu = document.querySelector('#nav-menu');

     hamburger.addEventListener('click', () => {
         hamburger.classList.toggle('hamburger-active');
         navMenu.classList.toggle('hidden');
     });

     // click outside hamburger
     window.addEventListener('click', (e) => {
         if (e.target != hamburger && e.target != navMenu) {
             hamburger.classList.remove('hamburger-active');
             navMenu.classList.add('hidden');
         }
     });
 </script>

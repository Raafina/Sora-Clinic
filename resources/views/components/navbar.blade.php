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
                 <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                     class="bg-gradient-to-t from-[#7CBCFF] to-[#329EFF] hover:from-[#329EFF] hover:to-[#329EFF] text-white font-medium rounded-lg px-8 py-2 transition duration-300 ease-in-out">
                     Login</button>
                 <!-- Dropdown Login -->
                 <div id="dropdownNavbar"
                     class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-lg border border-gray-200 w-44 ">
                     <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                         <li>
                             <a href="/pasien/login" class=" px-4 py-2 hover:bg-gray-100 flex items-center gap-x-2">
                                 <span>
                                     <svg width="15" height="15" viewBox="0 0 36 42" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M22.0315 34.4431C23.0255 34.2731 24.0195 34.1161 25.0125 33.9461C25.1695 34.2731 25.3265 34.6001 25.4835 35.0971C23.0255 38.8631 18.7625 41.4911 13.8195 41.4911C6.28846 41.4911 0.0644531 35.2541 0.0644531 27.7231C0.0644531 22.3091 3.33346 17.8771 7.59546 15.5891V19.1981C5.13746 21.1591 3.17645 24.2711 3.17645 27.7231C3.17645 33.6201 7.93646 38.3791 13.8195 38.3791C17.1145 38.3781 20.2275 36.9011 22.0315 34.4431ZM19.2595 5.1011C19.2595 2.3161 16.9585 0.184082 14.3175 0.184082C11.5455 0.184082 9.40146 2.3151 9.40146 5.1011C9.40146 7.7161 11.5455 10.0181 14.3175 10.0181C16.9575 10.0181 19.2595 7.7161 19.2595 5.1011ZM35.6565 37.3851L30.5835 25.4211C29.9035 24.1131 28.4395 23.2901 26.9745 23.6161L16.6185 26.0741V14.9341C16.6185 13.1291 15.1545 11.6521 13.3495 11.6521C11.7025 11.6521 10.2115 13.1301 10.2115 14.9341V30.0101C10.2115 30.9901 10.7085 31.8141 11.3885 32.4681C12.1995 32.9651 13.1935 33.2921 14.1605 33.1221L25.8245 30.3371L29.9035 39.8431C30.4265 41.1631 31.5505 41.8171 32.7015 41.8171C33.1985 41.8171 33.6955 41.6471 34.0345 41.4901C35.6565 40.8371 36.3105 39.0201 35.6565 37.3851Z"
                                             fill="#595959" />
                                     </svg>
                                 </span>Pasien</a>
                         </li>
                         <li>
                             <a href="/dokter/login" class=" px-4 py-2 hover:bg-gray-100 flex items-center gap-x-2">
                                 <span>
                                     <svg width="15" height="15" viewBox="0 0 38 42" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M37.3034 19.5219C37.3034 16.4099 34.6604 13.7819 31.5494 13.7819C28.2544 13.7819 25.6394 16.4099 25.6394 19.5219C25.6394 22.4629 27.7574 24.7649 30.5554 25.2479V31.3279C30.5554 36.0739 26.6334 39.8409 21.8734 39.8409C17.2694 39.8409 13.3214 36.0739 13.3214 31.3279V24.4369C15.6234 24.1109 17.7675 22.8019 19.7285 20.5019C20.0685 20.1749 20.2244 19.8479 20.0684 19.3519C22.6834 16.0819 24.1484 11.4929 24.1484 7.88391C24.1484 2.47091 21.6895 1.98692 17.7675 0.99292C17.4275 0.50992 16.9294 0.180908 16.4584 0.180908C15.4654 0.180908 14.8124 0.834912 14.8124 1.65991C14.8124 2.47091 15.4654 3.29492 16.4584 3.29492C16.7724 3.29492 17.0864 3.12491 17.2684 2.79691C21.1924 3.79091 22.3424 3.94791 22.3424 7.88391C22.3424 10.9959 20.8774 15.0879 18.5764 18.2129C18.2624 18.2129 17.9224 18.3709 17.5824 18.6969C16.4574 20.0169 14.6274 21.4819 12.5094 21.4819C10.3654 21.4819 8.40344 20.0169 7.25244 18.6969C7.09644 18.3709 6.5994 18.2129 6.2594 18.2129C3.9574 15.2579 2.65143 10.9959 2.65143 7.88391C2.65143 3.94791 3.64444 3.79091 7.56744 2.79691C7.90744 3.12491 8.0634 3.29492 8.5614 3.29492C9.3714 3.29492 10.0515 2.47091 10.0515 1.65991C10.0515 0.835912 9.3714 0.180908 8.5614 0.180908C7.9074 0.180908 7.41044 0.50892 7.09644 0.99292C3.14744 1.98592 0.689453 2.47091 0.689453 7.88391C0.689453 11.4919 2.15341 16.0819 4.79541 19.3519C4.79541 19.8479 4.79541 20.1749 5.13641 20.5019C7.09741 22.8029 9.21546 24.1109 11.5175 24.4369V31.3279C11.5175 37.0559 16.1194 41.8139 22.0294 41.8139C27.7564 41.8139 32.3594 37.0549 32.3594 31.3279V25.2479C35.1584 24.7649 37.3034 22.4629 37.3034 19.5219ZM31.5494 23.4569C29.4054 23.4569 27.6004 21.6519 27.6004 19.5219C27.6004 17.5599 29.4054 15.7559 31.5494 15.7559C33.5104 15.7559 35.3154 17.5599 35.3154 19.5219C35.3154 21.6519 33.5104 23.4569 31.5494 23.4569ZM31.5494 16.7359C33.0144 16.7359 34.3214 18.0429 34.3214 19.5209C34.3214 21.1559 33.0144 22.4619 31.5494 22.4619C29.9024 22.4619 28.5944 21.1549 28.5944 19.5209C28.5944 18.0429 29.9014 16.7359 31.5494 16.7359Z"
                                             fill="#595959" />
                                     </svg>
                                 </span>Dokter</a>
                         </li>
                     </ul>
                 </div>

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

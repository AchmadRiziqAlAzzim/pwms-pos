<section id="SideBar">
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40  backdrop-blur-sm transition-opacity lg:hidden" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
    <aside id="MainBodySideBar" x-cloak class="fixed inset-y-0 left-0 z-50 bg-white border-e border-gray-200/50 h-screen overflow-hidden transition-all duration-500 ease-[cubic-bezier(.22,1,.36,1)] lg:sticky lg:top-0" :class="sidebarOpen ? 'translate-x-0 w-72' : '-translate-x-full w-72 lg:translate-x-0 lg:w-24'">
        <div class="flex flex-col h-full overflow-hidden border-e border-gray-200/50 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <div @click="sidebarOpen = !sidebarOpen; if (!sidebarOpen) { dashboardOpen = false; }" class="sticky top-0 w-full bg-white group px-6.5 py-6 relative flex justify-start items-center cursor-pointer transition-all duration-300 z-[999]">
                <div class="group-hover:hidden p-3 rounded-xl bg-primary flex items-center justify-center">
                    <i class="bx bx-bolt text-xl text-white"></i>
                </div>
                <div class="hidden group-hover:flex items-center">
                    <i class="bx bx-dock-left text-xl"></i>
                </div>    
                <div x-show="sidebarOpen" class="font-black ms-3">POS</div>
            </div>
            <ul class="flex flex-col flex-1 min-h-0 overflow-y-auto my-5 px-5 pb-4 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                <div class="w-full">
                    <div x-show="sidebarOpen" x-transition class="px-2 mb-4 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        Menu Utama
                    </div>
                    <li>
                        <a href="?route=kasir" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 mb-8 <?= $route === "kasir" ? 'bg-primary text-white font-bold' : 'bg-primary/20 text-primary hover:bg-primary hover:text-white duration-300 transition-all ease-in-out' ?>">
                            <i class="bx bx-store text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                               Kasir | POS
                           </span>
                        </a>
                    </li>
                    <div x-show="sidebarOpen" x-transition class="px-2 mb-4 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        Operasional
                    </div>
                    <li>
                        <a href="?route=dashboard" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === 'dashboard' ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 transition-all duration-300' ?>">                        
                            <i class="bx bx-grid text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <?php if(in_array($kr, ['super_admin','admin'])): ?>
                    <li>
                        <button type="button" @click="if (!sidebarOpen) { sidebarOpen = true; Menu = true; } else { Menu = !Menu; }" class="relative w-full justify-between flex items-center px-4 py-4 rounded-xl cursor-pointer <?= $route === "menu" || $route === "menu/kategori" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">
                            <div class="flex items-center gap-4">                              
                                <i class="bx bx-dish text-xl shrink-0"></i>
                                <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                    Kelola Menu
                                </span>
                            </div>
                            <i x-show="sidebarOpen" x-transition class="bx bx-chevron-down text-xl transition-transform duration-300" :class="Menu ? 'rotate-180' : ''"></i>
                        </button>
                        <div class="grid transition-all duration-300 ease-out" :class="Menu && sidebarOpen ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                            <div class="overflow-hidden">
                                <div class="ml-5 mt-2 pl-4 border-l-2 border-gray-100 space-y-1">
                                    <a href="?route=menu" class="relative flex justify-start items-center px-3.5 py-3.5 rounded-xl gap-4 <?= $route === 'menu' ? 'text-primary font-bold' : 'text-gray-400/90 hover:bg-black/5 transition-all duration-300' ?>">
                                        <i class="bx bx-bowl-noodles text-lg shrink-0"></i>
                                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">
                                            Menu
                                        </span>
                                    </a>
                                    <a href="?route=menu/kategori" class="relative flex justify-start items-center px-3.5 py-3.5 rounded-xl gap-4 <?= $route === 'menu/kategori' ? 'text-primary font-bold' : 'text-gray-400/90 hover:bg-black/5 transition-all duration-300' ?>">
                                        <i class="bx bx-book-bookmark text-lg shrink-0"></i>
                                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">
                                            Kategori
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="?route=metode" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "metode" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                        
                            <i class="bx bx-credit-card text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                               Metode
                           </span>
                        </a>
                    </li>   
                    <?php endif; ?> 
                    <li class="mb-4">
                        <a href="?route=hutang" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "hutang" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                        
                            <i class="bx bx-note text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                               Hutang
                           </span>
                        </a>
                    </li>
                    <div x-show="sidebarOpen" x-transition class="px-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        Keuangan
                    </div> 
                    <li class="mt-4">
                        <a href="?route=jurnal" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "jurnal" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                        
                            <i class="bx bx-book-alt text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                Jurnal
                            </span>
                        </a>
                    </li>                         
                <div class="w-full">
                    <?php if(in_array($kr, ['super_admin','admin'])): ?>
                    <li>
                        <button type="button" @click="if (!sidebarOpen) { sidebarOpen = true; Pengguna = true; } else { Pengguna = !Pengguna; }" class="relative w-full justify-between flex items-center px-4 py-4 rounded-xl cursor-pointer <?= $route === "pelanggan" || $route === "anggota" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">
                            <div class="flex items-center gap-4">
                                <?php if ($route === "pelanggan" || $route === "anggota"): ?>
                                    <span class="absolute left-0 w-1.5 h-7 bg-primary rounded-r-full"></span>
                                <?php endif; ?>
                                <i class="bx bx-group text-xl shrink-0"></i>
                                <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                    Data Pengguna
                                </span>
                            </div>
                            <i x-show="sidebarOpen" x-transition class="bx bx-chevron-down text-xl transition-transform duration-300" :class="Pengguna ? 'rotate-180' : ''"></i>
                        </button>
                        <div class="grid transition-all duration-300 ease-out" :class="Pengguna && sidebarOpen ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                            <div class="overflow-hidden">                       
                                <div class="ml-5 mt-2 pl-4 border-l-2 border-gray-100 space-y-1">
                                    <a href="?route=anggota" class="relative flex justify-start items-center px-3.5 py-3.5 rounded-xl gap-4 <?= $route === 'anggota' ? 'text-primary font-bold' : 'text-gray-400/90 hover:bg-black/5 transition-all duration-300' ?>">
                                        <i class="bx bx-user-id-card text-lg shrink-0"></i>
                                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">
                                            Anggota
                                        </span>
                                    </a>
                                    <a href="?route=pelanggan" class="relative flex justify-start items-center px-3.5 py-3.5 rounded-xl gap-4 <?= $route === 'pelanggan' ? 'text-primary font-bold' : 'text-gray-400/90 hover:bg-black/5 transition-all duration-300' ?>">
                                        <i class="bx bx-user text-lg shrink-0"></i>
                                        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">
                                            Pelanggan
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                    <li class="mb-4">
                        <a href="?route=laporan" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "laporan" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                       
                            <i class="bx bx-archive text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                Laporan
                            </span>
                        </a>
                    </li>
                </div>
                <div x-show="sidebarOpen" x-transition class="px-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                    System
                </div>
                <li class="mt-4">
                    <a href="?route=profile" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "profile" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                    
                        <i class="bx bx-user text-xl"></i>
                        <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                            Profil Saya
                        </span>
                    </a>
                </li>            
                <?php if(in_array($kr, ['super_admin','admin'])): ?>
                <div>
                    <li>
                        <a href="?route=pengaturan" class="relative flex justify-start items-center px-4 py-4 rounded-xl gap-4 <?= $route === "pengaturan" ? 'bg-primary text-white font-bold' : 'text-gray-400/90 hover:bg-black/5 duration-300 transition-all ease-in-out' ?>">                       
                            <i class="bx bx-hexagon text-xl"></i>
                            <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                                Pengaturan
                            </span>
                        </a>
                    </li>                  
                </div>
                <?php endif; ?>                
                <li>
                    <a href="/resources/views/partials/logout.php" class="flex sm:hidden relative justify-center items-center px-4 py-4 bg-rose-600 text-white rounded-xl gap-4 mt-10">                           
                        <i class="bx bx-door-open text-xl"></i>
                        <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
            <div class="shrink-0 w-full bg-white px-5 py-1">
                <a href="/resources/views/partials/logout.php" class="flex relative justify-center items-center px-4 py-4 bg-rose-600 text-white rounded-xl gap-4">                           
                        <i class="bx bx-door-open text-xl"></i>
                        <span x-show="sidebarOpen" x-transition class="font-semibold whitespace-nowrap">
                            Logout
                        </span>
                    </a>
            </div>
        </div>
    </aside>
</section>
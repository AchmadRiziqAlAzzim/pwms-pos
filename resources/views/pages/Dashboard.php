<section id="Dashboard">
    <div class="w-full">

        <div class="flex flex-col sm:flex-row md:items-start justify-between gap-5">
            <div class="flex items-center gap-4 min-w-0">
                <div
                    class="w-13 h-13 rounded-lg bg-primary flex items-center justify-center shrink-0 border border-gray-200/80">
                    <i class="bx bx-grid text-2xl text-white"></i>
                </div>
                <div class="min-w-0">
                    <h1 class="text-black dark:text-white font-black text-2xl">
                        Dashboard
                    </h1>
                    <p class="text-sm text-gray-500 font-medium mt-1">
                        Pantau aktivitas dan perkembangan bisnis Anda hari ini.
                    </p>
                </div>
            </div>
            <div class=" mt-1">
                <a href="?route=laporan"
                    class="flex items-center justify-center gap-2 bg-primary text-white font-bold px-6 py-3 rounded-lg hover:hover-primary transition-all duration-200">
                    <i class="bx bxs-file-report text-lg"></i>
                    <span>Laporan</span>
                </a>
            </div>
        </div>

        <div class="mt-8">
            <div class="w-full bg-white rounded-lg border border-gray-200/80 overflow-hidden relative">
                <div class="px-7 py-8 md:px-10 md:py-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                    <div class="order-2 lg:order-1 flex-1">
                        <h2 class="text-3xl md:text-4xl font-black text-gray-900 leading-tight">
                            Selamat datang,
                            <span class="text-primary">
                                <?= $dataAnggota['nama'] ?>!
                            </span>
                        </h2>
                        <p class="text-sm md:text-base text-gray-500 mt-3 max-w-2xl leading-relaxed">
                            Pantau penjualan dan transaksi hari ini.
                        </p>
                        <div class="flex flex-wrap items-center gap-3 mt-6">
                            <a href="?route=kasir"
                                class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-lg text-sm font-bold hover:hover-primary active:scale-95 transition-all duration-200">
                                <i class="bx bxs-cart-alt text-lg"></i>
                                <span>Buka Kasir</span>
                            </a>
                            <a href="?route=menu"
                                class="inline-flex items-center gap-2 bg-gray-50 text-gray-700 border border-gray-200 px-5 py-3 rounded-lg text-sm font-bold hover:bg-gray-100 active:scale-95 transition-all duration-200">
                                <i class="bx bxs-bowl-hot text-lg"></i>
                                <span>Kelola Menu</span>
                            </a>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2 w-full lg:w-80 xl:w-96 flex justify-center lg:justify-end">
                        <div id="miniAdminMockup" class="w-full overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md shadow-gray-200/30">
                            <div class="flex h-7 items-center justify-between border-b border-gray-100 px-3">
                                <div class="flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                </div>
                                <div class="flex items-center gap-1 rounded-md bg-gray-50 px-2 py-1">
                                    <i class="bx bx-lock-alt text-[9px] text-gray-400"></i>
                                    <span class="text-[8px] text-gray-400">admin.kedaiku.local</span>
                                </div>
                                <i class="bx bx-dots-vertical-rounded text-sm text-gray-400"></i>
                            </div>
                    
                            <div class="flex sm:h-[250px] lg:h-[155px]">
                                <aside class="flex w-[94px] shrink-0 flex-col border-r border-gray-100 bg-white p-2">
                                    <div class="mb-3 flex items-center gap-1.5 px-1">
                                        <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-primary text-white">
                                            <i class="bx bx-store-alt text-sm"></i>
                                        </div>
                                        <span class="text-[10px] font-black text-gray-800">KedaiKu</span>
                                    </div>
                    
                                    <div class="flex flex-col gap-1">
                                        <button type="button" data-mini-view="Dashboard"
                                            class="mini-nav flex items-center gap-1.5 rounded-md bg-primary px-2 py-1.5 text-white transition-colors">
                                            <i class="bx bx-grid text-xs"></i>
                                            <span class="text-[9px] font-semibold">Dashboard</span>
                                        </button>
                                        <button type="button" data-mini-view="Barang"
                                            class="mini-nav flex items-center gap-1.5 rounded-md px-2 py-1.5 text-gray-400 transition-colors hover:bg-blue-50">
                                            <i class="bx bx-package text-sm"></i>
                                            <span class="text-[9px] font-semibold">Barang</span>
                                        </button>
                                        <button type="button" data-mini-view="Pesanan"
                                            class="mini-nav flex items-center gap-1.5 rounded-md px-2 py-1.5 text-gray-400 transition-colors hover:bg-blue-50">
                                            <i class="bx bx-receipt text-sm"></i>
                                            <span class="text-[9px] font-semibold">Pesanan</span>
                                        </button>
                                        <button type="button" data-mini-view="Laporan"
                                            class="mini-nav flex items-center gap-1.5 rounded-md px-2 py-1.5 text-gray-400 transition-colors hover:bg-blue-50">
                                            <i class="bx bx-bar-chart-alt-2 text-sm"></i>
                                            <span class="text-[9px] font-semibold">Laporan</span>
                                        </button>
                                    </div>
                    
                                    <div class="mt-auto flex items-center gap-1.5 border-t border-gray-100 pt-2">
                                        <div class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-50 text-primary">
                                            <i class="bx bx-user text-xs"></i>
                                        </div>
                                        <div class="h-1.5 w-10 rounded-full bg-gray-200"></div>
                                    </div>
                                </aside>
                    
                                <div class="min-w-0 flex-1 bg-gray-50/70 p-3">
                                    <div class="mb-3 flex items-center justify-between">
                                        <div>
                                            <p class="text-[8px] text-gray-400">OVERVIEW / ADMIN</p>
                                            <h3 id="miniPageTitle" class="mt-1 text-xs font-black text-gray-800">Dashboard</h3>
                                        </div>
                                        <div class="flex h-6 w-6 items-center justify-center rounded-md border border-gray-100 bg-white">
                                            <i class="bx bx-bell text-xs text-gray-400"></i>
                                        </div>
                                    </div>
                    
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="rounded-lg border border-gray-100 bg-white p-2">
                                            <div class="h-1.5 w-10 rounded-full bg-gray-200"></div>
                                            <div class="mt-2.5 h-3 w-12 rounded bg-blue-100"></div>
                                            <div class="mt-2 h-1 w-full rounded-full bg-gray-100"></div>
                                        </div>
                                        <div class="rounded-lg border border-gray-100 bg-white p-2">
                                            <div class="h-1.5 w-12 rounded-full bg-gray-200"></div>
                                            <div class="mt-2.5 h-3 w-10 rounded bg-gray-200"></div>
                                            <div class="mt-2 h-1 w-3/4 rounded-full bg-gray-100"></div>
                                        </div>
                                        <div class="rounded-lg border border-gray-100 bg-white p-2">
                                            <div class="h-1.5 w-8 rounded-full bg-gray-200"></div>
                                            <div class="mt-2.5 h-3 w-12 rounded bg-blue-50"></div>
                                            <div class="mt-2 h-1 w-full rounded-full bg-gray-100"></div>
                                        </div>
                                    </div>
                    
                                    <div class="mt-2.5 flex h-[48px] items-end gap-1.5 rounded-lg border border-gray-100 bg-white px-3 pb-2 pt-1">
                                        <div class="h-[35%] flex-1 rounded-t bg-blue-100"></div>
                                        <div class="h-[60%] flex-1 rounded-t bg-blue-200"></div>
                                        <div class="h-[45%] flex-1 rounded-t bg-blue-100"></div>
                                        <div class="h-[80%] flex-1 rounded-t bg-primary"></div>
                                        <div class="h-[55%] flex-1 rounded-t bg-blue-200"></div>
                                        <div class="h-full flex-1 rounded-t bg-blue-100"></div>
                                        <div class="h-[65%] flex-1 rounded-t bg-blue-200"></div>
                                        <div class="h-[40%] flex-1 rounded-t bg-blue-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div> 
        </div>

        <div class="mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-lg border border-gray-200/80 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">
                            Total Pendapatan Bersih
                        </p>
                        <?php if(in_array($kr, ['super_admin','admin'])): ?>
                         <h3 class="text-xl sm:text-2xl font-black text-gray-900 mt-1.5">
                        <?= formatRupiahLaporan($uangbersih) ?>
                    </h3>
                    <?php else: ?>
                        <h3 class="text-xl sm:text-2xl font-black text-gray-900 mt-1.5">
                         <?= formatRupiahLaporan($statistik['total_pendapatan_bersih']) ?>
                    </h3>
                    <?php endif; ?>
                        <div class="mt-3">
                            <p class="text-xs font-semibold text-primary">
                                Pendapatani bulan ini
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-14 h-14 bg-primary rounded-lg flex items-center justify-center text-white shrink-0">
                        <i class="bx bxs-wallet text-2xl"></i>
                    </div>
                </div>        

                <div class="bg-white p-6 rounded-lg border border-gray-200/80 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">
                            Transaksi bulan Ini
                        </p>
                        <h2 class="text-3xl font-black text-gray-900">
                            <?= $statistik['total_transaksi'] ?>
                        </h2>
                        <p class="text-xs font-medium text-gray-400 mt-3">
                            Transaksi berhasil dicatat
                        </p>
                    </div>
                    <div
                        class="w-14 h-14 bg-primary rounded-lg flex items-center justify-center text-white shrink-0">
                        <i class="bx bxs-receipt text-2xl"></i>
                    </div>
                </div>  

                <div class="bg-white p-6 rounded-lg border border-gray-200/80 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 mb-2">
                            Total Menu
                        </p>
                        <h2 class="text-3xl font-black text-gray-900">
                            <?= totalmenuaktif() ?>
                        </h2>
                        <p class="text-xs font-medium text-gray-400 mt-3">
                            Menu aktif tersedia
                        </p>
                    </div>
                    <div
                        class="w-14 h-14 bg-primary rounded-lg flex items-center justify-center text-white shrink-0">
                        <i class="bx bxs-bowl-hot text-2xl"></i>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<script>
    (() => {
        const mockup = document.getElementById('miniAdminMockup');
        if (!mockup || mockup.dataset.initialized) return;

        mockup.dataset.initialized = 'true';

        mockup.addEventListener('click', (event) => {
            const button = event.target.closest('[data-mini-view]');
            if (!button) return;

            mockup.querySelectorAll('.mini-nav').forEach((nav) => {
                const active = nav === button;

                nav.classList.toggle('bg-primary', active);
                nav.classList.toggle('text-white', active);
                nav.classList.toggle('text-gray-400', !active);
            });

            mockup.querySelector('#miniPageTitle').textContent = button.dataset.miniView;
        });
    })();
</script>
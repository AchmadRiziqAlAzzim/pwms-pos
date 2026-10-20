<section id="JurnalKas">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">

        <div class="flex items-center gap-x-5">

            <div class="w-13 h-13 rounded-lg bg-primary flex items-center justify-center shrink-0 border border-gray-200/80">
                <i class="bx bx-book-content text-2xl text-white"></i>
            </div>

            <div>

                <h1 class="text-2xl font-black text-gray-900">
                    Jurnal Kas
                </h1>

                <p class="text-sm text-gray-500 font-medium mt-1.5">
                    Catat dan pantau seluruh pemasukan serta pengeluaran.
                </p>

            </div>

        </div>

        <div class="flex flex-row gap-x-3 my-1 shrink-0">
    
            <button
                type="button"
                onclick='showGlobalModal(<?= json_encode([
                    "title" => "Tambah Catatan Jurnal",
                    "subtitle" => "Catat nominal dan keterangan pemasukan atau pengeluaran.",
                    "icon" => "bx-book-content",
                    "iconBg" => "bg-primary",
                    "method" => "POST",
                    "buttonText" => "Simpan Catatan",
                    "buttonIcon" => "bxs-save",
                    "buttonColor" => "bg-primary hover:bg-blue-700",
                    "nameBtn" => "aksi",
                    "value" => "tambah"
                ]) ?>)'
                class="w-full h-12 md:w-auto flex items-center justify-center bg-primary text-white font-bold px-5 gap-2 rounded-lg cursor-pointer hover:opacity-90 transition-opacity"
            >
                <i class="bx bx-plus text-lg"></i>
                <span>Tambah Catatan</span>
            </button>

        </div>

    </div>


    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 mt-10 mb-8">

        <div class="lg:col-span-5 bg-white border-y border-gray-200/80 rounded-lg p-6 flex flex-col justify-between min-h-[250px]">

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">
                        Saldo Bersih
                    </p>

                    <h3 class="text-3xl font-black text-gray-900 mt-3 break-words">
                        Rp <?= number_format($uangbersih, 0, ',', '.'); ?>
                    </h3>

                    <p class="text-sm text-gray-500 font-medium mt-2">
                        Selisih pemasukan dan pengeluaran
                    </p>

                </div>

                <div class="w-12 h-12 rounded-lg bg-primary flex items-center justify-center shrink-0">
                    <i class="bx bx-wallet text-xl text-white"></i>
                </div>

            </div>

            <div class="mt-8 pt-5 border-t border-gray-200/80 flex items-center justify-between gap-3">

                <div>

                    <p class="text-xs text-gray-400 font-medium">
                        Total Catatan
                    </p>

                    <p class="text-sm font-black text-gray-800 mt-1">
                        <?= $totalpengeluaran ?> Transaksi
                    </p>

                </div>

                <div class="w-10 h-10 rounded-lg bg-gray-50 flex items-center justify-center">
                    <i class="bx bx-receipt text-xl text-gray-500"></i>
                </div>

            </div>

        </div>


        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-5">

            <div class="bg-white border-t border-gray-200/80 rounded-lg px-5 py-5 flex items-center justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">
                        Total Pendapatan
                    </p>

                    <h3 class="text-xl sm:text-2xl font-black text-gray-900 mt-2">
                        Rp <?= number_format($uangpendaptan, 0, ',', '.'); ?>
                    </h3>

                    <p class="text-xs text-gray-400 font-medium mt-2">
                        Akumulasi dana masuk
                    </p>

                </div>

                <div class="w-12 h-12 rounded-lg bg-primary flex items-center justify-center shrink-0">
                    <i class="bx bx-trending-up text-xl text-white"></i>
                </div>

            </div>


            <div class="bg-white border-y border-gray-200/80 rounded-lg px-5 py-5 flex items-center justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">
                        Total Pengeluaran
                    </p>

                    <h3 class="text-xl sm:text-2xl font-black text-gray-900 mt-2">
                        Rp <?= number_format($uangpengeluaran, 0, ',', '.'); ?>
                    </h3>

                    <p class="text-xs text-gray-400 font-medium mt-2">
                        Akumulasi dana keluar
                    </p>

                </div>

                <div class="w-12 h-12 rounded-lg bg-primary flex items-center justify-center shrink-0">
                    <i class="bx bx-trending-down text-xl text-white"></i>
                </div>

            </div>

        </div>

    </div>


    <div class="my-6 bg-white border-t border-gray-200/80 sm:p-5 dark:bg-gray-950 min-w-0">

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">

            <div>

                <div class="flex items-center gap-2">

                    <div class="w-1.5 h-5 rounded-full bg-primary"></div>

                    <h2 class="text-sm font-black text-gray-800 dark:text-white">
                        Riwayat Jurnal
                    </h2>

                </div>

                <p class="text-xs text-gray-400 font-medium mt-1 ml-3.5">
                    Daftar pencatatan pemasukan dan pengeluaran
                </p>

            </div>

             <div class="flex items-center gap-3 w-full sm:w-auto">
                <form action="" method="GET" class="flex-1 sm:w-[280px]"id="formCariPengeluaran">
                    <input 
                        type="hidden" 
                        name="route" 
                        value="jurnal">
                    <div class="relative flex items-center gap-2 p-1.5 rounded-lg border-2 border-gray-200/80 dark:border-gray-700 bg-white dark:bg-gray-800 outline-none focus-within:ring-2 focus-within:ring-primary transition-all min-h-[48px]">
                        <div class="flex items-center text-gray-400 pl-2 shrink-0">
                            <i class="bx bx-search text-lg"></i>
                        </div>
                        <input
                            name="keyword"
                            type="text"
                            id="searchPengeluaran"
                            class="flex-1 px-1 py-1 bg-transparent text-gray-900 dark:text-gray-100 text-sm placeholder:text-gray-400 focus:outline-none font-medium min-w-0"
                            placeholder="Cari data jurnal..."
                            value="<?= htmlspecialchars($keyword ?? '') ?>"
                            >                        
                    </div>
                </form>
            </div>

        </div>


        <div class="overflow-x-auto overflow-y-auto max-h-[700px] p-1">

            <table class="w-full min-w-[700px] text-sm border-separate border-spacing-0">

                <thead class="sticky top-0 z-10 bg-gray-50 dark:bg-gray-900">

                    <tr>

                        <th class="text-left font-bold text-gray-500 dark:text-gray-400 px-5 py-4 rounded-tl-xl">
                            #
                        </th>

                        <th class="text-left font-bold text-gray-500 dark:text-gray-400 px-5 py-4">
                            Tanggal
                        </th>

                        <th class="text-left font-bold text-gray-500 dark:text-gray-400 px-5 py-4">
                            Jumlah
                        </th>

                        <th class="text-left font-bold text-gray-500 dark:text-gray-400 px-5 py-4">
                            Keterangan
                        </th>

                        <th class="text-left font-bold text-gray-500 dark:text-gray-400 px-5 py-4">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>
               <?php if (!empty($pengeluaran)): ?>
                            <?php foreach ($pengeluaran as $p): ?>

                                <tr class="group hover:bg-gray-50 transition-colors">
                                    <td class="px-5 py-4 font-bold text-gray-500">
                                        <?= $no++ ?>
                                    </td>
                                    <td class="px-5 py-4">
                                    <span class="font-bold text-gray-800">
                                    <?= kalenderInd($p['tanggal'], 'j F Y'); ?>
                                    </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="font-bold text-gray-800">
                                            Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="font-bold text-gray-800">
                                            <?= htmlspecialchars($p['keterangan']); ?>
                                        </span>
                                    </td>                                    
                                    <td class="px-5 py-4">
                                        <div class="flex items-center justify-center gap-2">    
                                            <button
                                                type="button"
                                                onclick='showGlobalModal(<?= json_encode([
                                                    "title" => "Edit Catatan Jurnal",
                                                    "subtitle" => "Perbarui informasi pengeluaran.",
                                                    "icon" => "bxs-edit",
                                                    "iconBg" => "bg-amber-500",
                                                    "method" => "POST",
                                                    "buttonText" => "Simpan Perubahan",
                                                    "buttonIcon" => "bxs-save",
                                                    "buttonColor" => "bg-amber-500 hover:bg-amber-600",
                                                    "nameBtn" => "aksi",
                                                    "value" => "edit"
                                                ]) ?>); modalEdit(this)'
                                                class="w-10 h-10 rounded-lg bg-primary text-white flex items-center justify-center hover:opacity-90 active:scale-95 transition-all"
                                                title="Edit Pengeluaran"
                                                data-id="<?= htmlspecialchars($p['id_pengeluaran']); ?>"
                                                data-tanggal="<?= htmlspecialchars($p['tanggal']); ?>"
                                                data-harga="<?= number_format($p['harga'], 0, ',', '.'); ?>"
                                                data-keterangan="<?= htmlspecialchars($p['keterangan']); ?>"
                                                >
                                                <i class="bx bxs-pencil"></i>
                                            </button>
                                            <button
                                                type="button"
                                                onclick="showConfirmForm({
                                                    title: 'Hapus Pengeluaran',
                                                    message: 'Apakah Anda yakin ingin menghapus Pengeluaran <?= htmlspecialchars($p['keterangan']); ?>?',
                                                    actionText: 'Ya, hapus',
                                                    type: 'danger',
                                                    nameAksi: 'hapus',
                                                    inputs: [
                                                        {
                                                            name: 'aksi',
                                                            type: 'hidden',
                                                            value: 'hapus'
                                                        },
                                                        {
                                                            name: 'id',
                                                            type: 'hidden',
                                                            value: <?= (int) $p['id_pengeluaran']; ?>
                                                        }
                                                    ]
                                                });"
                                                class="w-10 h-10 rounded-lg bg-red-500 text-white flex items-center justify-center hover:opacity-90 active:scale-95 transition-all"
                                                title="Hapus menu">
                                                <i class="bx bxs-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5">
                            <div class="flex flex-col items-center justify-center py-12 px-4 text-center bg-gray-50 dark:bg-gray-900">
                                <div class="w-20 h-20 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4 border border-gray-200/80">
                                    <i class="bx bxs-book-bookmark text-4xl text-gray-300"></i>
                                </div>
                                <h3 class="text-base font-black text-gray-800 dark:text-white mb-1">
                                    Catatan Belum Tersedia
                                </h3>
                                <p class="text-xs text-gray-400 max-w-sm mb-5">
                                    <?php if (!empty($keyword)): ?>
                                        Belum ada catatan yang cocok dengan pencarian
                                        <strong>"<?= htmlspecialchars($keyword); ?>"</strong>.
                                    <?php else: ?>
                                        Belum ada data catatan yang ditambahkan.
                                    <?php endif; ?>
                                </p>
                                <button
                                    type="button"
                                    onclick='showGlobalModal(<?= json_encode([
                                        "title" => "Tambah Catatan",
                                        "subtitle" => "Kelola daftar catatan menu cafe.",
                                        "icon" => "bxs-book-bookmark",
                                        "iconBg" => "bg-primary",
                                        "method" => "POST",
                                        "buttonText" => "Simpan Catatan",
                                        "buttonIcon" => "bxs-save",
                                        "buttonColor" => "bg-primary hover:bg-blue-700",
                                        "nameBtn" => "aksi",
                                        "value" => "tambah"
                                    ]) ?>)'
                                    class="px-4 py-3 bg-primary text-white text-sm font-bold rounded-lg hover:opacity-90 transition-all flex items-center gap-2">
                                    <i class="bx bx-plus text-base"></i>
                                    <span>Tambah Catatan</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>

            </table>

            <?php if ($pagination['totalData'] > 0): ?>
                            <div class="w-full flex justify-center mt-6">
                                <nav aria-label="Pagination">
                                    <ul class="inline-flex items-center gap-1.5 p-1.5 rounded-lg border-2 border-gray-200/80 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm font-medium">
                                        <li>
                                            <?php if ($halaman > 1): ?>
                                                <a
                                                    href="?route=jurnal&page=<?= $halaman - 1; ?>"
                                                    class="flex items-center justify-center px-3.5 h-9 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                                    <i class="bx bx-chevron-left"></i>
                                                    Previous
                                                </a>
                                            <?php else: ?>
                                                <span
                                                    class="flex items-center justify-center px-3.5 h-9 rounded-lg text-gray-400 opacity-50 cursor-not-allowed" >
                                                    <i class="bx bx-chevron-left"></i>
                                                    Previous
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalHalaman; $i++): ?>
                                            <li>
                                                <?php if ($i == $halaman): ?>
                                                    <span
                                                        class="flex items-center justify-center w-9 h-9 rounded-lg bg-primary text-white font-bold shadow-sm" >
                                                        <?= $i; ?>
                                                    </span>
                                                <?php else: ?>
                                                    <a
                                                        href="?route=jurnal&page=<?= $i; ?>"
                                                        class="flex items-center justify-center w-9 h-9 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                                        <?= $i; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endfor; ?>
                                        <li> 
                                            <?php if ($halaman < $totalHalaman): ?>
                                                <a
                                                    href="?route=jurnal&page=<?= $halaman + 1; ?>"
                                                    class="flex items-center justify-center px-3.5 h-9 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                                    Next
                                                    <i class="bx bx-chevron-right"></i>
                                                </a>
                                            <?php else: ?>
                                                <span
                                                    class="flex items-center justify-center px-3.5 h-9 rounded-lg text-gray-400 opacity-50 cursor-not-allowed" >
                                                    Next
                                                    <i class="bx bx-chevron-right"></i>
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        <?php endif; ?>

            <div id="global-modal" class="hidden fixed inset-0 z-[9999] items-center justify-center w-full p-4 sm:p-6 overflow-y-auto bg-gray-950/60 backdrop-blur-[2px]">

    <div class="relative w-full max-w-xl my-auto">

        <div class="relative bg-white border border-gray-200 rounded-lg shadow-xl p-5 sm:p-8 max-h-[calc(100vh-2rem)] overflow-y-auto">

            <div class="mb-6 sm:mb-8 flex justify-between items-start sm:items-center gap-4">

                <div class="flex items-center gap-3 sm:gap-4 min-w-0">

                    <div class="globalModalIconContainer flex w-12 h-12 rounded-lg bg-primary items-center justify-center shrink-0 shadow-sm">
                        <i id="globalModalIcon" class="bx bx-book-content text-2xl text-white"></i>
                    </div>

                    <div class="min-w-0">

                        <h1 id="globalModalTitle" class="text-gray-900 font-black text-xl sm:text-2xl leading-tight">
                            Tambah Catatan Jurnal
                        </h1>

                        <p id="globalModalSubtitle" class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                            Catat pemasukan atau pengeluaran keuangan.
                        </p>

                    </div>

                </div>

                <button
                    type="button"
                    onclick="closeGlobalModal()"
                    title="Tutup"
                    class="flex items-center justify-center w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-gray-100 text-gray-500 hover:text-white hover:bg-primary font-black cursor-pointer transition-colors shrink-0"
                >
                    <i class="bx bx-x text-2xl"></i>
                </button>

            </div>


            <form id="globalModalForm" action="" method="POST" class="w-full">

                <input type="hidden" id="id" name="id">

                <div class="grid grid-cols-1 gap-x-6 gap-y-5">

                    <div class="flex flex-col gap-1.5 w-full form-group">

                        <label for="tanggal" class="label-field text-[11px] sm:text-xs font-bold uppercase tracking-wide text-gray-600 ml-1 transition-colors">
                            Tanggal <span class="text-red-500">*</span>
                        </label>

                        <div class="relative flex items-center w-full group">

                            <div class="icon-field absolute left-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                <i class="bx bxs-calendar text-xl sm:text-lg"></i>
                            </div>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="w-full pl-10 sm:pl-11 pr-4 py-3 bg-white text-gray-900 text-sm font-medium rounded-lg border-2 focus:border-primary border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary transition-all"
                                required
                            >

                        </div>

                    </div>


                    <div class="flex flex-col gap-1.5 w-full form-group">

                        <label for="harga" class="label-field text-[11px] sm:text-xs font-bold uppercase tracking-wide text-gray-600 ml-1 transition-colors">
                            Jumlah Transaksi (Rp) <span class="text-red-500">*</span>
                        </label>

                        <div class="relative flex items-center w-full group">

                            <div class="icon-field absolute left-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                <i class="bx bxs-wallet text-xl sm:text-lg"></i>
                            </div>

                            <input
                                type="number"
                                name="harga"
                                id="harga"
                                min="1"
                                step="1"
                                placeholder="Contoh: 50000"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                                autocomplete="off"
                                class="w-full pl-10 sm:pl-11 pr-4 py-3 bg-white text-gray-900 text-sm font-medium rounded-lg border-2 focus:border-primary border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary transition-all"
                                required
                            >

                        </div>

                    </div>


                    <div class="flex flex-col gap-1.5 w-full form-group">

                        <label for="keterangan" class="label-field text-[11px] sm:text-xs font-bold uppercase tracking-wide text-gray-600 ml-1 transition-colors">
                            Keterangan <span class="text-red-500">*</span>
                        </label>

                        <div class="relative flex items-start w-full group">

                            <div class="icon-field absolute left-3.5 top-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors duration-200">
                                <i class="bx bxs-note text-xl sm:text-lg"></i>
                            </div>

                            <textarea
                                name="keterangan"
                                id="keterangan"
                                rows="4"
                                maxlength="500"
                                placeholder="Jelaskan keperluan transaksi, misalnya pembelian gas atau bahan baku."
                                class="w-full pl-10 sm:pl-11 pr-4 py-3 bg-white text-gray-900 text-sm font-medium rounded-lg border-2 focus:border-primary border-gray-200 focus:outline-none focus:ring-1 focus:ring-primary transition-all resize-y"
                                required
                            ></textarea>

                        </div>

                    </div>

                </div>


                <div class="w-full flex flex-col-reverse sm:flex-row justify-end mt-6 sm:mt-8 pt-5 border-t border-gray-100 gap-3">

                    <button
                        type="button"
                        onclick="closeGlobalModal()"
                        class="w-full sm:w-auto flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-6 py-3 gap-2 rounded-lg cursor-pointer transition-all active:scale-95"
                    >
                        <span>Batal</span>
                    </button>

                    <button
                        id="globalModalSubmit"
                        type="submit"
                        name="aksi"
                        value="tambah"                            
                        class="w-full sm:w-auto flex items-center justify-center bg-primary hover:bg-primary/90 text-white font-black px-6 py-3 gap-2 rounded-lg cursor-pointer transition-all active:scale-95"
                    >
                        <i id="globalModalSubmitIcon" class="bx bxs-save text-lg"></i>
                        <span id="globalModalSubmitText">Simpan Catatan</span>
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
     const formCariPengeluaran = document.getElementById('formCariPengeluaran');
    const searchPengeluaran = document.getElementById('searchPengeluaran');
    const input = document.getElementById('harga');

    input.addEventListener('input', function () {
   if(this.value.startsWith('0')) {
      this.value = '';
   }
});


    let typingTimer;

    searchPengeluaran.addEventListener('input', function() {
        clearTimeout(typingTimer);

    typingTimer = setTimeout(function () {
        formCariPengeluaran.submit();
    }, 500);
    });
   
    
function modalEdit(btn){
      $('#id').val(btn.dataset.id);
      $('#tanggal').val(btn.dataset.tanggal);
      $('#harga').val(btn.dataset.harga);
      $('#keterangan').val(btn.dataset.keterangan);
    }
</script>

    
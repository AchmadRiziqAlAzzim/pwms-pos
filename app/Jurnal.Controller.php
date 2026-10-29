<?php 

function pagipengeluaran() {
    global $conn;

    $keyword = trim($_GET['keyword'] ?? '');
    $tanggalMulai = $_GET['tanggal_mulai'] ?? '';
    $tanggalSampai = $_GET['tanggal_sampai'] ?? '';

    $halaman = max(1, (int) ($_GET['page'] ?? 1));
    $perHalaman = 5;

    $kondisi = [];

    // Filter pencarian
    if ($keyword !== '') {
        $keywordEscaped = mysqli_real_escape_string($conn, $keyword);

        $kondisi[] = "(
            tanggal LIKE '%$keywordEscaped%'
            OR harga LIKE '%$keywordEscaped%'
            OR keterangan LIKE '%$keywordEscaped%'
        )";
    }

    // Filter tanggal mulai
    if ($tanggalMulai !== '') {
        $tanggalMulaiEscaped = mysqli_real_escape_string($conn, $tanggalMulai);

        $kondisi[] = "tanggal >= '$tanggalMulaiEscaped'";
    }

    // Filter tanggal sampai
    if ($tanggalSampai !== '') {
        $tanggalSampaiEscaped = mysqli_real_escape_string($conn, $tanggalSampai);

        $kondisi[] = "tanggal <= '$tanggalSampaiEscaped'";
    }

    // Gabungkan filter pencarian dan tanggal
    $where = '';

    if (!empty($kondisi)) {
        $where = ' WHERE ' . implode(' AND ', $kondisi);
    }

    // Hitung total data berdasarkan semua filter
    $sqlTotal = "
        SELECT COUNT(*) AS total
        FROM pengeluaran
        $where
    ";

    $resultTotal = query($sqlTotal);
    $dataTotal = mysqli_fetch_assoc($resultTotal);

    $totalData = (int) ($dataTotal['total'] ?? 0);
    $totalHalaman = max(1, (int) ceil($totalData / $perHalaman));

    if ($halaman > $totalHalaman) {
        $halaman = $totalHalaman;
    }

    $offset = ($halaman - 1) * $perHalaman;

    // Ambil data berdasarkan filter yang sama
    $sql = "
        SELECT *
        FROM pengeluaran
        $where
        ORDER BY tanggal DESC, id_pengeluaran DESC
        LIMIT $offset, $perHalaman
    ";

    $result = query($sql);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    $GLOBALS['paginationPengeluaran'] = [
        'halaman' => $halaman,
        'perHalaman' => $perHalaman,
        'totalData' => $totalData,
        'totalHalaman' => $totalHalaman
    ];

    return $rows;
}





function getpengeluaran() {
    global $conn;

    $tanggalMulai = $_GET['tanggal_mulai'] ?? '';
    $tanggalSampai = $_GET['tanggal_sampai'] ?? '';

    $kondisi = [];

    if ($tanggalMulai !== '') {
        $mulai = mysqli_real_escape_string($conn, $tanggalMulai);
        $kondisi[] = "tanggal >= '$mulai'";
    }

    if ($tanggalSampai !== '') {
        $sampai = mysqli_real_escape_string($conn, $tanggalSampai);
        $kondisi[] = "tanggal <= '$sampai'";
    }


    if (!empty($kondisi)) {
        $where = implode(' AND ', $kondisi);
    } else {
  
        $where = "MONTH(tanggal) = MONTH(CURDATE())
                  AND YEAR(tanggal) = YEAR(CURDATE())";
    }

    $q = mysqli_query(
        $conn,
        "SELECT COALESCE(SUM(harga), 0) AS total
         FROM pengeluaran
         WHERE $where"
    );

    return (int) (mysqli_fetch_assoc($q)['total'] ?? 0);
}

function getpendapatanbackup() {
    global $conn;

    $tanggalMulai = $_GET['tanggal_mulai'] ?? '';
    $tanggalSampai = $_GET['tanggal_sampai'] ?? '';

    $kondisi = [];

    if ($tanggalMulai !== '') {
        $mulai = mysqli_real_escape_string($conn, $tanggalMulai);
        $kondisi[] = "tanggal >= '$mulai'";
    }

    if ($tanggalSampai !== '') {
        $sampai = mysqli_real_escape_string($conn, $tanggalSampai);
        $kondisi[] = "tanggal <= '$sampai'";
    }


    if (!empty($kondisi)) {
        $where = implode(' AND ', $kondisi);
    } else {
  
        $where = "MONTH(tanggal) = MONTH(CURDATE())
                  AND YEAR(tanggal) = YEAR(CURDATE())";
    }

    $q = mysqli_query(
        $conn,
        "SELECT COALESCE(SUM(total), 0) AS total
         FROM transaksi
         WHERE status_pembayaran = 2 AND $where"
    );

    return (int) (mysqli_fetch_assoc($q)['total'] ?? 0);
}

function getpendapatan() {
    global $conn;
    $q = mysqli_query($conn, "SELECT SUM(total) AS total FROM transaksi WHERE status_pembayaran = 2 AND MONTH(tanggal) = MONTH(CURDATE())");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}
function totaltransaksi() {
    global $conn;
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi WHERE MONTH(tanggal) = MONTH(CURDATE()) ");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}
function totalpengeluaran() {
    global $conn;
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengeluaran WHERE MONTH(tanggal) = MONTH(CURDATE()) ");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}

function tambahPengeluaran($d)
{
    global $conn;

    $t = trim($d['tanggal'] ?? '');
    $h = (int) str_replace('.', '', trim($d['harga'] ?? '0'));
    $k = trim($d['keterangan'] ?? '');

   
    if (empty($t) || $h <= 0 || empty($k)) {
        return [
            'bg' => 'error',
            'pesan' => 'Tanggal, harga, dan keterangan wajib diisi.'
        ];
    }

   
    $t = mysqli_real_escape_string($conn, $t);
    $k = mysqli_real_escape_string($conn, $k);

    $q = query("
        INSERT INTO pengeluaran (tanggal, harga, keterangan)
        VALUES ('$t', $h, '$k')
    ");

    if ($q) {
        return [
            'bg' => 'success',
            'pesan' => 'Pengeluaran berhasil ditambahkan.'
        ];
    }

    return [
        'bg' => 'error',
        'pesan' => 'Pengeluaran gagal ditambahkan. Harap coba lagi.'
    ];
}
function editPengeluaran($d)
{
    global $conn;

    $id = (int) ($d['id'] ?? 0);
    $t = trim($d['tanggal'] ?? '');
    $h = (int) str_replace('.', '', trim($d['harga'] ?? '0'));
    $k = trim($d['keterangan'] ?? '');

    if ($id <= 0 || empty($t) || $h <= 0 || empty($k)) {
        return [
            'bg' => 'error',
            'pesan' => 'Data pengeluaran tidak valid atau belum lengkap.'
        ];
    }

    $t = mysqli_real_escape_string($conn, $t);
    $k = mysqli_real_escape_string($conn, $k);

   
    $cek = query("
        SELECT id_pengeluaran
        FROM pengeluaran
        WHERE id_pengeluaran = $id
    ");

    if (!$cek || mysqli_num_rows($cek) === 0) {
        return [
            'bg' => 'error',
            'pesan' => 'Data pengeluaran tidak ditemukan.'
        ];
    }

    $q = query("
        UPDATE pengeluaran
        SET
            tanggal = '$t',
            harga = $h,
            keterangan = '$k'
        WHERE id_pengeluaran = $id
    ");

    if ($q) {
        return [
            'bg' => 'success',
            'pesan' => 'Pengeluaran berhasil diperbarui.'
        ];
    }

    return [
        'bg' => 'error',
        'pesan' => 'Pengeluaran gagal diperbarui. Harap coba lagi.'
    ];
}
function hapusPengeluaran($d)
{
    global $conn;

    $id = (int) ($d['id'] ?? $d['id'] ?? 0);

    if ($id <= 0) {
        return [
            'bg' => 'error',
            'pesan' => 'Data pengeluaran tidak valid.'
        ];
    }

   
    $cek = query("
        SELECT id_pengeluaran
        FROM pengeluaran
        WHERE id_pengeluaran = $id
    ");

    if (!$cek || mysqli_num_rows($cek) === 0) {
        return [
            'bg' => 'error',
            'pesan' => 'Data pengeluaran tidak ditemukan.'
        ];
    }

    $q = query("
        DELETE FROM pengeluaran
        WHERE id_pengeluaran = $id
    ");

    if ($q) {
        return [
            'bg' => 'success',
            'pesan' => 'Pengeluaran berhasil dihapus.'
        ];
    }

    return [
        'bg' => 'error',
        'pesan' => 'Pengeluaran gagal dihapus. Harap coba lagi.'
    ];
}

if (isset($_POST['aksi']) && $_POST['aksi'] === 'tambah') {
    $hasil = tambahPengeluaran($_POST);
    $_SESSION['toast'] = $hasil;

    header("Location: ?route=jurnal");
    exit;
}
if (isset($_POST['aksi']) && $_POST['aksi'] === 'edit') {
    $hasil = editPengeluaran($_POST);
    $_SESSION['toast'] = $hasil;

    header("Location: ?route=jurnal");
    exit;
}
if (isset($_POST['aksi']) && $_POST['aksi'] === 'hapus') {
    $hasil = hapusPengeluaran($_POST);
    $_SESSION['toast'] = $hasil;

    header("Location: ?route=jurnal");
    exit;
}
$hasil = $_SESSION['toast'] ?? null;
unset($_SESSION['toast']);

$uangbersih = getpendapatan() - getpengeluaran();
$uangpengeluaran =getpengeluaran();
$uangpendaptan = getpendapatanbackup();  
$uangpendapatan = getpendapatan();
$totaltransaksi = totaltransaksi();
$totalpengeluaran = totalpengeluaran();
$tanggalMulai = $_GET['tanggal_mulai'] ?? '';
$tanggalSampai = $_GET['tanggal_sampai'] ?? '';
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$pengeluaran = pagipengeluaran();

$pagination = $paginationPengeluaran;
$halaman = $pagination['halaman'];
$totalHalaman = $pagination['totalHalaman'];
$no = (($halaman - 1) * $pagination['perHalaman']) + 1;
?>

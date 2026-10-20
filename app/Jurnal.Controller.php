<?php 

function pagipengeluaran() {
    global $conn;
    $keyword = isset($_GET['keyword'])
        ? trim($_GET['keyword'])
        : '';
    $halaman = isset($_GET['page'])
        ? (int) $_GET['page']
        : 1;

    if ($halaman < 1) {
        $halaman = 1;
    }
    $perHalaman = 5;
    $offset = ($halaman - 1) * $perHalaman;
    $sql = "SELECT * FROM pengeluaran ";
    if (!empty($keyword)) {
        $keywordEscaped = mysqli_real_escape_string($conn, $keyword);

        $sql .= " WHERE tanggal LIKE '%$keywordEscaped%' OR harga LIKE '%$keywordEscaped%' OR keterangan LIKE '%$keywordEscaped%'";

    }
    $sql .= " ORDER BY tanggal DESC, id_pengeluaran DESC";
    $sqlTotal = "SELECT COUNT(*) AS total FROM pengeluaran";
     if (!empty($keyword)) {
        $keywordEscaped = mysqli_real_escape_string($conn, $keyword);

        $sqlTotal .= " WHERE tanggal LIKE '%$keywordEscaped%' OR harga LIKE '%$keywordEscaped%' OR keterangan LIKE '%$keywordEscaped%'";

    }
    $resultTotal = query($sqlTotal);
    $dataTotal = mysqli_fetch_assoc($resultTotal);
    $totalData = (int) $dataTotal['total'];
    $totalHalaman = max(1, ceil($totalData / $perHalaman));
    if ($halaman > $totalHalaman) {
        $halaman = $totalHalaman;

        $offset = ($halaman - 1) * $perHalaman;
    }
    $sql .= " LIMIT $offset, $perHalaman";
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

function getuangbersih(){
global $conn;
$n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(harga) t FROM pengeluaran"))['t'];
$k = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) t FROM transaksi WHERE status_pembayaran = 2"))['t'];
return ($k??0)-($n??0);
}

function getpengeluaran() {
    global $conn;
    $q = mysqli_query($conn, "SELECT SUM(harga) AS total FROM pengeluaran ");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}
function getpendapatan() {
    global $conn;
    $q = mysqli_query($conn, "SELECT SUM(total) AS total FROM transaksi WHERE status_pembayaran = 2 ");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}
function totaltransaksi() {
    global $conn;
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi ");
    return mysqli_fetch_assoc($q)['total'] ?? 0;
}
function totalpengeluaran() {
    global $conn;
    $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pengeluaran ");
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

$uangbersih = getuangbersih();
$uangpengeluaran =getpengeluaran();
$uangpendaptan = getpendapatan();  
$totaltransaksi = totaltransaksi();
$totalpengeluaran = totalpengeluaran();
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$pengeluaran = pagipengeluaran();

$pagination = $paginationPengeluaran;
$halaman = $pagination['halaman'];
$totalHalaman = $pagination['totalHalaman'];
$no = (($halaman - 1) * $pagination['perHalaman']) + 1;
?>

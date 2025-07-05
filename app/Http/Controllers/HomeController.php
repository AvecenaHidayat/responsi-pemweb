use App\Models\Transaksi;

$totalPemasukan = Transaksi::where('user_id', auth()->id())->where('tipe', 'pemasukan')->sum('jumlah');
$totalPengeluaran = Transaksi::where('user_id', auth()->id())->where('tipe', 'pengeluaran')->sum('jumlah');

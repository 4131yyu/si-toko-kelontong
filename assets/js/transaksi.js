$(function () {

    function formatRupiah(angka) {
        return 'Rp ' + Number(angka || 0).toLocaleString('id-ID');
    }

    function parseRupiah(text) {
        return Number(String(text || '0').replace(/[^0-9]/g, '')) || 0;
    }

    function updateRow(row) {
        var $row = $(row);
        var $select = $row.find('.select-produk');
        var $option = $select.find('option:selected');

        var harga = Number($option.data('harga')) || 0;
        var stok = Number($option.data('stok')) || 0;
        var $jumlahInput = $row.find('.input-jumlah');
        var jumlah = parseInt($jumlahInput.val()) || 0;

        // Validasi: jumlah tidak boleh melebihi stok yang tersedia
        if (stok > 0 && jumlah > stok) {
            jumlah = stok;
            $jumlahInput.val(stok);
        }

        var subtotal = harga * jumlah;

        $row.find('.stok-cell').text($select.val() !== '' ? stok : '-');
        $row.find('.harga-cell').text(formatRupiah(harga));
        $row.find('.subtotal-cell').text(formatRupiah(subtotal));

        return subtotal;
    }

    function updateTotal() {
        var total = 0;
        $('#tabel-item .item-row').each(function () {
            total += updateRow(this);
        });

        $('#total-belanja').text(formatRupiah(total));
        updateKembalian(total);
        return total;
    }

    function updateKembalian(total) {
        var bayar = parseFloat($('#input-bayar').val()) || 0;
        var kembalian = bayar - total;
        $('#kembalian').text(formatRupiah(kembalian > 0 ? kembalian : 0));
        $('#kembalian').toggleClass('text-danger', kembalian < 0);
    }

    function bindRow($row) {
        $row.find('.select-produk').on('change', function () {
            updateTotal();
        });

        $row.find('.input-jumlah').on('input', function () {
            updateTotal();
        });

        $row.find('.btn-hapus-row').on('click', function () {
            if ($('.item-row').length > 1) {
                $row.remove();
                updateTotal();
            } else {
                alert('Minimal harus ada 1 item transaksi!');
            }
        });
    }
})
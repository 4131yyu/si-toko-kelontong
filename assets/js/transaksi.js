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
})
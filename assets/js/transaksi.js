$(function () {

    function formatRupiah(angka) {
        return 'Rp ' + Number(angka || 0).toLocaleString('id-ID');
    }

    function parseRupiah(text) {
        return Number(String(text || '0').replace(/[^0-9]/g, '')) || 0;
    }

    function resetRow($row) {
        $row.find('.select-produk').val('');
        $row.find('.input-jumlah').val(1);

        $row.find('.stok-cell').text('-');
        $row.find('.harga-cell').text(formatRupiah(0));
        $row.find('.subtotal-cell').text(formatRupiah(0));
    }

    function updateRow(row) {
        var $row = $(row);
        var $select = $row.find('.select-produk');
        var $option = $select.find('option:selected');

        var harga = Number($option.data('harga')) || 0;
        var stok = Number($option.data('stok')) || 0;
        var $jumlahInput = $row.find('.input-jumlah');
        var jumlah = parseInt($jumlahInput.val(), 10) || 1;

        if (jumlah < 1) {
            jumlah = 1;
            $jumlahInput.val(1);
        }

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
        $('#kembalian')
            .text(formatRupiah(kembalian > 0 ? kembalian : 0))
            .toggleClass('text-danger', kembalian < 0);
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
            resetRow($row);
            updateTotal();
        });
    }

    function addRow() {

        var $newRow = $('.item-row:first').clone();
        resetRow($newRow);
        $('#tabel-item tbody').append($newRow);
        bindRow($newRow);
        updateTotal();
    }

    function resetTransaksi() {

        if (!confirm('Reset semua pilihan transaksi?')) {
            return;
        }

        $('.item-row').each(function (index) {
            if (index === 0) {
                resetRow($(this));
                return;
            }
            $(this).remove();
        });

        $('#input-bayar').val('');
        updateTotal();
    }

    $('.item-row').each(function () {
        bindRow($(this));
    });

    $('#btn-tambah-row').on('click', addRow);

    $('#btn-reset-row').on('click', resetTransaksi);

    $('#input-bayar').on('input', function () {
        var total = parseRupiah($('#total-belanja').text());
        updateKembalian(total);
    });

    $('#form-transaksi').on('submit', function (e) {
        var total = parseRupiah($('#total-belanja').text());
        var bayar = parseFloat($('#input-bayar').val()) || 0;

        if (total <= 0) {
            alert('Total belanja tidak boleh nol! Pilih produk terlebih dahulu.');
            e.preventDefault();
            return false;
        }
        if (bayar < total) {
            alert('Nominal bayar kurang dari total belanja!');
            e.preventDefault();
            return false;
        }
        return true
    });

    updateTotal();
})
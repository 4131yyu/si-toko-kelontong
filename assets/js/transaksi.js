$(function () {

    function formatRupiah(angka) {
        return 'Rp ' + Number(angka || 0).toLocaleString('id-ID');
    }

    function parseRupiah(text) {
        return Number(String(text || '0').replace(/[^0-9]/g, '')) || 0;
    }
})
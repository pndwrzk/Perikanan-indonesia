$('.hapus-varian').on('click', function() {
    const id = $(this).data('id_varian');
    console.log(id);
    $('.id_varian').val(id);
});

$('.ubah-varian').on('click', function() {
    const id = $(this).data('id_varian');
    const nama = $(this).data('nama_varian');
    const harga = $(this).data('harga');
    $('.id_varian_edit').val(id);
    $('.nama_varian_edit').val(nama);
    $('.harga_varian_edit').val(harga);
});


$('.ubah-pelanggan').on('click', function() {
    const kd_pelanggan = $(this).data('kd_pelanggan');
    const nm_pelanggan = $(this).data('nm_pelanggan');
    const jenis = $(this).data('jenis');
    const telepon = $(this).data('telepon');



    $('.kode_pelanggan').val(kd_pelanggan);
    $('.nama_pelanggan').val(nm_pelanggan);
    if (jenis == 2) {
        $('.jenis_perusahaan').prop('checked', true);
    } else if (jenis == 1) {
        $('.jenis_rumahan').prop('checked', true);
    }
    $('.telepon_pelanggan').val(telepon);
});

$('.hapus-pelanggan').on('click', function() {
    const kd_pelanggan = $(this).data('kd_pelanggan');
    console.log(kd_pelanggan);
    $('.kd_pelanggan').val(kd_pelanggan);
});

$('.detail_pemesanan').on('click', function() {

    const kd_nota = $(this).data('kd_nota');
    const ppn = $(this).data('ppn');

    $.ajax({
        type: 'post',
        url: '/Laporan/detailpemesanan',
        data: {
            'kd_nota': kd_nota,
        },
        dataType: 'Json',
        success: function(respone) {

            console.log(respone.detail[0]['nm_varian']);
            let tabel = '';
            let no = 1;
            let total = 0
            for (let i = 0; i < respone.detail.length; i++) {
                console.log(respone.detail[i]['nm_varian']);
                tabel += '<tr><td>' + no++ + '</td><td>' + respone.detail[i]['nm_varian'] + '</td><td>Rp.' + rupiah(respone.detail[i]['harga']) + '</td>' +
                    '<td>' + respone.detail[i]['jumlah'] + '</td><td>Rp.' + rupiah(respone.detail[i]['jumlah'] * respone.detail[i]['harga']) + '</td></tr>';

                total = total + (respone.detail[i]['harga'] * respone.detail[i]['jumlah'])
                $('.detail-pemesanan').html(tabel);




            }
            // $ppn = ($pelanggan['ppn'] / 100) * $total;
            // $Grandtotal = $total + $ppn;
            // return $Grandtotal;
            let ppn_ = (ppn / 100) * total;
            let $Grandtotal = total + ppn_;
            $('#judul-pemesanan').text('Detail nota NP-' + kd_nota);
            console.log(ppn, $Grandtotal);
            $('.ppn-detail').text(ppn + '%');
            $('.grandtotal-detail').text('Rp.' + rupiah($Grandtotal))
        }
    });
});

function rupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}



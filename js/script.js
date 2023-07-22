$(document).ready(function() {
    // hilangkan tombol cari
    $('#tombol-cari').hide();

    // event ketika keyword ditulsi
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/siswa.php?keyword=' + $('#keyword').val(), (data) => {
            $('#container').html(data);
            $('.loader').hide();
        });
    })
})
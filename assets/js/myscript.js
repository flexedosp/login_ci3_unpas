//Variabel Global

var base_url = "http://localhost/login_ci3/";

//End of Variabel Global

$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: base_url + "admin/changeaccess",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = base_url + "admin/roleaccess" + roleId;
        }
    });

});

$('.formModalTambah').on('click', function(){
    $('#formMenuModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('#id').val('');
    $('#menu').val('');
});

$('.editMenuModal').on('click', function(){
//get right here
    $('#formMenuModalLabel').html('Edit Data Menu');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-content form').attr('action', base_url + '/menu/editMenu');

    const id = $(this).data('id');

    $.ajax({
            url: base_url + 'menu/editdatamenu',
            data: {id : id}, // id sebelah kiri adalah data yang akan dikirimkan. Sedangkan id sebelah kanan adalah isi datanya.
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#menu').val(data.menu);
            }
    });
});
$('.editSubmenuModal').on('click', function(){
//get right here
    $('#formMenuModalLabel').html('Edit Sub Menu');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-content form').attr('action', base_url + '/menu/edit');

    const id = $(this).data('id');

    $.ajax({
            url: base_url + 'menu/editdatamenu',
            data: {id : id}, // id sebelah kiri adalah data yang akan dikirimkan. Sedangkan id sebelah kanan adalah isi datanya.
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#menu').val(data.menu);
            }
    });
});


$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Are You Sure?',
        text: "You cannot undo this after you delete it!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete it!',
        cancelButtonText: "Cancel!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});

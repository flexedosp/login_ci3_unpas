//Variabel Global

var base_url = "http://localhost/login_ci3/";
var clicked = 0;

//End of Variabel Global

$('#sidebarToggle').on('click', function(){
   
   if(clicked == 0){
       
    $('.nav-link span').hide();
    clicked = 1;
}else{
    $('.nav-link span').show();
    clicked = 0;

   }
    
});


$('#showCurrentPassword').on('click', function(){
    $('#currentPassword').attr('type', 'text');
    $('#showCurrentPassword i').attr('class', 'fas fa-fw fa-eye-slash');
});


$('.custom-file-input').on('change', function(){
    let fileName = $(this).val();
    $(this).next('.custom-file-label').addClass("selected").html(fileName.split('\\').pop());
    // $('.img-upload').attr('src', fileName);
    // alert(fileName);
});

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
    $('#formMenuModalLabel').html('Add Submenu');
    $('.modal-footer button[type=submit]').html('Add');
    $('#id').val('');
    $('#menu').val('');
    
});

$('.addNewSubmenuModal').on('click', function(){
    $('#formMenuModalLabel').html('Add Menu');
    $('.modal-footer button[type=submit]').html('Add');
    
    $('#id').val('');
    $('#menu_id').val('');
    $('#title').val('');
    $('#url').val('');
    $('#icon').val('');
    // $('#is_active').val('');
});


$('.editMenuModal').on('click', function(){
//get right here
    $('#formMenuModalLabel').html('Edit Data Menu');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-content form').attr('action', base_url + 'menu/editMenu');

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
    $('.modal-content form').attr('action', base_url + 'menu/editSubmenu');

    const id = $(this).data('id');

    $.ajax({
            url: base_url + 'menu/editDataSubmenu',
            data: {id : id}, // id sebelah kiri adalah data yang akan dikirimkan. Sedangkan id sebelah kanan adalah isi datanya.
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id);
                $('#menu_id').val(data.menu_id);
                $('#title').val(data.title);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').prop('checked', function(){
                    if(data.is_active == 1){
                        return true;
                    }else{
                        return false;
                    }
                });
            }
    });
});


$('.deleteButton').on('click', function(e) {
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

$(function (){
    $('.delete').click(function() {

        Swal.fire({
            title: 'Czy chcesz usunąć ?',
            text: "Czy chcesz trwale usunąć rekord ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tak usuwam!',
            cancelButtonText: 'Nie usuwam!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: urldelete +$(this).data("id"),

                })
                    .done(function( data ) {


                        Swal.fire(
                            'Usuniety!',
                            'Rekord został usuniety.',
                            'Ok'
                        )
                        window.location.reload();
                    })
                    .fail(function( data ) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'cos poszlo nie tak'+data.responseJSON.message,

                        })
                    });

            }
        })

    });
});

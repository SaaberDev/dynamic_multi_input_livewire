<script>
    window.addEventListener('success',function(e){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'success',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire(e.detail)
    });

    window.addEventListener('modal', function(e){
        Swal.fire({
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        })
            .then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteConfirmed', e.detail.id);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    // window.addEventListener('DOMContentLoaded', function(){
    //     Livewire.on('triggerDelete', function() {
    //         Swal.fire({
    //             title: 'Are you sure?',
    //             text: "You won't be able to revert this!",
    //             icon: 'warning',
    //             showCancelButton: true,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Yes, delete it!',
    //         }).then((result) => {
    //                 // result.stopImmediatePropagation();
    //                 if (result.isConfirmed) {
    //                     Livewire.on('destroy')
    //                     Swal.fire(
    //                         'Deleted!',
    //                         'Your file has been deleted.',
    //                         'success'
    //                     )
    //                 }
    //             })
    //     });
    // })
</script>

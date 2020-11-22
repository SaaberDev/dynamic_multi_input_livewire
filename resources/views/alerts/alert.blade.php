<script>
    window.addEventListener('add-faq',function(e){
        Swal.fire(e.detail);
    });

    window.addEventListener('edit-faq',function(e){
        Swal.fire(e.detail);
    });
</script>


{{--@if(Session::has('message'))
    /*****
    * Declare Alert Type
    */
    const type = "{{ Session::get('alert-type', 'message') }}"
    /*****
    * Switch case condition
    */
    switch (type){
    case 'success_toast':
    const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
    Toast.fire({
    icon: 'success',
    title: "{{ Session::get('message') }}"
    })
    break
    }
@endif--}}

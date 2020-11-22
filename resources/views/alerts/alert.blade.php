{{--<script>
    window.addEventListener('add-faq',function(e){
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

    window.addEventListener('edit-faq',function(e){
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
</script>--}}


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


<script>
    const SwalModal = (icon, title, html) => {
        Swal.fire({
            icon,
            title,
            html
        })
    }

    const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
        Swal.fire({
            icon,
            title,
            html,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText,
            reverseButtons: true,
        }).then(result => {
            if (result.value) {
                return livewire.emit(method, params)
            }

            if (callback) {
                return livewire.emit(callback)
            }
        })
    }

    const SwalAlert = (icon, title, timeout = 7000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            timer: timeout,
            onOpen: toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon,
            title
        })
    }

    document.addEventListener('DOMContentLoaded', () => {
        this.livewire.on('swal:modal', data => {
            SwalModal(data.icon, data.title, data.text)
        })

        this.livewire.on('swal:confirm', data => {
            SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
        })

        this.livewire.on('swal:alert', data => {
            SwalAlert(data.icon, data.title, data.timeout)
        })
    })
</script>

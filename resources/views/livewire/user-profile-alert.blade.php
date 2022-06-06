    {{-- Success is as dangerous as failure. --}}
    <a class="w-100 btn btn-danger mt-3" wire:click="$emit('triggerDelete',{{ $userId }})">
            Hapus Akun
    </a>

    @push('scripts3')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', userId => {
                Swal.fire({
                    title: 'Apa Anda Yakin?',
                    text: 'Akun ini akan dihapus',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya Hapus!'
                }).then((result) => {
             //if user clicks on delete
                    if (result.value) {
                 // calling destroy method to delete
                        @this.call('destroy', userId)
                 // success response
                        Swal.fire({
                            title: 'Hapus Akun Sukses!', 
                            text: 'Akun ini telah dihapus', icon: 'success',
                            showConfirmButton: true,
                            timer: 2500
                        });
                    } else {
                        Swal.fire({
                            title: 'Hapus Akun Dibatalkan!',
                            text: 'Akun ini tidak dihapus',
                            icon: 'error',
                            timer: 2500
                        });
                    }
                });
            });
        })
    </script>
    @endpush
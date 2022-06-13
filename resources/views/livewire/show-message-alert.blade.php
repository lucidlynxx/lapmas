    {{-- Care about people's approval and you will be their prisoner. --}}
    <a class="d-sm-inline-block btn btn-sm btn-danger shadow-sm" wire:click="$emit('triggerDelete',{{ $messageId }})"><i
        class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>
    
    @push('scripts5')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', messageId => {
                Swal.fire({
                    title: 'Apa Anda Yakin?',
                    text: 'Data Pemberitahuan akan dihapus',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya Hapus!'
                }).then((result) => {
             //if user clicks on delete
                    if (result.value) {
                 // calling destroy method to delete
                        @this.call('destroy', messageId)
                 // success response
                        Swal.fire({
                            title: 'Hapus Data Sukses!', 
                            text: 'Data Pemberitahuan telah dihapus', icon: 'success',
                            showConfirmButton: true,
                            timer: 2500
                        });
                    } else {
                        Swal.fire({
                            title: 'Hapus Data Dibatalkan!',
                            text: 'Data Pemberitahuan tidak dihapus',
                            icon: 'error',
                            timer: 2500
                        });
                    }
                });
            });
        })
    </script>
    @endpush

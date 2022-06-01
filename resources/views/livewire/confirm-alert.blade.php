    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <a class="btn btn-danger border-0 d-inline inline-flex ml-1" wire:click="$emit('triggerDelete',{{ $reportId }})">
            <span class="icon text-white-100">
                <i class="fas fa-trash"></i>
            </span>
        </a>
    
    @push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', reportId => {
                Swal.fire({
                    title: 'Apa Anda Yakin?',
                    text: 'Data laporan akan dihapus',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya Hapus!'
                }).then((result) => {
             //if user clicks on delete
                    if (result.value) {
                 // calling destroy method to delete
                        @this.call('destroy', reportId)
                 // success response
                        Swal.fire({
                            title: 'Hapus Data Sukses!', 
                            text: 'Data laporan telah dihapus', icon: 'success',
                            showConfirmButton: true,
                            timer: 2500
                        });
                    } else {
                        Swal.fire({
                            title: 'Hapus Data Dibatalkan!',
                            text: 'Data laporan tidak dihapus',
                            icon: 'error',
                            timer: 2500
                        });
                    }
                });
            });
        })
    </script>
    @endpush
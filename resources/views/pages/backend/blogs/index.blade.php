@extends('layouts/layoutMaster')

@section('title', 'Blogs')

@section('content')
<h5 class="py-3 mb-2">
    <span class="text-muted fw-light">Dashboard /</span> Blogs
</h5>
<!-- DataTable with Buttons -->
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between flex-column flex-sm-row">
            <div class="mb-1 mb-sm-0 text-center text-sm-start">
                <h4 class="card-title">Table Blogs</h4>
            </div>
            <div>
                <div class="d-flex justify-content-sm-end flex-column flex-sm-row gap-1">
                    {{-- Start Button for Create New Blog --}}
                    <x-link-button color="primary btn-sm me-sm-1 mb-2 mb-sm-0" icon="tf-icons fas fa-plus-circle ti-xs me-1">
                        &nbsp; Add new Blog
                    </x-link-button>
                    {{-- End Button for Create New Blog --}}

                    {{-- Start Button for Delete Batch --}}
                    <x-button type="button" color="label-danger btn-sm" onclick="confirmDeleteBatch()">
                        <i class="tf-icons fas fa-trash-alt ti-xs me-1"></i>&nbsp; Mass Delete
                    </x-button>
                    {{-- End Button for Delete Batch --}}
                    {{-- Start Save To Excel Student --}}
                    {{-- @livewire('backend.student.save-to-excel') --}}
                    {{-- End Save To Excel Student --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Start List DataTable --}}
    <div class="card-body">

        @livewire('backend.blog.cards')
    </div>
    {{-- End List DataTable --}}

    @push('scripts')
    {{-- <script src="{{ asset('assets/datatable/datatables.min.js') }}" defer></script>
    @vite([
    'resources/assets/js/students-management.js'
    ])
    <script>
        function confirmDeleteBatch() {
            // Ambil semua studentId yang dicentang
            let studentIds = Array.from(document.querySelectorAll('.students-checkbox:checked')).map(el => el.value);

            if (studentIds.length > 0) {
                showSwalDialog('Apakah Anda yakin?', 'Anda tidak akan bisa mengembalikan data ini!', () => {
                    // Emit an event untuk menghapus siswa yang dicentang
                    Livewire.dispatch('deleteBatchStudents', {
                        studentIds: studentIds
                    });
                });
            } else {
                Swal.fire({
                    icon: 'error'
                    , type: 'error'
                    , title: 'Oops...'
                    , text: 'Anda harus memilih setidaknya satu mahasiswa untuk dihapus!'
                    , customClass: {
                        confirmButton: 'btn btn-primary'
                        , buttonsStyling: false
                    }
                });
            }
        }

        // Fungsi untuk menampilkan modal untuk MENGHAPUS!
        function confirmDeleteStudent(studentId) {
            showSwalDialog('Apakah Anda yakin?', 'Anda tidak akan bisa mengembalikan data ini!', () => {
                Livewire.dispatch('confirmStudent', {
                    studentId: studentId
                });
            });
        }

        function showStudent(studentId) {
            Livewire.dispatch('requestStudentById', {
                studentId: studentId
            });
        }

    </script> --}}
    @endpush
</div>
@endsection


{{--
@extends('layouts/layoutMaster')
@section('title', 'List Mahasiswa')

@push('styles')
@vite(['resources/assets/css/datatables.min.css'])
@endpush

@section('content')
@livewire('backend.student.cards')

@endsection --}}

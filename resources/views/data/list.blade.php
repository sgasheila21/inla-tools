@extends('layouts.template')
@section('title', 'Data')

@section('content')
<div class="container p-4 mb-4">
    <div class="mb-4 d-flex justify-content-between">
        <h3 style="color:#BBCF33">List of Data</h3>
        <a class="btn text-white fw-bold rounded-pill" style="background-color: #00A099" href="{{ route('data.create') }}" role="button"><i class="fas fa-plus"></i> Add New Data</a>
    </div>
    <table id="data" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Year</th>
                <th>Upload Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($malaria_upload && ($malaria_upload->user->id != auth()->user()->id))
            <tr>
                <td>DEFAULT</td>
                <td>{{ $malaria_upload->title }}</td>
                <td>{{ $malaria_upload->year }}</td>
                <td>{{ $malaria_upload->upload_date }}</td>
                <td>
                    <a href="{{ route('data.detail', ['id' => $malaria_upload->id]) }}"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @endif
            
            @foreach($uploads as $upload)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $upload->title }}</td>
                <td>{{ $upload->year }}</td>
                <td>{{ $upload->upload_date }}</td>
                <td>
                    <a href="{{ route('data.detail', ['id' => $upload->id]) }}"><i class="fas fa-eye"></i></a>
                    <a href="javascript:void(0)" class="delete-btn" data-id="{{ $upload->id }}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- EXTRA CSS -->
<style>
    td a {
        color: #00A099;
        padding: 0 2px;
    }
</style>

<!-- EXTRA SCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $('#data').DataTable();
    });

    document.querySelectorAll('.delete-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var dataId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "Deleted data cannot be recovered!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#BABABA',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/data/delete/' + dataId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete data.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endsection

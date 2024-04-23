@extends('layouts.template')
@section('title', 'Variable')

@section('content')
<div class="container p-4 mb-4">
    <div class="mb-4">
        <h3 style="color:#BBCF33">List of Variable</h3>
    </div>
    <table id="data" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Variable Name</th>
                <th>Slug</th>
                <th>Hint</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>            
            @foreach($variables as $variable)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $variable->label }}</td>
                <td>{{ $variable->name }}</td>
                <td>{{ $variable->hint }}</td>
                <td>
                    <a href="{{ route('variable.update', ['id' => $variable->id]) }}"><i class="fas fa-pencil-alt"></i></a>
                    <a href="javascript:void(0)" class="delete-btn" data-id="{{ $variable->id }}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    td {
        word-wrap: break-word;
        max-width: 200px;
    }
    td a {
        color: #00A099;
        padding: 0 2px;
    }
</style>

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
                text: "Deleted variable cannot be recovered! Ensure that there is no data using this variable.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#BABABA',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/variable/delete/' + dataId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your variable has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            if (xhr.status === 500) {
                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON.failure,
                                    'error'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete variable.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
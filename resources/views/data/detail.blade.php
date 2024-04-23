@extends('layouts.template')
@section('title', 'Data')

@section('content')
<div class="container p-4 mb-4">
    <div class="mb-4 d-flex justify-content-between">
        <h3 style="color:#BBCF33">{{ $this_upload->title }}</h3>
        @if($this_upload->user_id == auth()->user()->id)
            <a class="btn text-white fw-bold rounded-pill" style="background-color: #00A099" href="{{ route('data.update', ['id' => $this_upload->id]) }}" role="button">Update Data</a>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-5">
            <label for="period" class="form-label">Period<span class="text-danger">*</span></label>
            <select class="form-select" id="period" disabled>
                <option selected>{{ $this_upload->year }}</option>
            </select>
        </div>
    </div>
    <div class="table-responsive overflow-auto">
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Regency/City</th>
                    
                    @foreach($variable_ids as $variable_id => $value)
                        <th>{{ $variables[$variable_id-1]->label }} 
                            @if($variables[$variable_id-1]->hint)
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $variables[$variable_id-1]->hint }}"></i>
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($groupedData as $regionId => $values)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $regions[$regionId] }}</td>
                    @foreach($variable_ids as $variable_id => $value)
                        <td>{{ isset($values[$variable_id]) ? $values[$variable_id] : '' }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- EXTRA CSS -->
<style>
    .form-label{
        font-weight: bold;
    }

    td {
        min-width: 100px;
    }
</style>
@endsection
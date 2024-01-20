@extends('layouts.template')
@section('title', 'Data')

@section('content')
<div class="container p-4 mb-4">
    <h3 style="color:#BBCF33">{{ $this_upload->title }}</h3>
    <div class="row">
        <div class="col-sm-5">
            <label for="period" class="form-label">Period<span class="text-danger">*</span></label>
            <select class="form-select" id="period" disabled>
                <option selected>{{ $this_upload->year }}</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <form method="POST" action="{{ route('data.update.action', ['id' => $this_upload->id]) }}">
            @csrf
            <div class="overflow-auto">
            <table class="table table-striped table-bordered text-center mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Regency/City</th>                        
                        
                        @foreach($variable_ids as $variable_id => $value)
                        <th>{{ $variables[$variable_id-1]->label }} 
                            @if($variables[$variable_id-1]->hint)
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $variables[$variable_id-1]->label }}"></i>
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
                            <td>
                                <input type="text" class="form-control text-center" name="values[{{ $regionId }}][{{ $variable_id }}]" value="{{ isset($values[$variable_id]) ? $values[$variable_id] : '' }}">
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <button type="submit" class="btn text-white rounded-pill px-5 mt-2" style="background-color: #00A099">Save</button>
        </form>
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

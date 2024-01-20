@extends('layouts.template')
@section('title', 'Data')

@section('content')
<div class="container p-4 mb-4">
    <h3 style="color:#BBCF33">Add New Data</h3>
    <form method="POST" action="{{ route('data.create.action') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <label for="period" class="form-label">Period<span class="text-danger">*</span></label>
                <select class="form-select single" id="period" name="period">
                    <option selected disabled>Please Choose</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" @if(old('period') == $year) selected @endif>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="dataFile" class="form-label">File (Must be .xlsx or .xls)<span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="dataFile" name="dataFile" aria-describedby="inputManually">
                <div id="downloadTemplate" class="form-text text-end"><a href="{{ asset('storage/template.xlsx') }}"><i class="fas fa-download"></i> Download Template</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Input the title here" value="{{ old('title') }}">
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn text-white rounded-pill mt-3" style="background-color: #00A099">Upload</button>
    </form>
</div>

<!-- EXTRA CSS -->
<style>
    .form-label{
        font-weight: bold;
    }
</style>

@endsection
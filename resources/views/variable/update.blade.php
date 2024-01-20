@extends('layouts.template')
@section('title', 'Variable')

@section('content')
<div class="container p-4 mb-4">
    <h3 style="color:#BBCF33">Update Variable</h3>
    <form method="POST" action="{{ route('variable.update.action', ['id' => $this_variable->id]) }}">
        @csrf
        <div class="row mb-2">
            <div class="col">
                <label for="label" class="form-label">Variable Name</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="Input the variable name here" value="{{ old('label', $this_variable->label) }}">
            </div>
            <div class="col">
                <label for="name" class="form-label">Slug</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $this_variable->name }}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="hint" class="form-label">Hint</label>
                <textarea class="form-control" id="hint" name="hint" placeholder="Input the hint here"  style="height: 100px">{{ old('hint', $this_variable->hint) }}</textarea>
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
        <button type="submit" class="btn text-white rounded-pill mt-3" style="background-color: #00A099">Save</button>
    </form>
</div>

<style>
    .form-label{
        font-weight: bold;
    }
</style>
@endsection
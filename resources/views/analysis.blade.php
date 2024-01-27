@extends('layouts.template')
@section('title', 'Analysis')

@section('content')
<div class="container p-4 mb-4">
    <h3 style="color:#BBCF33">Analysis</h3>

    <form method="POST" action="{{ route('analysis.create') }}" id="analysisForm">
        @csrf
        <div class="row mb-2">
            <div class="col">
                <label for="period" class="form-label">Period<span class="text-danger">*</span></label>
                <select class="form-select single" id="period" name="period">
                    <option selected disabled>Please Choose</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
            <label for="data" class="form-label">Data<span class="text-danger">*</span></label>
                <select class="form-select single" id="data" name="data">
                    <option selected disabled>Please Choose</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="dependent-variable" class="form-label">Dependent Variable<span class="text-danger">*</span></label>
                <select class="form-select single" id="dependent-variable" name="dependentVariable">
                    <option selected disabled>Please Choose</option>
                </select>
            </div>
            <div class="col">
            <label for="independent-variable" class="form-label">Independent Variable<span class="text-danger">*</span></label>
                <select class="form-select multiple" id="independent-variable" name="independentVariable[]" multiple>
                </select>
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
        <button type="submit" class="btn text-white rounded-pill mt-3" style="background-color: #00A099" id="submitBtn">Submit</button>
    </form>

    @if(session('results'))
        <h3 style="color:#BBCF33" class="my-3">Output</h3>
        <div><b>Period: </b>{{ session('period') }}</div>
        <div><b>Data: </b>{{ session('data') }}</div>
        <div><b>Dependent Variable: </b>{{ session('dependentVariable')[0] }}</div>
        <div><b>Independent Variable(s): </b>{{ session('independentVariables') }}</div>

        <div class="container-fluid fw-bold text-white p-2 my-2" style="background-color: #BBCF33; border-radius: 10px;">Moran's I</div>
        <div class="container">
            <div><b>Moran's I Value: </b>{{ session('morans') }}</div>
            <div class="mt-1">
                <b>Note:</b><br>
                H<sub>0</sub>: λ=0 (no significant spatial pattern) <br>
                H<sub>1</sub>: λ≠0 (significant spatial pattern) <br><br>
                Moran's I value ranges from -1 to 1. If the value approaches 1, it indicates a positive spatial pattern, and if it approaches -1, it indicates a negative spatial pattern. A high positive value suggests similarity in values in neighboring areas, while a high negative value indicates a tendency for differing values in neighboring areas. A value approaching 0 indicates no significant spatial pattern.
            </div>
        </div>

        <div class="container-fluid fw-bold text-white p-2 my-2" style="background-color: #BBCF33; border-radius: 10px;">The Result Of The Analysis With The BYM2 Model Using The INLA Method</div>
        <div class="container">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Variable</th>
                            <th>Mean</th>
                            <th>Q0.025</th>
                            <th>Q0.975</th>
                            <th>Significance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('modelSummary')['independentVariable'] as $key => $variable)
                            <tr>
                                <td>{{ $variable }}</td>
                                <td>{{ session('modelSummary')['mean'][$key] }}</td>
                                <td>{{ session('modelSummary')['quant1'][$key] }}</td>
                                <td>{{ session('modelSummary')['quant3'][$key] }}</td>
                                <td>{{ session('modelSummary')['significance'][$key] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-1">
                <b>Spatial Model:</b><br>
                Y<sub>i</sub> {{ session('spatialModel') }} + u<sub>i</sub> + v<sub>i</sub>
            </div>
            <div class="mt-1"><b>Note:</b><br>
                The "mean" column in the table represents the coefficients of the model. The "Q0.025" and "Q0.975" columns are the lower and upper bounds of the 95% confidence interval, where this interval can determine whether the variable is significant or not. A variable is considered significant if the 95% confidence interval does not contain the value 0. If it contains the value 0, then the variable is not significant.
            </div>
        </div>

        <div class="container-fluid fw-bold text-white p-2 my-2" style="background-color: #BBCF33; border-radius: 10px;">Expected Value</div>
        <div class="container">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Regency/City</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('predict')['region'] as $key => $region)
                            <tr>
                                <td>{{ session('predict')['region'][$key] }}</td>
                                <td>{{ session('predict')['value'][$key] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-1"><b>Note:</b><br>
                The table above is a table of expected values for the dependent variable for each district or city in the East Nusa Tenggara province.
            </div>
        </div>
        <div class="container">
            <img src="{{ asset('storage/R/' . session('mapName')) }}" alt="Predict Map" style="width: 100%;">
        </div>
    @endif
</div>

<!-- EXTRA CSS -->
<style>
    .form-label{
        font-weight: bold;
    }
</style>

<!-- EXTRA SCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.multiple').select2({
            placeholder: 'Please Choose At Least One', 
            allowClear: false
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#period').change(function() {
            var selectedPeriod = $(this).val();

            $.ajax({
                url: '{{ route("dropdown.data") }}',
                method: 'POST',
                data: {
                    period: selectedPeriod
                },
                success: function(response) {
                    var dataDropdown = $('#data');
                    var dependentVariableDropdown = $('#dependent-variable');
                    var independentVariableDropdown = $('#independent-variable');

                    dataDropdown.empty().append('<option value="" disabled selected>Please Choose</option>');
                    dependentVariableDropdown.empty().append('<option value="" disabled selected>Please Choose</option>');
                    independentVariableDropdown.empty();

                    if (response.data.length > 0) {
                        $.each(response.data, function(index, data) {
                            dataDropdown.append('<option value="' + data.id + '">' + data.title + '</option>');
                        });
                    } else {
                        dataDropdown.append('<option value="" disabled>No Data Available</option>');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan.');
                }
            });
        });

        $('#data').change(function() {
            var selectedData = $(this).val();

            $.ajax({
                url: '{{ route("dropdown.dependent.variable") }}',
                method: 'POST',
                data: {
                    data: selectedData
                },
                success: function(response) {
                    var dependentVariableDropdown = $('#dependent-variable');
                    var independentVariableDropdown = $('#independent-variable');

                    dependentVariableDropdown.empty().append('<option value="" disabled selected>Please Choose</option>');
                    independentVariableDropdown.empty();

                    if (response.data.length > 0) {
                        $.each(response.data, function(index, data) {
                            dependentVariableDropdown.append('<option value="' + data.id + '">' + data.label + '</option>');
                        });
                    } else {
                        dependentVariableDropdown.append('<option value="" disabled>No Data Available</option>');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan.');
                }
            });
        });

        $('#dependent-variable').change(function() {
            var selectedDependentVariable = $(this).val();
            var selectedData = $('#data').val();

            $.ajax({
                url: '{{ route("dropdown.independent.variable") }}',
                method: 'POST',
                data: {
                    dependentVariable: selectedDependentVariable,
                    data: selectedData
                },
                success: function(response) {
                    var independentVariableDropdown = $('#independent-variable');
                    independentVariableDropdown.empty();

                    if (response.data.length > 0) {
                        $.each(response.data, function(index, data) {
                            independentVariableDropdown.append('<option value="' + data.id + '">' + data.label + '</option>');
                        });
                    } else {
                        independentVariableDropdown.append('<option value="" disabled>No Data Available</option>');
                    }
                    
                },
                error: function() {
                    alert('Terjadi kesalahan.');
                }
            });
        });
    });
</script>
@endsection
@extends('layout/layout')

@section('space-work')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-12">

<div class="card elevation-4">
  <div class="card-body">
    <h5 class="card-title">Book an Appointment</h5>

<form action="{{ route('appointments.store') }}" method="post"  class="row g-3">
    @csrf

    <!-- Doctor -->
    <div class="col-12">
    <label  class="form-label" for="doctor_id">Doctor</label>
    <select class="form-select" name="doctor_id" id="doctor_id" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                {{ $doctor->name }}
            </option>
        @endforeach
    </select>
</div>

    <!-- Patient -->
   
    <!-- Appointment Date -->
    <div class="col-12">
    <label for="appointment_date"  class="form-label">Appointment Date:</label>
    <input  class="form-control" type="datetime-local" name="appointment_date" id="appointment_date" required>
    </div>


    <!-- Notes -->
    <div class="col-12">
    <label for="notes"  class="form-label">Notes</label>
    <textarea  class="form-control" name="notes" id="notes" rows="4">{{ old('notes') }}</textarea>
    </div>

    <!-- Status -->
    
    <div class="text-center">
    <button class="btn btn-primary" type="submit">Create Appointment</button>
    </div>
</form>
</div>
          </div>
<a href="{{ route('reservation') }}">Back to Appointments</a>@endsection

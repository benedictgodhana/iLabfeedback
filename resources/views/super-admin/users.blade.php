@extends('layout/layout')

@section('space-work')
<div class="pagetitle">
 
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User Management</h5>
 <!-- Large Modal -->
 <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add Patient
              </button>
              <hr>

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-center">Add Doctor</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="name" required>
            </div>
            
            <div class="col-md-6">
                <label for="inputDOB" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="inputDOB" name="dob" required>
            </div>
            <div class="col-md-6">
                <label for="inputGender" class="form-label">Gender</label>
                <select id="inputGender" class="form-select" name="gender" required>
                    <option selected disabled>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputContactNumber" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="inputContactNumber" name="contact_number">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
            <div class="col-md-6">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" required>
    </div>

            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address">
            </div>
            <!-- Add other patient-specific fields as needed -->

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>

                    </div>
                   
                  </div>
                </div>
              </div><!-- End Large Modal-->

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Specialization</th>
              
              <th>Role</th>
            <th>Action</th>
              </tr> 
            </thead>
            <tbody>
             
            @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
            @foreach($patients as $doctor)
                {{ $doctor->specialization }}
            @endforeach
        </td>
                        <td>{{ $user->roles->name }}</td>

                        <td class="action-buttons">
                              <!-- Basic Modal -->
              <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->id }}" >
                View details
              </button>
              <div class="modal fade" id="basicModal{{ $user->id }}" tabindex="-1" >
                <div class="modal-dialog" >
                  <div class="modal-content" >
                    <div class="modal-header  text-center  bg-primary">
                      <h5 class="modal-title" style="color:white">Doctor's Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $user->name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $user->email }}</p>
        </div>
               
         
    </div>
    <div class="row">
        <div class="col-md-6">
            <p><strong><i class="fas fa-user-tag"></i> Role:</strong>
                @if ($user->roles == null)
                    User
                @else
                    {{ $user->roles->name }}
                @endif
            </p>
        </div>
        @foreach($patients as $doctor)
         <div class="col-md-6">
            <p><strong><i class="fas fa-envelope"></i> Contact:</strong> {{ $doctor->contact_number }}</p>
        </div>
            <div class="col-md-6">
                <p><strong><i class="fas fa-building"></i> Department:</strong> {{ $doctor->department }}</p>
            </div>
            <div class="col-md-6">
                <p><strong><i class="fas fa-graduation-cap"></i> Qualification:</strong> {{ $doctor->qualification }}</p>
            </div>
            <div class="col-md-6">
                <p><strong><i class="fas fa-stethoscope"></i> Specialization:</strong> {{ $doctor->specialization }}</p>
            </div>
            <div class="col-md-6">
                <p><strong><i class="fas fa-stethoscope"></i> Bio:</strong> {{ $doctor->bio }}</p>
            </div>
             <div class="col-md-6">
                <p><strong><i class="fas fa-stethoscope"></i> Address:</strong> {{ $doctor->address }}</p>
            </div>
             <div class="col-md-6">
                <p><strong><i class="fas fa-stethoscope"></i> Gender:</strong> {{ $doctor->gender}}</p>
            </div>
            <!-- Add more doctor-specific information as needed -->
        @endforeach
    </div>
</div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

            </div>
          </div>
                            <button type="button" class="btn btn-outline-primary elevation-3" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">
                                <i class="fas fa-edit"></i> Edit User
                            </button>
                            @if($user->activated)
                            <button style="width:120px" type="button" class="btn btn-outline-danger btn-sm elevation-3" data-toggle="modal" data-target="#deactivateUserModal{{ $user->id }}">
                                <i class="fas fa-ban"></i> Deactivate
                            </button>
                            @else
                            <button style="width:120px" type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#activateUserModal{{ $user->id }}">
                                <i class="fas fa-check-circle"></i> Activate
                            </button>
                            @endif

                        </td>
                    </tr>
                    @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var qualificationSelect = document.getElementById("qualification");
        var customQualificationField = document.getElementById("customQualificationField");
        var customQualificationInput = document.getElementById("custom_qualification");

        // Function to toggle the display of the custom qualification field
        function toggleCustomQualificationField() {
            customQualificationField.style.display = (qualificationSelect.value === "custom") ? "block" : "none";
        }

        // Initial toggle based on the default value
        toggleCustomQualificationField();

        // Event listener for changes in the qualification dropdown
        qualificationSelect.addEventListener("change", toggleCustomQualificationField);
    });
</script>


@endsection
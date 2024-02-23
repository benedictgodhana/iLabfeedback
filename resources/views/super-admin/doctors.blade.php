@extends('layout/layout')

@section('space-work')
<div class="pagetitle">
 
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card" style="border-radius:10px">
        <div class="card-body">
          <h5 class="card-title">Doctor Management</h5>
 <!-- Large Modal -->
 <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add Doctor
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
                    <form class="row g-3" action="{{route('doctors.store')}}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="role" value="2">
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
            <div class="col-md-6">
                  <label for="inputCity" class="form-label">Doctor's ID Number</label>
                  <input type="text" class="form-control" id="inputCity" name="identification_number">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Doctor's License Number</label>
                  <input type="text" class="form-control" id="inputCity" name="license_number">
                </div>
                <div class="col-md-6">
                <label for="availability" class="form-label">Availability Schedule</label>
              <select id="availability" class="form-select" name="availability_schedule">
                <option selected disabled>Choose...</option>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
              </select>
                </div>
                <div class="col-md-6">
              <label for="preferences" class="form-label">Appointment Preferences</label>
              <select id="preferences" class="form-select" name="appointment_preferences">
                <option selected disabled>Choose...</option>
                <option value="In-person">In-person</option>
                <option value="Virtual">Virtual</option>
                <option value="Phone">Phone</option>
              </select>
</div>
<div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Doctor's Qualification</label>
                  <select class="form-control" id="qualification" name="qualification">
                        <option value="" selected disabled>Select Qualification</option>
                        <option value="Diploma in Clinical Medicine">Diploma in Clinical Medicine</option>
                        <option value="Bachelor of Medicine and Bachelor of Surgery (MBChB)">Bachelor of Medicine and Bachelor of Surgery (MBChB)</option>
                        <option value="Master of Medicine (MMed)">Master of Medicine (MMed)</option>
                        <option value="Doctor of Medicine (MD)">Doctor of Medicine (MD)</option>
                        <option value="Fellowship of the Medical Practitioners and Dentists Board (FMPDB)">Fellowship of the Medical Practitioners and Dentists Board (FMPDB)</option>
                        <option value="Diploma in Nursing">Diploma in Nursing</option>
                        <option value="Bachelor of Science in Nursing (BScN)">Bachelor of Science in Nursing (BScN)</option>
                        <option value="Master of Science in Nursing (MScN)">Master of Science in Nursing (MScN)</option>
                        <option value="Diploma in Pharmacy">Diploma in Pharmacy</option>
                        <option value="Bachelor of Pharmacy (BPharm)">Bachelor of Pharmacy (BPharm)</option>
                        <option value="Master of Pharmacy (MPharm)">Master of Pharmacy (MPharm)</option>
                        <option value="Diploma in Medical Laboratory Technology">Diploma in Medical Laboratory Technology</option>
                        <option value="Bachelor of Science in Medical Laboratory Science">Bachelor of Science in Medical Laboratory Science</option>
                        <option value="Master of Science in Medical Laboratory Science">Master of Science in Medical Laboratory Science</option>
                        <option value="Diploma in Radiography">Diploma in Radiography</option>
                        <option value="Bachelor of Science in Radiography">Bachelor of Science in Radiography</option>
                        <option value="Kenya Registered Community Health Nurse (KRCHN)">Kenya Registered Community Health Nurse (KRCHN)</option>
                        <option value="Diploma in Clinical Medicine and Surgery">Diploma in Clinical Medicine and Surgery</option>
                        <option value="Higher National Diploma in Medical Laboratory Sciences">Higher National Diploma in Medical Laboratory Sciences</option>
                        <option value="Diploma in Pharmaceutical Technology">Diploma in Pharmaceutical Technology</option>
                        <option value="Diploma in Physiotherapy">Diploma in Physiotherapy</option>
                        <option value="Diploma in Medical Imaging Sciences">Diploma in Medical Imaging Sciences</option>
                        <option value="Diploma in Health Records and Information Technology">Diploma in Health Records and Information Technology</option>
                        <option value="Bachelor of Science in Occupational Therapy">Bachelor of Science in Occupational Therapy</option>
                        <option value="Bachelor of Science in Optometry">Bachelor of Science in Optometry</option>
                        <option value="Bachelor of Science in Speech and Language Therapy">Bachelor of Science in Speech and Language Therapy</option>
                        <option value="Master of Science in Public Health (MScPH)">Master of Science in Public Health (MScPH)</option>
                        <option value="Master of Medicine in [Specialty]">Master of Medicine in [Specialty]</option>
                        <option value="Doctor of Philosophy in [Specialty]">Doctor of Philosophy in [Specialty]</option>

                        <option value="custom">Other (Specify Below)</option>
                    </select>               
                   </div>


                   <div class="form-group col-md-6" id="customQualificationField" style="display: none;">
                                    <label for="custom_qualification"><i class="fas fa-certificate"></i> Custom Qualification</label>
                                    <input type="text" class="form-control elevation-1 border-0" id="custom_qualification" name="custom_qualification" placeholder="add custom application">
                                </div>

                                <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Doctor's Specialization</label>
                  <select class="form-control" id="qualification" name="specialization">
                       <option value="" selected disabled>Select Specialization</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Neurologist">Neurologist</option>
                            <option value="Oncologist">Oncologist</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="Psychiatrist">Psychiatrist</option>
                            <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                            <option value="Gastroenterologist">Gastroenterologist</option>
                            <option value="Urologist">Urologist</option>
                            <option value="Endocrinologist">Endocrinologist</option>
                            <option value="Ophthalmologist">Ophthalmologist</option>
                            <option value="Rheumatologist">Rheumatologist</option>
                            <option value="Gynecologist">Gynecologist</option>
                            <option value="Dentist">Dentist</option>
                            <option value="ENT Specialist">ENT Specialist</option>
                            <option value="Allergist/Immunologist">Allergist/Immunologist</option>
                            <option value="Nephrologist">Nephrologist</option>
                            <option value="Pulmonologist">Pulmonologist</option>
                            <option value="Hematologist">Hematologist</option>
                            <option value="Radiologist">Radiologist</option>
                            <option value="Pathologist">Pathologist</option>
                            <option value="Emergency Medicine Physician">Emergency Medicine Physician</option>
                            <option value="Anesthesiologist">Anesthesiologist</option>
                    </select>
                   </div>
                   <div class="col-md-6">
        <label for="profilePic" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" id="profilePic" name="profile_picture">
      </div>
                   <div class="col-md-6">
   <label for="bio" class="form-label">Bio</label>
   <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
</div>


      
            <!-- Add other patient-specific fields as needed -->

            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
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
            @foreach($doctors as $doctor)
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
                      </div>
                  </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
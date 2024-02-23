@extends('layout/layout')

@section('space-work')

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

<div class="pagetitle">
 
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card" style="border-radius:10px">
        <div class="card-body">
          
          <h5 class="card-title">Role Management</h5>
          <div>
          @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

          <button type="button"   class="btn btn-outline-primary elevation-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
          <i class="fas fa-user-plus"></i> Add User          
        </button>


          <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" >
                  <h5 class="modal-title" id="createCategoryModalLabel">Create New Admin</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Form to create a new category -->
                            <form action="{{ route('store.users') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Hidden input field to set the role to 1 -->
                    <input type="hidden" name="role" value="1">
                    <button type="submit" class="btn btn-primary">Add User</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          </div>
          <br>
 <!-- Large Modal -->
 
 
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th>Name</th>
              <th>Email</th>              
              <th>Role</th>
            <th>Action</th>
              </tr> 
            </thead>
            <tbody>
             
            @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->name }}</td>

                        <td class="action-buttons">
                              <!-- Basic Modal -->
                              <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->id }}" >
                                  <i class="fas fa-eye"></i> View details
                              </button>

              <div class="modal fade" id="basicModal{{ $user->id }}" tabindex="-1" >
                <div class="modal-dialog">
                  <div class="modal-content"  style="width:800px"  >
                    <div class="modal-header  text-center" >
                      <h5 class="modal-title" >User Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                              <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $user->name }}</p>
                          </div>
                          <div class="col-md-6">
                              <p><strong <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->id }}" >
                View details
              </button>><i class="fas fa-envelope"></i> Email:</strong> {{ $user->email }}</p>
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
          <button type="button" class="btn btn-outline-primary elevation-3" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
    <i class="fas fa-edit"></i> Edit User
</button>

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

@foreach ($users as $user)

<!-- Modal -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add form fields to edit user information -->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Name field -->
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>

    <!-- Email field -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>

    <!-- Password field -->
    <div class="form-group">
        <label for="password">Password:</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordToggle">
            <button class="btn btn-outline-secondary" type="button" id="passwordToggle" onclick="togglePassword()">Show</button>
        </div>
    </div>

    <!-- Role field (if applicable) -->
    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role">
            <!-- Example options -->
            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <!-- Add more form fields as needed -->

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>



@endforeach



<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordToggle = document.getElementById("passwordToggle");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.textContent = "Hide";
        } else {
            passwordField.type = "password";
            passwordToggle.textContent = "Show";
        }
    }
</script>




@endsection
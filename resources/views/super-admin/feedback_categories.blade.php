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
          <h5 class="card-title">Feedback Category Management</h5>

          @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

          <button type="button" style="background:darkblue;color:white" class="btn  mb-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            Add New Category
          </button>

          <!-- Modal to create a new category -->
          <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="background:orange;color:white">
                  <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Form to create a new category -->
                  <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="categoryName" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="categoryName" name="name">
                    </div>
                    <button type="submit" class="btn" style="background:darkblue;color:white">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
 <!-- Large Modal -->
 
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th>Category Name</th>
             
            <th>Action</th>
              </tr> 
            </thead>
            <tbody>
             
            @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>

                        <td class="action-buttons">
                              <!-- Basic Modal -->
              <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $category->id }}" >
              <i class="fas fa-eye"></i>View details
              </button>
              <div class="modal fade" id="basicModal{{ $category->id }}" tabindex="-1" >
                <div class="modal-dialog">
                  <div class="modal-content"  style="width:550px"  >
                    <div class="modal-header  text-center" style="background:orange;">
                      <h5 class="modal-title" style="color:white">Feedback Category Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                              <p><strong><i class="fas fa-user"></i>Category Name:</strong> {{ $category->name }}</p>
                          </div>
                        
                          
                      </div>
                     
                  </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

            </div>
          </div> <button type="button" class="btn btn-outline-primary elevation-3" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $category->id }}">
    <i class="fas fa-edit"></i> Edit category
</button>
                           

                        </td>
                    </tr>
                    @endforeach
            </tbody>
          </table>

        </div>
      </div>

      @foreach ($categories as $category)
      <div class="modal fade" id="editUserModal{{ $category->id }}" tabindex="-1" >
      <div class="modal-dialog">
                  <div class="modal-content"  style="width:550px"  >
                    <div class="modal-header  text-center" >
                      <h5 class="modal-title" >Edit Feedback Category Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
                   <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->name }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
                  </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->
              @endforeach



    </div>
  </div>
</section>




@endsection
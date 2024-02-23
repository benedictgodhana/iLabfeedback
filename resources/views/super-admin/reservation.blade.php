@extends('layout/layout')

@section('space-work')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
@if(session('success'))
<div id="success-alert" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Check if the success alert exists
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            // Set a timeout to hide the success alert after 3 seconds
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 3000);
        }
    });
</script>


<div class="pagetitle">
 
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card" style="border-radius:10px">
        <div class="card-body">
          <h5 class="card-title">Today's Feedback</h5>
 <!-- Large Modal -->
 
 <hr>


          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th>Message</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Action</th>


              </tr> 
            </thead>
            <tbody>
             
            @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->content }}</td>
                        <td>{{$feedback->status}}</td>
                        <td>{{$feedback->created_at}}</td>


                        <td class="action-buttons">
                              <!-- Basic Modal -->
              <button type="button" class="btn btn-outline-warning elevation-3" data-bs-toggle="modal" data-bs-target="#basicModal{{ $feedback->id }}" >
                View details
              </button>
              <div class="modal fade" id="basicModal{{ $feedback->id }}" tabindex="-1"  >
                <div class="modal-dialog" style="width:800px"  >
                  <div class="modal-content" style="width:800px">
                    <div class="modal-header  text-center" style="background:orange" style="width:800px">
                      <h5 class="modal-title" style="color:white">Feedback Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body" style="width:800px">
                      <div class="row">
                      <div class="col-md-6">
                        <p><strong><i class="fas fa-address-book"></i> Contact:</strong> {{ $feedback->contact }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $feedback->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-book"></i> Subject:</strong> {{ $feedback->subject }}</p>
                    </div>
                   
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-info-circle"></i> Status: </strong> {{ $feedback->status }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-clock"></i> Created At:</strong> {{ $feedback->created_at }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-comment-alt"></i> Message: </strong><span style="color:blue">{{ $feedback->content }}</span></p>
                    </div>


                      
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

            </div>
          </div>
                   



          <button type="button" class="btn btn-outline-primary elevation-3" data-bs-toggle="modal" data-bs-target="#changeStatusModal{{ $feedback->id }}">
                    Change status
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
@foreach ($feedbacks as $feedback)
<div class="modal fade" id="changeStatusModal{{ $feedback->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Feedback Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add your form elements for changing feedback status here -->
        <!-- For example, you can have dropdowns, radio buttons, etc. -->
        <!-- Sample form element -->
        <form action="{{ route('update.status', ['id' => $feedback->id]) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="status">New Status:</label>
            <select class="form-control" name="status" id="status{{ $feedback->id }}">
              <option value="resolved">Resolved</option>
              <option value="In Progress">In Progress</option>
              <option value="rejected">Rejected</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection
@extends('layout/layout')

@section('space-work')
<div class="pagetitle">
 
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card" style="border-radius:10px">
        <div class="card-body">
          <h5 class="card-title">System Activities</h5>
 <!-- Large Modal -->

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
            <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows go here -->
                        @foreach ($activities as $activity)
                        <tr>
                            <td>
                                @if ($activity->user)
                                {{ $activity->user->name }}
                                @else
                                User not found
                                @endif
                            </td>
                            <td>{{ $activity->action }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->created_at }}</td>
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
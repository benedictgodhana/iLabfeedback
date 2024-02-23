    @extends('layout/layout')

    @section('space-work')
    <div class="pagetitle">
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Appointments</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Doctor <b>N</b>ame
                    </th>
                    <th>Reason</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Date of Appointment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($appointments as $Appointment)

                  </tr>
                    <tr>
                    <td>{{$Appointment->doctor->name}}</td>                    
                    <td>{{$Appointment->notes}}</td>
                    <td>{{$Appointment->appointment_date}}</td>
                    <td>{{$Appointment->status}}</td>
                              
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


   
    @endsection
@extends('layout/layout')

@section('space-work')

<style>
      @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
.container{
    max-width: 100%;
}

      .fc button {
            color: black;
            font-family: Arial, sans-serif;
            font-size: 20px;
            border: none;
            border-radius: 1px;
            padding: 8px 16px;
            margin: 4px;
            cursor: pointer;
        }

        .fc button:hover {
            background-color: yellow;
        }
        
        #calendar {
            max-width: 100% ;
            background-color: #ffffff; /* Background color of the calendar */
            border: 1px solid #ccc; /* Border around the calendar */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 0 5px #888; /* Box shadow for a subtle depth effect */
            padding: 10px;
            margin: 0px;
        }
        #calendar .fc-toolbar {
            background-color:#ec7d30; /* Header background color */
            color: #ffffff; /* Header text color */
            border-radius: 5px 5px 0 0; /* Rounded corners for the top */
        }
        #calendar
        #calendar .fc-toolbar button {
            color:black;
            border: none;
            border-radius: 0;
            margin: 2px;
            font-weight: 600;
        }
        #calendar .fc-toolbar button:hover {
            background-color: #0056b3;
        }

        /* Style the events in the calendar */
        #calendar .fc-event {
            background-color:yellowgreen; /* Event background color */
            color: #ffffff; /* Event text color */
            border: none;
            border-radius: 5px;
            padding: 5px;
            margin: 2px;
        }

        .fc-header-toolbar .fc-left button,
      .fc-header-toolbar .fc-right button {
          text-transform: capitalize;
      }

        #calendar .fc-event:hover {
            background-color: #0056b3;
        }
        /* Style the time display in the calendar */
        #calendar .fc-time {
            color: #333; /* Time text color */
            font-weight: bold;
            display: none;
        }
        

      *,
      ::before,
      ::after {
        box-sizing: border-box;
      }

      body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: 0.5s;
      }

      a {
        text-decoration: none;
      }

      .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: 0.5s;
      }

      .header_toggle {
        color: var(--first-color);
        font-size: 1.5rem;
        cursor: pointer;
      }

      .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
      }

      .header_img img {
        width: 40px;
      }

      .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color:darkblue;
        padding: 0.5rem 1rem 0 0;
        transition: 0.5s;
        z-index: var(--z-fixed);
      }

      .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
      }

      .nav_logo,
      .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: 0.5rem 0 0.5rem 1.5rem;
      }

      .nav_logo {
        margin-bottom: 2rem;
      }

      .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color);
      }

      .nav_logo-name {
        color: var(--white-color);
        font-weight: 700;
      }

      .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: 0.3s;
      }

      .nav_link:hover {
        color: var(--white-color);
      }

      .nav_icon {
        font-size: 1.25rem;
      }

      .show {
        left: 0;
      }

      .body-pd {
        padding-left: calc(var(--nav-width) + 1rem);
      }

      .active {
        color: var(--white-color);
      }

      .active::before {
        content: "";
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color);
      }

      .height-100 {
        height: 100vh;
      }

      @media screen and (min-width: 768px) {
        body {
          margin: calc(var(--header-height) + 1rem) 0 0 0;
          padding-left: calc(var(--nav-width) + 2rem);
        }

        .header {
          height: calc(var(--header-height) + 1rem);
          padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
        }

        .header_img {
          width: 40px;
          height: 40px;
        }

        .header_img img {
          width: 45px;
        }

        .l-navbar {
          left: 0;
          padding: 1rem 1rem 0 0;
        }

        

        .body-pd {
          padding-left: calc(var(--nav-width) + 188px);
        }
      }</style>
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

<script>
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000); // 5000 milliseconds (5 seconds), adjust as needed
</script>


<div class="row" style="width: auto; height: 86vh; overflow-x: hidden; overflow-y: scroll;">

    <div class="col-lg-3 col-6">
        
        <!-- small card -->
        <div class="small-box bg-info" style="border-radius:0 20px">
            <div class="inner">
            <h3>6</h3> <!-- Inject the pending bookings count here -->
                <p>pending Appointments</p>
            </div>
            <div class="icon">
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 ">
        <!-- small card -->
        <div class="small-box bg-primary elevation-4" style="border-radius:0 20px">
            <div class="inner">
            <h3>5</h3> <!-- Inject the total users count here -->
                <p>Number of Patients</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a  href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success elevation-4" style="border-radius:0 20px">
            <div class="inner">
            <h3>7</h3> <!-- Inject the accepted reservations count here -->
                <p>Appointments Accepted</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- ./col -->
    
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning elevation-4" style="border-radius:0 20px">
            <div class="inner">
            <h3 style="color:white">6</h3> <!-- Inject the total rooms count here -->
                <p style="color:white">Total rooms</p>
            </div>
            <div class="icon">
            </div>
            <a href="#" class="small-box-footer"><span style="color:white">  More info </span>
              <i style="color:white" class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <!-- ./col -->
   
    
    
 

    <div class="container">
       

      
            

            <!-- Legend -->

        </div>
    </div>
    </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    




    <!-- Modal for creating a new reservation -->
    <div class="modal fade" id="createReservationModal" tabindex="-1" role="dialog" aria-labelledby="createReservationModalLabel" aria-hidden="true">
        <div style="border-radius:10px 0px 10px 0px"  class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: darkblue;">
                    <h5  class="modal-title" id="createReservationModalLabel" style="color:white">Create Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div  class="modal-body">
                    <!-- Reservation creation form -->
                    <form method="POST" action="{{ route('subadmin.createReservation') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="row">
                            <!-- User selection -->
                            

                            
                        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="capacity"><i class="bx bx-user"></i><strong>Number of people</strong></label>
                <input type="hidden" id="roomCapacity" value="">
                <input type="number" id="capacity" name="capacity" class="form-control" onmouseover="updateCapacityTooltip()" min="1">
            </div>
        </div>

                        <!-- Department selection -->

                     
                        <!-- Reservation date and time -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservationDate"><i class="fas fa-calendar"></i> Reservation Date:</label>
                                    <input type="date" class="form-control" id="booking_date" name="reservationDate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservationTime"><i class="fas fa-clock"></i> Reservation Time:</label>
                                    <input type="time" class="form-control" id="booking_time" name="reservationTime" required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration"><i class="fas fa-clock"></i> Duration (in hours):</label>
                            <select  id="duration" name="duration" class="form-select" required>
                                <option value="0">0 hours</option>
                                <option value="1">1 hour</option>
                                <option value="2">2 hours</option>
                                <option value="3">3 hours</option>
                                <option value="4">4 hours</option>
                                <option value="5">5 hours</option>
                                <option value="6">6 hours</option>
                                <option value="7">7 hours</option>
                                <option value="8">8 hours</option>
                                <option value="9">9 hours</option>
                                <option value="10">10 hours</option>
                            </select>                       
                         </div>
                    </div>
                    <div class="col-md-6">
                <label class="form-label" for="minutes">Minutes</label>
                <select class="form-control" id="minutes" name="duration">
                    <!-- Generate options for minutes -->
                        <option value="0">0 minutes</option>
                        <option value="5">5 minutes</option>
                        <option value="10">10 minutes</option>
                        <option value="15">15 minutes</option>
                        <option value="20">20 minutes</option>
                        <option value="25">25 minutes</option>
                        <option value="30">30 minutes</option>
                        <option value="35">35 minutes</option>
                        <option value="40">40 minutes</option>
                        <option value="45">45 minutes</option>
                        <option value="50">50 minutes</option>
                        <option value="55">55 minutes</option>
                        
                </select>
            </div>



                        <!-- End Time -->
                        <div class="form-group">
                    <label for="endtime"><i class="fas fa-clock"></i> End Time:</label>
                    <input type="text" class="form-control" id="timeLimit" name="timelimit" required readonly>
                </div>


                        <!-- Room selection -->

                        <div class="form-group">
                            <label for="event"><i class="fas fa-calendar-alt"></i> Event:</label>
                            <input type="text" class="form-control" id="event" name="event" required>
                        </div>

                        <!-- Add more form fields as needed -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-info" value="Submit" style="background: darkblue;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <!-- Calendar initialization -->
   
    <script>
    // JavaScript validation
    function validateForm() {
        var selectRoom = document.getElementById('selectRoom');
        var roomCapacity = parseInt(selectRoom.options[selectRoom.selectedIndex].getAttribute('data-capacity'));
        var enteredCapacity = parseInt(document.getElementById('capacity').value);

        if (enteredCapacity > roomCapacity) {
            showAlert('Error', 'Entered capacity of ' + enteredCapacity + ' exceeds room capacity of ' + roomCapacity + '. Please select another room or reduce the capacity.', 'error');
            return false;
        }

        // Continue with other form validations
        var items = document.getElementById('itemRequests');
        var reservationDate = document.getElementById('booking_date');
        var reservationTime = document.getElementById('booking_time');
        var timeLimit = document.getElementById('timeLimit');
        var event = document.getElementById('event');

        // Check other fields for validation (e.g., if they are empty or meet specific criteria)

        // If all validations pass, the form submission will proceed
        return true;
    }

    // Display SweetAlert
    function showAlert(title, message, icon) {
        Swal.fire({
            title: title,
            text: message,
            icon: icon,
            timer: 5000,
            showConfirmButton: false
        });
    }
</script>


    <script>
        // Initialize date picker
        $(function() {
            $("#reservationDate").datepicker();
        });
    </script>
    <!-- Include SweetAlert JS -->


    <script>
        function validateForm() {
            const user = document.getElementById('user').value;
            const reservationDate = document.getElementById('reservationDate').value;
            const reservationTime = document.getElementById('reservationTime').value;
            const room = document.getElementById('room').value;
            const timeLimit = document.getElementById('timeLimit').value;
            const event = document.getElementById('event').value;

            if (!user || !reservationDate || !reservationTime || !room || !timeLimit || !event) {
                showAlert('Error', 'Please fill in all the required fields.', 'error');
                return false; // Prevent form submission
            }
            const today = new Date().toISOString().slice(0, 10);

            if (reservationDate < today) {
                showAlert('Error', 'You cannot make a reservation for a past date.', 'error');
                return false; // Prevent form submission
            }

            // Check other form fields here if needed

            return true; // Allow form submission
        }

        function showAlert(title, text, type) {
            Swal.fire({
                icon: type,
                title: title,
                text: text,
            });
        }
    </script>
    <script>
        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Assuming the form validation logic is in the validateForm function
            if (validateForm()) {
                // Form is valid, submit the form using AJAX or the default behavior
                // You can add an AJAX request here, or let the form submit naturally

                // Display the success alert
                showAlert('Success', 'Booking made successfully! Wait for Confirmation', 'success');
            }
        });

        function showAlert(title, text, type) {
            Swal.fire({
                icon: type,
                title: title,
                text: text,
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookingDateInput = document.getElementById('booking_date');

            // Get the current date in the format 'YYYY-MM-DD'
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the minimum date of the booking_date input to the current date
            bookingDateInput.min = currentDate;
        });
    </script>
<script>
    var durationInput = document.getElementById('duration');
    var minutesInput = document.getElementById('minutes');
    var reservationTimeInput = document.getElementById('booking_time');
    var timeLimitInput = document.getElementById('timeLimit');

    function updateEndTime() {
        var duration = parseInt(durationInput.value);
        var minutes = parseInt(minutesInput.value);

        // Ensure the duration and minutes are within valid ranges
        if (duration > 10) {
            durationInput.value = 10;
            duration = 10;
        }

        if (minutes > 55) {
            minutesInput.value = 55;
            minutes = 55;
        }

        var reservationTime = reservationTimeInput.value;

        if (reservationTime) {
            // Use moment.js for better date and time handling
            var startTime = moment('2000-01-01 ' + reservationTime, 'YYYY-MM-DD HH:mm');
            startTime.add(duration, 'hours').add(minutes, 'minutes');

            // Format the end time as 'hh:mm'
            var endTime = startTime.format('HH:mm');

            timeLimitInput.value = endTime;
        }
    }

    // Attach event listeners to the duration, minutes, and reservation time inputs
    durationInput.addEventListener('input', updateEndTime);
    minutesInput.addEventListener('input', updateEndTime);
    reservationTimeInput.addEventListener('input', updateEndTime);

    // Trigger initial calculation
</script>
<script>
    // Get references to the elements
   // Function to update the capacity tooltip based on the selected room
function updateCapacityTooltip() {
    var selectRoom = document.getElementById('selectRoom');
    var capacityInput = document.getElementById('capacity');
    
    // Get the selected room's capacity
    var selectedRoom = selectRoom.options[selectRoom.selectedIndex];
    var roomCapacity = selectedRoom.getAttribute('data-capacity');
    
    // Set the tooltip (title) to display the room's capacity
    capacityInput.setAttribute('title', 'Room Capacity: ' + roomCapacity + ' people');
}

// Attach an event listener to the room selection field
document.getElementById('selectRoom').addEventListener('change', updateCapacityTooltip);

// Initialize the tooltip when the page loads
updateCapacityTooltip();

</script>
<script src="../../plugins/chart.js/Chart.min.js"></script>

<script>
    // Get a reference to the input element
    var bookingTimeInput = document.getElementById("booking_time");

    // Add an event listener to check the selected time
    bookingTimeInput.addEventListener("input", function() {
        var selectedTime = new Date("2000-01-01 " + bookingTimeInput.value);

        var startTime = new Date("2000-01-01 7:30:00"); // 8 AM
        var endTime = new Date("2000-01-01 19:00:00");  // 8 PM

        if (selectedTime < startTime || selectedTime > endTime) {
            // Invalid time selected
            alert("Please select a time between 7:30 AM and 7 PM.");
            bookingTimeInput.value = "07:30"; // Reset to 8 AM
        }
    });
</script>



    @endsection
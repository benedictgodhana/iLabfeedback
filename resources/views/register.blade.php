<!DOCTYPE html>
<html lang="en">
<head>

     <title>Feedback</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Bootstrap JS Bundle (Bootstrap + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-e2vgVS1Scd9u6HhqIo9seFD5tkck6rjnFq+qu4vR5iS0xoUu89bY5s6jH6AOf41Y" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="{{ asset('health-center-master/css/bootstrap.min.css') }}">
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('health-center-master/css/font-awesome.min.css') }}">
    <!-- Link to Animate CSS -->
    <link rel="stylesheet" href="{{ asset('health-center-master/css/animate.css') }}">
    <!-- Link to Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('health-center-master/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('chealth-center-master/ss/owl.theme.default.min.css') }}">
    <!-- Link to Your Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('health-center-master/css/tooplate-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">



     <!-- PRE LOADER -->
     

     <!-- HEADER -->
     


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation" style="background:darkblue;color:white;height:100px">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="background:white;">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/" style="display: inline-block; padding: 5px;margin-top:-30px">
  <img src="/logo/iLab white Logo-01.png" alt="iLab Logo" style="height: 150px; max-width: 250px;">
</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/" class="smoothScroll" style="color:white">Home</a></li>
        <li><a href="/login"  style="color:white">Admin Login</a></li>
        <li><a href="{{ route('register') }}" class="smoothScroll btn" style="color:white; background:orange;">Give Feedback</a></li>

    </ul>
</div>



          </div>
     </section>

<!-- Login Modal -->


     <!-- HOME -->
    
     <!-- ABOUT -->
     <section>
    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp text-center" data-wow-delay="0.6s" style="color:black;font-weight:800;margin:8px"></h2>
                        <!-- Feedback Form -->
                        <form action="{{ route('feedback.store') }}" method="post">

                        <div id="successAlert" class="alert alert-success" style="display: none;"></div>

                                                  @csrf <!-- CSRF protection for Laravel -->
                            
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>

                            <div class="form-group">
                                <label for="email">Email (optional):</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="number">Phone Number (optional):</label>
                                <input type="number" class="form-control" id="email" name="contact" placeholder="+254712345678">
                            </div>

                            <div class="form-group">
                              <label for="category">Category:</label>
                              <select class="form-control" id="category" name="category_id">
                                   <option value="">Select category...</option>
                                   @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                   @endforeach
                              </select>
                              </div>


                            <div class="form-group">
                                <label for="message">Your Feedback:</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>

                            <button type="submit" id="submitBtn" class="btn" style="background: darkblue; color: white">
                         <span id="spinnerIcon" style="display: none;"><i class="fas fa-sync fa-spin"></i>&nbsp;</span>
                         Submit Feedback
                         </button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





     <!-- TEAM -->
    
   
   

                   

     <!-- FOOTER -->
     <footer  style="background:darkblue">
          <div class="container">
               <div class="row" >

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s" style="color:white"></h4>

                              <div class="contact-info" >
                                   <img src="/logo/iLab white Logo-01.png" alt=""  style="height:160px">
                              </div>
                         </div>
                    </div>


                  


                    

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s" style="color:white">Opening Hours</h4>
                                   <p style="color:white">Monday - Friday <span>08:30 AM - 5:30 PM</span></p>
                                   <p style="color:white">Saturday <span>09:00 AM - 01:00 PM</span></p>
                                   <p style="color:white"> Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a style="color:white" href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a style="color:white" href="#" class="fa fa-twitter"></a></li>
                                   <li><a style="color:white" href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s" style="color:white">Contact Info</h4>

                                                            <div class="contact-info">
                              <p style="color:white"><i class="fa fa-phone"></i>0703034616</p>
                              <p style="color:white"><i class="fa fa-envelope-o"></i> <a href="mailto:ilabafrica@strathmore.edu" style="color:white">ilabafrica@strathmore.edu</a></p>
                              <p style="color:white"><i class="fa fa-globe"></i> <a href="http://www.ilabafrica.strathmore.edu" style="color:white">www.ilabafrica.strathmore.edu</a></p>
                              <p style="color:white"><i class="fa fa-map-marker"></i> <a href="#" style="color:white">Strathmore University Student Centre, Keri Rd</a></p>

                              </div>

                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p style="color:white">Copyright &copy; iLabAfrica
                                   
                              </div>
                         </div>
                        
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


     <script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Select the success message element
        var successMessage = $('.alert-success');
        
        // Check if the success message exists
        if (successMessage.length) {
            // Hide the success message after 3 seconds
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 3000);
        }
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitBtn').click(function(event) {
            // Prevent default form submission
            event.preventDefault();
            
            // Disable the button and show spinner icon
            $(this).prop('disabled', true);
            $('#spinnerIcon').show();
            
            // Submit the form asynchronously
            $.ajax({
                url: $(this).closest('form').attr('action'),
                method: 'POST',
                data: $(this).closest('form').serialize(),
                success: function(response) {
                    // If submission is successful, show success message
                    $('#successAlert').html('Feedback submitted successfully!').show();
                    // Fade out the success alert after 3 seconds
                    setTimeout(function() {
                        $('#successAlert').fadeOut();
                    }, 3000);
                    // Optionally, redirect the user to another page
                    // window.location.href = '/thank-you';
                },
                error: function(xhr, status, error) {
                    // If submission fails, show error message
                    alert('Error: ' + error);
                },
                complete: function() {
                    // Re-enable the button and hide spinner icon after submission is complete
                    $('#submitBtn').prop('disabled', false);
                    $('#spinnerIcon').hide();
                }
            });
        });
    });
</script>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
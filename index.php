<?php include "includes/header.php"; ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider d-flex align-items-center slider_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="slider_text ">
                        <span>Get Started Today.</span>
                        <h3>Take A bite<br> Out of Hunger !!</h3>
                        <p>Make your leftover food be others' meal!<br> Think before you throw away..</p>
                        <a href="About.php" class="boxed-btn3">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- news__area_start  -->
<div class="news__area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Donation</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a href="FoodItems.php">
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="img/fitems.jpg" alt="">
                        </div>
                        <div class="newsinfo">
                            <h3>Food Items<br> Details</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="delivery.php">
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="img/ditem.jpg" alt="">
                        </div>
                        <div class="newsinfo">
                            <h3>Status Check</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- news__area_end  -->

<div data-scroll-index='1' class="make_donation_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Fund Raising</span></h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form id="donationForm" class="donation_form text-center">
                        <div class="row align-items-center">
                        <div class="col-md-4" style="flex: 34 13 68.333333%;max-width: 96.333333%;">
                                <div class="single_amount">
                                    <div class="input_field">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">₹</span>
                                            </div>
                                            <input type="text" id="donationAmount" class="form-control" placeholder="Enter amount" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="donate_now_btn text-center">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary buy_now" data-img="//www.tutsmake.com/wp-content/uploads/2019/03/vvjghg.png" data-id="2">Donate now</a> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Assuming you have already established a connection to your database
// Replace the database credentials with your own
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'reefood_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select the total amount from the orders table
$sql = "SELECT SUM(amount) AS total_amount FROM orders";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $total_amount = $row["total_amount"];
    }
} else {
    $total_amount = 0; // If there are no rows in the orders table
}

$conn->close();
?>

<div class="counter_area pt-120">
    <div class="container">
        <div class="counter_bg overlay">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-calendar"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter"><?php echo $total_amount; ?></h3>
                            <p>Total Funds</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<!-- Include jQuery -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(document).ready(function(){
        // Update data-amount attribute with entered donation amount
        $('.buy_now').on('click', function(e){
            var donationAmount = $('#donationAmount').val();
            $(this).attr('data-amount', donationAmount);
        });
        
        // Handling donation submission
        $('body').on('click', '.buy_now', function(e){
            var prodimg = $(this).attr("data-img");
            var totalAmount = $(this).attr("data-amount");
            var product_id =  $(this).attr("data-id");
            var options = {
                "key": "rzp_test_j3JubQCOxSzYx8",
                "amount": (totalAmount*100), // Amount in paise
                "name": "Reefood",
                "description": "Payment",
                "handler": function (response){
                    $.ajax({
                        url: 'payment-proccess.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            totalAmount: totalAmount,
                            product_id: product_id,
                        }, 
                        success: function (msg) {
                            window.location.href = 'payment-success.php';
                        }
                    });
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        });
    });
</script>

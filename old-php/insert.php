<?php include 'includes/header-link.php';
include 'db_connect.php';

session_start();

if (isset($_SESSION["username"])) {
    header("Location: {$hostname}dashboard.php");
}



$user = "homo01";
$password = "Homo@19";
$senderid = "EKAUMS";
$smsurl = "http://smpp.webtechsolution.co/http-api.php?";


function httpRequest($url)
{
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern, $url, $args);
    $in = "";
    $fp = fsockopen($args[1], 80, $errno, $errstr, 30);
    if (!$fp) {
        return ("$errstr ($errno)");
    } else {
        $args[3] = "C" . $args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
            $in .= fgets($fp, 128);
        }
    }
    fclose($fp);
    return ($in);
}


function SMSSend($phone, $msg, $template, $debug = false)
{
    global $user, $password, $senderid, $smsurl;

    $url = 'http://smpp.webtechsolution.co/http-tokenkeyapi.php?authentic-key=3537686f6d6f30313137331655981948&senderid=EKAUMS&route=1&number=
    ' . urlencode($phone) . '&message=' . urlencode($msg) . '&templateid=' . $template;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    // 	$response = httpRequest($urltouse);
    // echo $url;
    $response = curl_exec($ch);
    curl_close($ch);
    if ($debug) {
        $rc = "Response: <br><pre>" .
            str_replace(array("<", ">"), array("&lt;", "&gt;"), $response) .
            "</pre><br>";
    }

    return ($response);
}

if (isset($_POST['user_sighup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
}

$msg = '';
if (isset($_POST['company_otp_submit'])) {

    // print_r($_POST);

    $otp = $_POST['otp'];
    $original_otp = $_POST['original_otp'];

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);



    $insert = "INSERT INTO tbl_registration (name, mobile, email, password)
             VALUES ('{$name}','{$mobile}','{$email}','{$password}')";

    $_SESSION["username"] = $mobile;
    $_SESSION["name"] = $name;


    if ($original_otp == $otp) {

        if ($conn->query($insert)) {

            $debug = true;

            $message = "Your OTP is " . $otp . " to verify your phone number with sahardirectory.com Pl doesn't share this with anyone else. Thanks Team Sahar Directory (Ekaum Enterprises)";
            $rf = SMSSend($mobile, $message, '1707165665533059542', $debug);
            echo '<br><br>';
            $um = SMSSend($mobile,  $msg,  '1707165665521396509', $debug);

            header("location: {$hostname}dashboard-my-profile.php");
        } else {
            echo '<script>alert("Server error..")</script>';
        }

        header("location: {$hostname}dashboard-profile.php");
    } else {
        $msg = 'Not Registered. You entered wrong OTP. Please Retry';
        echo '<script>alert("' . $msg . '")</script>';
        // echo '<script>window.location="add-company.php"</script>';
    }
}


?>

<div id="main-wrapper">


    <!-- Start Navigation -->
    <?php include 'includes/header2.php' ?>
    <!-- End Navigation -->

    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium">Verify OTP send to your Number</h4>
                            </div>

                            <p style="color:red"><?php echo $msg; ?></p>

                            <form class="submit-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group">
                                    <label class="mb-1">Mobile No.</label>
                                    <input type="text" class="form-control rounded mobile" name="mobile" value="<?= $mobile ?>">
                                    <span id="mainphone" style="color:red"></span>
                                </div>
                                <div class="col-sm-12">
                                    <div id="some_div">
                                    </div>
                                    <p id="otpresends" style="cursor:pointer" class="btn"> Resend OTP </p>
                                    <p id="otpresend" style="cursor:pointer" class="btn btn-success" style="display:none;"> Resend OTP </p>
                                </div>

                                <div class="form-group">
                                    <label class="mb-1">OTP:</label>
                                    <input type="text" class="form-control rounded" name="otp">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="company_otp_submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium" value="Submit" />
                                </div>


                                <input type="hidden" name="original_otp" id="original_otp" class="form-control" value="">

                                <input type="hidden" name="name" value="<?= $name ?>" />
                                <input type="hidden" name="mobile" value="<?= $mobile ?>" />
                                <input type="hidden" name="email" value="<?= $email ?>" />
                                <input type="hidden" name="password" value="<?= $password ?>" />
                                <input type="hidden" name="cpassword" value="<?= $cpassword ?>" />
                            </form>

                            <?php
                            if (isset($_POST['login'])) {
                                include "db_connect.php";
                                if (empty($_POST['email']) || empty($_POST['password'])) {
                                    echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                                    die();
                                } else {
                                    $username = mysqli_real_escape_string($conn, $_POST['email']);
                                    $password = $_POST['password'];

                                    $sql = "SELECT email, password, name FROM tbl_registration WHERE email = '{$username}' AND password = '{$password}'";

                                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            
                                            $_SESSION["username"] = $row['email'];
                                            $_SESSION["name"] = $row['name'];
                                            $_SESSION["id"] = $row['rgid'];

                                            header("Location: {$hostname}dashboard.php");
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                                    }
                                }
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="space min">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-4">
                        <h6 class="theme-cl mb-0">Latest Blogs</h6>
                        <h2 class="ft-bold">Pickup New Updates</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <?php
                $blog_selt = "SELECT * FROM `blog`";
                $result = mysqli_query($conn, $blog_selt) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($blog = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="gup_blg_grid_box">
                                <div class="gup_blg_grid_thumb">
                                    <a href=""><img src="uploads/blogs/<?php echo 'blog-min.jpg'; ?>" class="img-fluid" alt=""></a>
                                </div>
                                <div class="gup_blg_grid_caption">

                                    <div class="blg_title">
                                        <h4><a href=""><?php echo $blog['blog_name']; ?></a></h4>
                                    </div>
                                    <div class="blg_desc">
                                        <p><?php echo $blog['blog_content']; ?></p>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex br-top px-3 py-2">
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul class="blog_ul">
                                                    <li>
                                                        <div class="elsio_ic"><i class="fa fa-eye text-success"></i></div>
                                                        <a href="">Read More</a>
                                                    </li>
                                                    <li class="text-right">
                                                        <div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
                                                        <div class="elsio_tx"><?php echo date_format(date_create($blog['created_date']), 'd M ,Y') ?></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- Single Item -->



            </div>

            <div class="flex-box">
                <a href="blog.php" class="btn btn-md rounded hover-theme home_btn">View More<i class="lni lni-arrow-right-circle ms-2"></i></a>
            </div>

        </div>
    </section>

    <?php include 'includes/footer.php' ?>

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<?php include 'includes/footer-link.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var err = [];
    var mobile = $('.mobile').val();
    //   console.log(alldata+' yu');
    $("#otpresends").show();
    $("#otpresend").hide();
    $('#mobile').text(mobile);
    $.ajax({
        type: "POST",
        url: "sendsms.php",
        data: {
            mobile: mobile
        },
        success: function(data) {
            console.log(data);
            $('#original_otp').val(data);
            setTimeout(function() {
                $("#otpresends").hide();
                $("#otpresend").show();
            }, 40000);
        }
    });
    var timeLeft = 40;
    var elem = document.getElementById('some_div');

    var timerId = setInterval(countdown, 1000);

    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            // doSomething();
        } else {
            elem.innerHTML = timeLeft + ' seconds remaining';
            timeLeft--;
        }
    }
    $('.company_contact').keyup(function() {
        err = [];
        var contact = $('.company_contact').val();
        $.ajax({
            url: "search_contact.php",
            method: "POST",
            data: {
                contact: contact
            },
            success: function(data) {

                if (data == '') {
                    $('#mainphone').text(' ');
                } else {
                    err.push('true');
                    $('#mainphone').text(data);
                    $("#otpresends").show();
                    $("#otpresend").hide();
                    clearInterval(downloadTimer);
                    clearTimeout(timerId);

                }

            }
        });
    });
    $('#otpresend').click(function() {

        var contact = $('.company_contact').val();
        $("#otpresends").show();
        $("#otpresend").hide();
        $('#contact').text(contact);

        var co = jQuery.inArray('true', err);
        // console.log(err);

        if (contact == '' || co >= 0) {
            alert('Please enter valid contact no.');

        } else {
            console.log(contact);

            var timeleft = 40;
            $.ajax({
                type: "POST",

                url: "sendsms.php",
                data: {
                    contact: contact
                },
                success: function(data) {
                    console.log(data);



                    $('#original_otp').val(data);
                    setTimeout(function() {
                        $("#otpresends").hide();
                        $("#otpresend").show();
                    }, 40000);



                }
            });



        }
        var timeleft = 40;
        $('#some_div').text('');
        var downloadTimer = setInterval(function() {
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
                $("#otpresends").hide();
                $("#otpresend").show();
            }

            // var d =10 - timeleft;
            $('#some_div').text(timeleft + ' seconds remaining');
            timeleft -= 1;
        }, 1000);


    });
</script>
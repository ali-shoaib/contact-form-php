<?php include 'mail.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="styling.css" />

<body>
<section >

    <nav class="d-flex flex-row justify-content-center">
    <!--<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>-->
    <img src="contactus.png" class="w-25" />
    <div style="height: 100px;">
        <img src="callus.png" class="mh-100" style="width: 100px; height: 200px;" />
    </div>
    </nav>
    <?php echo $alert; ?>
    <?php echo $failed; ?>    
    <div class="d-flex flex-row">

        <div class="w-50 mx-auto">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control border border-primary rounded" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control border border-primary rounded" name="email" placeholder="Email" required>
                    <?php echo $invalid; ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control border border-primary rounded" id="formGroupExampleInput" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control border border-primary rounded" id="exampleFormControlTextarea1" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <button type="reset" class="btn btn-primary float-right">Reset</button>
                <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfjUhUaAAAAADUraf8FP8AVhh6Ex3iQAZw6Mf5V"></div>
                </div>
                <button type="submit" class="btn btn-success w-50 p-3" name="submit">Submit</button>
            </form>
        </div>
        
    </div>

</section>
<script src="https://www.google.com/recaptcha/api.js" async defer>
if(window.history.replaceState){
    window.history.replacement(null, null, window.location.href);
}
</script>

</body>
</html>
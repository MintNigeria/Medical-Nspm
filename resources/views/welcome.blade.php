<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    <link rel="icon" href="{{ asset("images/logo.png") }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSPMC's CaseNotes</title>
</head>

<body>

    <div class="header">
        <div class="header_logo">
            <div>
                <img src="{{ asset("images/logo.png") }}" alt="nspm logo" >
            </div>
            <div class="header_casenotes">
                <h3 id="header_font_600">NSPMC's <br>Case<span class='header_notes'>Notes</span></h3>
            </div>
        </div>

        <div class="header_center"  style="color: #fff; font-weight: 700;position: absolute; font-size: 30px; display: flex; flex-direction: column; align-items: center; text-align: center;">
            Building a Stronger & Healthier NSPM Together
            <a class="btn" href="/users/login">Get Started</a>
        </div>


    </div>

    <div class="services">

        <h2 id="header_font_600">Our <span class='header_notes'>Services</span></h2>

        <div class="services_boxes">
            <section class="services_boxes_box"><img src="{{ asset("images/records.png") }}" alt="records">
               <div class="services_overlay_text">
                Patient and dependent <br> record-keeping.
               </div>
            </section>
            <section class="services_boxes_box"><img src="{{ asset("images/automate.png") }}" alt="automate">
                <div class="services_overlay_text">
                    Streamline the sick leave <br> procedure through <br> automation.
                </div>
            </section>
            <section class="services_boxes_box"><img src="{{ asset("images/attendTo.png") }}" alt="attendTo">
                <div class="services_overlay_text">
                    Providing patients with <br> good care.
                </div>
            </section>
        </div>

    </div>

    <div class="aboutUs">
        <div class="aboutUs_img">
            <img src="{{ asset("images/aboutUsPic.png") }}" alt="doctor standing and smiling" id="aboutUs_img_id">
        </div>
        <div class="aboutUs_text">
            <h2 id="header_font_500">About <span class="header_notes_pink">Us</span></h2>
            <p>
                The Application is designed to handle the processing of staffers records from inception to closing ensuring that
                we preerve staff records while priotrising security for each record.
            </p>
        </div>

    </div>

    <div class="conclude">

        <div class="conclude_text">
            <h1 class="conclude_text_text">DISCOVER A <br> HEALTHY AND HAPPIER <br> <span class="conclude_text_bold">YOU</span></h1>
        </div>

        <div class="conclude_image">
            <img src="{{ asset("images/endPic.png") }}" alt="happy doctors" id="conclude_image_id">
        </div>

    </div>
    <div class="footer">
        <div class="footer_text">
            <h3> Deigned and developed by NSPM ICT</h3>
        </div>

    </div>

</body>
</html>



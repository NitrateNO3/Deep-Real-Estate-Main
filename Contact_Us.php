<? include 'include/header.php'
?>
    <!-- Contact Detail Start -->
        <section class="contact-form-wrapper text-center index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h2 class="main-title">Contact Us</h2>
                        <div class="dis">
                            <p>Contact us with a question or concern</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <form class="contact-form">
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label>Full Name</label>
                                <input type="text" id="fullname" name="first-name" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label>Mobile No.</label>
                                <input type="text" id="mobileno" name="last-name" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label>Email Address</label>
                                <input type="email" id="emailid" name="email">
                            </div>
                           
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group">
                                <label>What is this regarding?</label>
                                <input type="text" id="subject" name="text">
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <label>Message</label>
                                <textarea  id="message"></textarea>
                            </div>
                            <button type="submit" id="contactButton" class="btn-1 flat-btn">
                                <span>send message</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- Contact Detail Start -->

    <!-- Find An Agent Start -->
        <section class="find-agent index">
            <figure></figure>
            <div class="overlay">
                
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="story">
                            <h3>Looking for a right Suggestion?</h3>
                            <p>Deep Real Estate is having a vast experienced executives in property assitance to get you the most perfect options for your requirements.
                            for selling, buying and renting. Feel free to connect with us for your any type of requirements.</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Find An Agent End -->

    <!-- Direct Line Start -->
        <section class="direct-line-wrapper index text-center section-padding" id="supportTeam">
            <div class="container">
                <h2 class="main-title mission-text"> Need a direct line ?</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>General Questions</h5>
                        <p>Contact our Corporate HQ.</p>
                        <a href="tel:<?=$admin['Phone1']?>" class="link"><?=$admin['Phone1']?></a>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Customer Feedback</h5>
                        <p>Report a technical issue with our site or apps.</p>
                        <a href="mailto:<?=$admin['Email1']?>" class="link"><?=$admin['Email1']?></a>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Find a Property</h5>
                        <p>Call to our quick assitance team.</p>
                        <a href="tel:<?=$admin['Mobile1']?>" class="link"><?=$admin['Mobile1']?></a>
                    </div>
                </div>
            </div>
        </section>
    <!-- Direct Line End -->

   
   <? include 'include/footer.php'
?>
<?php
ob_start();
$currentPage ='faq';
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Ad</title>
</head>
<body>
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Frequently Asked Questions</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Faq Area -->
    <section class="faq section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>How do I place an ad?</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Start by creating a user account on Agriconnect. This ensures a personalized experience and allows you to manage your ads seamlessly</p>
                                    <p>Once logged in, locate the "Post an Ad" section on the platform. This is typically accessible from the homepage or a designated section within the user dashboard
                                    Choose the appropriate category for your agricultural product, whether it be crops or livestock. This ensures your ad reaches the right audience.
Fill in the necessary details for your ad, including product specifications, quantities available, pricing, and any unique features. Upload high-quality photos to enhance the visibility and appeal of your listing
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>Who shouldi to contact if i Have any question?</span><i
                                        class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>If you have any questions or inquiries while using Agriconnect, our dedicated Customer Support Team is readily available to assist you. You can reach out to us by navigating to the "Contact Us" section on the platform,
                                         typically found in the website's footer or within the user dashboard. Here, you'll find various contact options, including email and a dedicated customer support phone number.</p>
                                    <p>Additionally, you may find valuable information and resources in the platform's FAQs or user guides, which can offer insights into common queries. At Agriconnect, 
                                        we prioritize customer satisfaction, and our support team is dedicated to fostering a positive and informed user experience for both farmers and retailers in the
                                         agricultural community.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>How can i cancel or change my order?</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Verify the current status of your order. If the order is still in processing or hasn't been approved, you may have the option to cancel or modify it.
If the platform doesn't provide automated tools for order changes or cancellations, reach out to Agriconnect's Customer Support Team promptly. 
You can use the "Contact Us" section on the platform or refer to the provided customer support email or phone number.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>How can i apply for A Refund of Booking Amount?</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>In Agriconnect, the booking process operates with a commitment-oriented approach 
                                        where users pay an advance booking amount to secure agricultural products. Typically, 
                                        this platform does not facilitate refunds for booking amounts due to the nature of the transactions, 
                                        which involve direct physical interaction for inspection and final purchase. However, in exceptional cases, 
                                        users seeking a refund can reach out to Agriconnect's Customer Support Team through the provided channels..</p>
                                    <p>To initiate the process, users should contact customer support, clearly explaining the circumstances necessitating the refund. 
                                        Providing detailed booking information, including the booking ID, is crucial for the support team to identify the transaction.
                                         Users are advised to review the platform's refund policy to understand any specific criteria or 
                                         exceptional circumstances that may warrant a refund!</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span>How Can I Report a Product or Seller?</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
Reporting a product or seller on Agriconnect is a straightforward process to ensure the platform's integrity and user safety. If you encounter an issue with a product or seller that violates the platform's policies or raises concerns.
Locate the specific product or seller that you want to report. This can usually be done by accessing the product listing or seller's profile.
On the product page or seller's profile, there should be options for reporting. This might be represented by a "Report" button, "Flag" icon, or similar. Click on this option.
Provide details about the issue you are reporting. If it's related to a product, specify the problem with the item or any misleading information. If it involves a seller, describe the concerning behavior or any policy violations.
                                         </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Faq Area -->

    <!-- Start Newsletter Area -->
    <div class="newsletter section">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="title">
                            <i class="lni lni-alarm"></i>
                            <h2>Newsletter</h2>
                            <p>We don't send spam so don't worry.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>
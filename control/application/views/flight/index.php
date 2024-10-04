<style>
    .textboxlist-bit-editable {
        border: none !important;
    }
.mb-10{
    margin-bottom: 10px;
}
    .textboxlist-bits {
        zoom: 1;
        overflow: hidden;
        margin: 0;
        border: none !important;
        padding-bottom: 10px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        background-color: #3a3b3c;
        color: #e4e6eb !important;
    }

    .textboxlist-bit-editable-input {
        background: transparent;
        color: #fff;
        font-size: 1rem;
    }

    .ui-autocomplete {
        position: absolute;
        background: #565656;
        z-index: 99;
        list-style: none;
        padding: 0px 5px;
    }

    .ui-autocomplete>li {
        border-bottom: 1px solid;
    }
    .loader {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 2s linear infinite;
    display: none;
    position: absolute;
    right: 18px;
    top: 57%;
    transform: translateY(-50%);
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#airline_code {
    text-transform: uppercase; /* Capitalizes all input text */
}
#departure_location {
    text-transform: uppercase; /* Capitalizes all input text */
}
#arrival_location {
    text-transform: uppercase; /* Capitalizes all input text */
}
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Blog Add</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Flight</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Flight Details</li>
                </ol>
            </div>
            <br>
            <?php if ($this->session->flashdata('status') == 1) { ?>
                <h6 style="color: #9e1a1a; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
            <?php } else {
            ?>
                <h6 style="color: #1e7e34;  text-align: center;"><?php echo $this->session->flashdata('msg'); ?></h6>
            <?php

            }
            ?>
            <div class="col-sm-3">
                <!-- <div class="btn-group float-sm-right">-->
                <!--  <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>-->
                <!--  <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">-->
                <!--  <span class="caret"></span>-->
                <!--  </button>-->
                <!--  <div class="dropdown-menu">-->
                <!--    <a href="javaScript:void();" class="dropdown-item">Action</a>-->
                <!--    <a href="javaScript:void();" class="dropdown-item">Another action</a>-->
                <!--    <a href="javaScript:void();" class="dropdown-item">Something else here</a>-->
                <!--    <div class="dropdown-divider"></div>-->
                <!--    <a href="javaScript:void();" class="dropdown-item">Separated link</a>-->
                <!--  </div>-->
                <!--</div>-->
            </div>
        </div>
        <!-- End Breadcrumb-->
        <?php
        if (!empty($msg)) {
        ?>
            <h6 style="color: #9e1a1a;  text-align: center;"><?php echo $msg; ?></h6>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($flight_details)): ?>
                            <?php foreach ($flight_details as $key=>$flight): ?>
                                <?php if ($key==0): ?>
                                <form action="<?php echo base_url('save-flight'); ?>" name="blog_frm" id="blog_frm" method="post" enctype="multipart/form-data">
                                   <input type="hidden" name="flight_page_info_id" id="flight_page_info_id" value="<?php echo $flight['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner_top_title">Banner Top Title</label>
                                                <input type="text"
                                                    class="form-control"
                                                    name="banner_top_title"
                                                    id="banner_top_title"
                                                    value="<?php echo htmlspecialchars($flight['top_title']); ?>"
                                                    placeholder="Enter banner top title"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner_top_desc">Banner Top Description</label>
                                                <textarea class="form-control"
                                                    name="banner_top_desc"
                                                    id="banner_top_desc"
                                                    placeholder="Enter banner top description"><?php echo htmlspecialchars($flight['top_desc']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Customer Support Section</h5>
                                            <hr>
                                        </div>
                                        <!-- First Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cust_support_title1">First Block</label>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="cust_support_title1" 
                                                    id="cust_support_title1" 
                                                    value="<?php echo htmlspecialchars($flight['cust_support_title1']); ?>" 
                                                    required 
                                                    placeholder="Title">
                                                <textarea class="form-control" 
                                                        name="cust_support_desc1" 
                                                        id="cust_support_desc1" 
                                                        placeholder="Block Description"><?php echo htmlspecialchars($flight['cust_support_desc1']); ?></textarea>
                                                <input type="file" 
                                                    name="cust_support_file1" 
                                                    id="cust_support_file1" 
                                                    onchange="previewImage(event, 'preview1')">
                                                <img id="preview1" 
                                                    src="<?php echo !empty($flight['cust_support_file1']) ? base_url($flight['cust_support_file1']) : base_url('assets/images/flight/6070.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:60px; margin-top:10px;" />
                                            </div>
                                        </div>

                                        <!-- Second Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cust_support_title2">Second Block</label>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="cust_support_title2" 
                                                    id="cust_support_title2" 
                                                    value="<?php echo htmlspecialchars($flight['cust_support_title2']); ?>" 
                                                    required 
                                                    placeholder="Title">
                                                <textarea class="form-control" 
                                                        name="cust_support_desc2" 
                                                        id="cust_support_desc2" 
                                                        placeholder="Block Description"><?php echo htmlspecialchars($flight['cust_support_desc2']); ?></textarea>
                                                <input type="file" 
                                                    name="cust_support_file2" 
                                                    id="cust_support_file2" 
                                                    onchange="previewImage(event, 'preview2')">
                                                <img id="preview2" 
                                                    src="<?php echo !empty($flight['cust_support_file2']) ? base_url($flight['cust_support_file2']) : base_url('assets/images/flight/6070.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:60px; margin-top:10px;" />
                                            </div>
                                        </div>

                                        <!-- Third Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cust_support_title3">Third Block</label>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="cust_support_title3" 
                                                    id="cust_support_title3" 
                                                    value="<?php echo htmlspecialchars($flight['cust_support_title3']); ?>" 
                                                    required 
                                                    placeholder="Title">
                                                <textarea class="form-control" 
                                                        name="cust_support_desc3" 
                                                        id="cust_support_desc3" 
                                                        placeholder="Block Description"><?php echo htmlspecialchars($flight['cust_support_desc3']); ?></textarea>
                                                <input type="file" 
                                                    name="cust_support_file3" 
                                                    id="cust_support_file3" 
                                                    onchange="previewImage(event, 'preview3')">
                                                <img id="preview3" 
                                                    src="<?php echo !empty($flight['cust_support_file3']) ? base_url($flight['cust_support_file3']) : base_url('assets/images/flight/6070.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:60px; margin-top:10px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Special Offer Section</h5>
                                            <hr>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" 
                                                class="form-control" 
                                                name="special_offer_title" 
                                                id="special_offer_title" 
                                                value="<?php echo htmlspecialchars($flight['special_offer_title']); ?>" 
                                                required 
                                                placeholder="Enter If Want To Change Section Title">
                                        </div>

                                        <div class="col-md-6">
                                            <textarea class="form-control" 
                                                    name="special_offer_desc" 
                                                    id="special_offer_desc" 
                                                    placeholder="Enter If Want To Change Section Description"><?php echo htmlspecialchars($flight['special_offer_desc']); ?></textarea>
                                        </div>

                                        <!-- First Offer Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="special_offer_link1">First Offer Link</label>
                                                <input type="url" 
                                                    class="form-control" 
                                                    name="special_offer_link1" 
                                                    id="special_offer_link1" 
                                                    value="<?php echo htmlspecialchars($flight['special_offer_link1']); ?>" 
                                                    required 
                                                    placeholder="Link URL">
                                                <textarea class="form-control" 
                                                        name="special_offer_desc1" 
                                                        id="special_offer_desc1" 
                                                        placeholder="Offer Description"><?php echo htmlspecialchars($flight['special_offer_desc1']); ?></textarea>
                                                <input type="file" 
                                                    name="special_offer_image1" 
                                                    id="special_offer_image1" 
                                                    onchange="previewImage(event, 'preview_offer1')">
                                                <img id="preview_offer1" 
                                                    src="<?php echo !empty($flight['special_offer_image1']) ? base_url($flight['special_offer_image1']) : base_url('assets/images/flight/510560.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:410px; margin-top:10px;" />
                                            </div>
                                        </div>

                                        <!-- Second Offer Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="special_offer_link2">Second Offer Link</label>
                                                <input type="url" 
                                                    class="form-control" 
                                                    name="special_offer_link2" 
                                                    id="special_offer_link2" 
                                                    value="<?php echo htmlspecialchars($flight['special_offer_link2']); ?>" 
                                                    required 
                                                    placeholder="Link URL">
                                                <textarea class="form-control" 
                                                        name="special_offer_desc2" 
                                                        id="special_offer_desc2" 
                                                        placeholder="Offer Description"><?php echo htmlspecialchars($flight['special_offer_desc2']); ?></textarea>
                                                <input type="file" 
                                                    name="special_offer_image2" 
                                                    id="special_offer_image2" 
                                                    onchange="previewImage(event, 'preview_offer2')">
                                                <img id="preview_offer2" 
                                                    src="<?php echo !empty($flight['special_offer_image2']) ? base_url($flight['special_offer_image2']) : base_url('assets/images/flight/510560.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:410px; margin-top:10px;" />
                                            </div>
                                        </div>

                                        <!-- Third Offer Block -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="special_offer_link3">Third Offer Link</label>
                                                <input type="url" 
                                                    class="form-control" 
                                                    name="special_offer_link3" 
                                                    id="special_offer_link3" 
                                                    value="<?php echo htmlspecialchars($flight['special_offer_link3']); ?>" 
                                                    required 
                                                    placeholder="Link URL">
                                                <textarea class="form-control" 
                                                        name="special_offer_desc3" 
                                                        id="special_offer_desc3" 
                                                        placeholder="Offer Description"><?php echo htmlspecialchars($flight['special_offer_desc3']); ?></textarea>
                                                <input type="file" 
                                                    name="special_offer_image3" 
                                                    id="special_offer_image3" 
                                                    onchange="previewImage(event, 'preview_offer3')">
                                                <img id="preview_offer3" 
                                                    src="<?php echo !empty($flight['special_offer_image3']) ? base_url($flight['special_offer_image3']) : base_url('assets/images/flight/510560.png'); ?>" 
                                                    alt="Image Preview" 
                                                    style="width:410px; margin-top:10px;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="background: #484848; padding: 10px 0px; margin-bottom: 15px;">
                                        <div class="col-md-12">
                                            <h5 style="color: white;">Flight Recommendation</h5>
                                            <hr style="border-color: white;">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" 
                                                class="form-control" 
                                                name="flight_title" 
                                                id="flight_title" 
                                                value="<?php echo htmlspecialchars($flight['flight_title']); ?>" 
                                                 
                                                placeholder="Enter If Want To Change Section Title">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <textarea class="form-control" 
                                                    name="flight_desc" 
                                                    id="flight_desc" 
                                                    placeholder="Enter If Want To Change Section Description"><?php echo htmlspecialchars($flight['flight_desc']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-10" id="flight-form">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <label for="airline_code" style="color: white;">Airline Code:</label>
                                                    <input type="text" 
                                                        id="airline_code" 
                                                        name="airline_code" 
                                                        class="form-control" 
                                                        placeholder="AA" 
                                                        value="" 
                                                        >
                                                        <div class="loader" id="loader" ></div>
                                                    <input type="hidden" id="airline_name" name="airline_name" value="">
                                                    <input type="hidden" id="airline_logo" name="airline_logo" value="">
                                                    <ul id="airlineSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="departure_date" style="color: white;">Departure Date:</label>
                                                    <input type="date" 
                                                        id="departure_date" 
                                                        name="departure_date" 
                                                        class="form-control" 
                                                        value="" 
                                                        >
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="departure_location" style="color: white;">Departure Location:</label>
                                                    <input type="text" 
                                                        id="departure_location" 
                                                        class="form-control" 
                                                        placeholder="JFK" 
                                                        value="" 
                                                        >
                                                        <div class="loader" id="loader1" ></div>
                                                    <input type="hidden" id="departure_iata_code_city" class="iata_code_city" name="departure_iata_code_city" placeholder="Add departure">
                                                    <input type="hidden" id="departure_cityname" class="cityname" name="departure_cityname" value="">
                                                    <ul id="departureSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="arrival_location" style="color: white;">Arrival Location:</label>
                                                    <input type="text" 
                                                        id="arrival_location" 
                                                        class="form-control" 
                                                        placeholder="LAX" 
                                                        value="" 
                                                        >
                                                        <div class="loader" id="loader2" ></div>
                                                    <input type="hidden" id="arrival_iata_code_city" class="iata_code_city" name="arrival_iata_code_city" placeholder="Add arrival">
                                                    <input type="hidden" id="arrival_cityname" class="cityname" name="arrival_cityname" value="">
                                                    <ul id="arrivalSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="arrival_date" style="color: white;">Arrival Date:</label>
                                                    <input type="date" 
                                                        id="arrival_date" 
                                                        name="arrival_date" 
                                                        class="form-control" 
                                                        value="" 
                                                        >
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="price" style="color: white;">Price (USD):</label>
                                                    <input type="text" 
                                                        id="price" 
                                                        class="form-control" 
                                                        placeholder="132.19" 
                                                        value="" 
                                                        >
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" id="addFlight" class="btn btn-primary">Add Flight</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Flight Recommendations Table -->
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id="flightTable">
                                                <thead>
                                                    <tr>
                                                        <th>Airline Code</th>
                                                        <th>Departure Date</th>
                                                        <th>Departure Location</th>
                                                        <th>Arrival Location</th>
                                                        <th>Arrival Date</th>
                                                        <th>Price (USD)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Dynamic flight recommendations will be added here -->
                                                    <?php foreach ($flight['flights'] as $index=>$recommendation): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($recommendation['airline_code']); ?></td>
                                                        <td><?php echo htmlspecialchars($recommendation['departure_date']); ?></td>
                                                        <td><?php echo htmlspecialchars($recommendation['departure_location']); ?></td>
                                                        <td><?php echo htmlspecialchars($recommendation['arrival_location']); ?></td>
                                                        <td><?php echo htmlspecialchars($recommendation['arrival_date']); ?></td>
                                                        <td><?php echo htmlspecialchars($recommendation['price']); ?></td>
                                                        <td><button class="btn btn-danger delete-flight" data-index="<?php echo $index; ?>" onclick="deleteFlight(<?php echo $index; ?>);">Delete</button></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="background: #484848; padding: 10px 0px;">
                                        <div class="col-md-12">
                                            <h5 style="color: white;">Top Destinations</h5>
                                            <hr style="border-color: white;">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="destination_title" id="destination_title" required placeholder="Enter If Want To Change Section Title" value="<?php echo htmlspecialchars($flight['destination_title']); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="destination_desc" id="destination_desc" placeholder="Enter If Want To Change Section Description"><?php echo htmlspecialchars($flight['destination_desc']); ?></textarea>
                                        </div>
                                        <!-- Top Destination Input Form -->
                                        <div class="col-md-12 mb-10" id="destination-form">
                                            <div class="row" id="destination-container">
                                                <div class="col-md-3">
                                                    <label for="destinationTitle" style="color: white;">Destination Title:</label>
                                                    <input type="text" id="destinationTitle" class="form-control" placeholder="E.g., Paris"  value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="destinationDescription" style="color: white;">Description:</label>
                                                    <textarea id="destinationDescription" class="form-control" rows="2" placeholder="E.g., The city of lights." ></textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="destinationImage" style="color: white;">Destination Image:</label>
                                                    <input type="file" id="destinationImage" class="form-control" accept="image/*" >
                                                    <img id="imagePreview" src="" alt="Image Preview" style="display:none; width:50px; margin-top:10px;">
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" id="addDestination" class="btn btn-primary">Add Destination</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Top Destinations List -->
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id="destinationTable">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Dynamic destinations will be added here -->
                                                    <?php foreach ($flight['destinations'] as $index=>$destination): ?>
                                                    <tr>
                                                        <td><img src="<?php echo base_url($destination['image']); ?>" alt="Image" style="width:50px;"></td>
                                                        <td><?php echo htmlspecialchars($destination['title']); ?></td>
                                                        <td><?php echo htmlspecialchars($destination['description']); ?></td>
                                                        <td><button class="btn btn-danger delete-destination"  data-index="<?php echo $index; ?>" onclick="deleteDestination(<?php echo $index; ?>);">Delete</button></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="background: #484848; padding: 10px 0px; margin-top: 10px;">
                                        <div class="col-md-12">
                                            <h5 style="color: white;">Customer Reviews</h5>
                                            <hr style="border-color: white;">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="review_title" id="review_title" required placeholder="Enter If Want To Change Section Title" value="<?php echo htmlspecialchars($flight['review_title']); ?>">
                                        </div>

                                        <!-- Customer Review Input Form -->
                                        <div class="col-md-12 mb-10" id="review-form">
                                            <div class="row" id="review-container">
                                                <div class="col-md-3">
                                                    <label for="customerName" style="color: white;">Name:</label>
                                                    <input type="text" id="customerName" class="form-control" placeholder="Your Name" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="star_rating" style="color: white;">Star Rating:</label>
                                                    <select id="star_rating" class="form-control" >
                                                        <option value="" disabled selected>Select Rating</option>
                                                        <option value="1">1 Star</option>
                                                        <option value="2">2 Stars</option>
                                                        <option value="3">3 Stars</option>
                                                        <option value="4">4 Stars</option>
                                                        <option value="5">5 Stars</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="reviewDescription" style="color: white;">Description:</label>
                                                    <textarea id="reviewDescription" class="form-control" rows="2" placeholder="Write your review..." ></textarea>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" id="addReview" class="btn btn-primary">Add Review</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Customer Reviews List -->
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id="reviewTable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Star Rating</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Dynamic reviews will be added here -->
                                                    <?php foreach ($flight['reviews'] as $index=>$review): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($review['name']); ?></td>
                                                        <td><?php echo htmlspecialchars($review['star_rating']); ?> Star(s)</td>
                                                        <td style="max-width: 200px; overflow: auto; white-space: break-spaces;"><?php echo htmlspecialchars($review['description']); ?></td>
                                                        <td><button class="btn btn-danger delete-review" data-index="<?php echo $index; ?>" onclick="deleteReview(<?php echo $index; ?>)">Delete</button></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input-2" style="color: white;">Join Club Section</label>
                                                <textarea class="ckeditor" name="club_section" id="summernoteEditor"><?php echo htmlspecialchars($flight['club_section']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="input-2" style="color: white;">Flight Deals Section</label>
                                                <textarea class="ckeditor" name="flight_deal" id="summernoteEditor1"><?php echo htmlspecialchars($flight['flight_deal']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-10">
                                        <div class="col-md-12">
                                            <h5>Blog Section</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="cust_support_title" 
                                                    id="cust_support_title" 
                                                    value="<?php echo htmlspecialchars($flight['cust_support_title']); ?>" 
                                                    required 
                                                    placeholder="Enter If Want To Change Section Title">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <textarea class="form-control" 
                                                    name="cust_support_desc" 
                                                    id="cust_support_desc" 
                                                    placeholder="Enter If Want To Change Section Description"><?php echo htmlspecialchars($flight['cust_support_desc']); ?></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <form action="<?php echo base_url('save-flight'); ?>" name="blog_frm" id="blog_frm" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="" name="blogid" id="blogid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-1">Banner Top Title</label>
                                            <input type="text" value="" class="form-control" name="banner_top_title" id="banner_top_title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-1">Banner Top Description</label>
                                            <textarea class="form-control" name="banner_top_desc" id="banner_top_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Customer Support Section</h5>
                                        <hr>
                                    </div>

                                    <!-- First Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cust_support_title1">First Block</label>
                                            <input type="text" class="form-control" name="cust_support_title1" id="cust_support_title1" required placeholder="Title">
                                            <textarea class="form-control" name="cust_support_desc1" id="cust_support_desc1" placeholder="Block Description"></textarea>
                                            <input type="file" name="cust_support_file1" id="cust_support_file1" onchange="previewImage(event, 'preview1')">
                                            <img id="preview1" src="<?php echo base_url('assets/images/flight/6070.png'); ?>" alt="Image Preview" style="width:60px; margin-top:10px;" />
                                        </div>
                                    </div>

                                    <!-- Second Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cust_support_title2">Second Block</label>
                                            <input type="text" class="form-control" name="cust_support_title2" id="cust_support_title2" required placeholder="Title">
                                            <textarea class="form-control" name="cust_support_desc2" id="cust_support_desc2" placeholder="Block Description"></textarea>
                                            <input type="file" name="cust_support_file2" id="cust_support_file2" onchange="previewImage(event, 'preview2')">
                                            <img id="preview2" src="<?php echo base_url('assets/images/flight/6070.png'); ?>" alt="Image Preview" style="width:60px; margin-top:10px;" />
                                        </div>
                                    </div>

                                    <!-- Third Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cust_support_title3">Third Block</label>
                                            <input type="text" class="form-control" name="cust_support_title3" id="cust_support_title3" required placeholder="Title">
                                            <textarea class="form-control" name="cust_support_desc3" id="cust_support_desc3" placeholder="Block Description"></textarea>
                                            <input type="file" name="cust_support_file3" id="cust_support_file3" onchange="previewImage(event, 'preview3')">
                                            <img id="preview3" src="<?php echo base_url('assets/images/flight/6070.png'); ?>" alt="Image Preview" style="width:60px; margin-top:10px;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Special Offer Section</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="special_offer_title" id="special_offer_title" required placeholder="Enter If Want To change Section Title">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="special_offer_desc" id="special_offer_desc" placeholder="Enter If Want To change Section Description"></textarea>
                                    </div>
                                    <!-- First Offer Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="special_offer_link1">First Offer Link</label>
                                            <input type="url" class="form-control" name="special_offer_link1" id="special_offer_link1" required placeholder="Link URL">
                                            <textarea class="form-control" name="special_offer_desc1" id="special_offer_desc1" placeholder="Offer Description"></textarea>
                                            <input type="file" name="special_offer_image1" id="special_offer_image1" onchange="previewImage(event, 'preview_offer1')">
                                            <img id="preview_offer1" src="<?php echo base_url('assets/images/flight/510560.png'); ?>" alt="Image Preview" style="width:410px; margin-top:10px;" />
                                        </div>
                                    </div>

                                    <!-- Second Offer Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="special_offer_link2">Second Offer Link</label>
                                            <input type="url" class="form-control" name="special_offer_link2" id="special_offer_link2" required placeholder="Link URL">
                                            <textarea class="form-control" name="special_offer_desc2" id="special_offer_desc2" placeholder="Offer Description"></textarea>
                                            <input type="file" name="special_offer_image2" id="special_offer_image2" onchange="previewImage(event, 'preview_offer2')">
                                            <img id="preview_offer2" src="<?php echo base_url('assets/images/flight/510560.png'); ?>" alt="Image Preview" style="width:410px; margin-top:10px;" />
                                        </div>
                                    </div>

                                    <!-- Third Offer Block -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="special_offer_link3">Third Offer Link</label>
                                            <input type="url" class="form-control" name="special_offer_link3" id="special_offer_link3" required placeholder="Link URL">
                                            <textarea class="form-control" name="special_offer_desc3" id="special_offer_desc3" placeholder="Offer Description"></textarea>
                                            <input type="file" name="special_offer_image3" id="special_offer_image3" onchange="previewImage(event, 'preview_offer3')">
                                            <img id="preview_offer3" src="<?php echo base_url('assets/images/flight/510560.png'); ?>" alt="Image Preview" style="width:410px; margin-top:10px;" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Flight Input Form -->
                                <div class="row" style="background: #484848;padding: 10px 0px;margin-bottom: 15px;">
                                    <div class="col-md-12">
                                        <h5>Flight Recommendation</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="flight_title" id="flight_title" required placeholder="Enter If Want To change Section Title">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="flight_desc" id="flight_desc" placeholder="Enter If Want To change Section Description"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-10" id="flight-form">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label for="airline_code">Airline Code:</label>
                                                <input type="text" id="airline_code" name="airline_code" class="form-control" placeholder="AA" required>
                                                <input type="hidden" id="airline_name" name="airline_name">
                                                <input type="hidden" id="airline_logo" name="airline_logo">
                                                <ul id="airlineSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="departure_date">Departure Date:</label>
                                                <input type="date" id="departure_date" name="departure_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="departure_location">Departure Location:</label>
                                                <input type="text" id="departure_location" class="form-control" placeholder="JFK" required>
                                                <input type="hidden" id="departure_iata_code_city" class="iata_code_city" name="departure_iata_code_city" placeholder="Add departure">
                                                <input type="hidden" id="departure_cityname" class="cityname" name="departure_cityname">
                                                <ul id="departureSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="arrival_location">Arrival Location:</label>
                                                <input type="text" id="arrival_location" class="form-control" placeholder="LAX" required>
                                                <input type="hidden" id="arrival_iata_code_city" class="iata_code_city" name="arrival_iata_code_city" placeholder="Add arrival">
                                                <input type="hidden" id="arrival_cityname" class="cityname" name="arrival_cityname">
                                                <ul id="arrivalSuggestions" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display:none;"></ul>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="arrival_date">Arrival Date:</label>
                                                <input type="date" id="arrival_date" name="arrival_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="price">Price (USD):</label>
                                                <input type="text" id="price" class="form-control" placeholder="132.19" required>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" id="addFlight" class="btn btn-primary">Add Flight</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Flight Recommendations Table -->
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="flightTable">
                                            <thead>
                                                <tr>
                                                    <th>Airline Code</th>
                                                    <th>Departure Date</th>
                                                    <th>Departure Location</th>
                                                    <th>Arrival Location</th>
                                                    <th>Arrival Date</th>
                                                    <th>Price (USD)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dynamic flight recommendations will be added here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="background: #484848;padding: 10px 0px;">
                                    <div class="col-md-12">
                                        <h5>Top Destinations</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="destination_title" id="destination_title" required placeholder="Enter If Want To change Section Title">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="destination_desc" id="destination_desc" placeholder="Enter If Want To change Section Description"></textarea>
                                    </div>
                                    <!-- Top Destination Input Form -->
                                    <div class="col-md-12 mb-10" id="destination-form">
                                        <div class="row" id="destination-container">
                                            <div class="col-md-3">
                                                <label for="destinationTitle">Destination Title:</label>
                                                <input type="text" id="destinationTitle" class="form-control" placeholder="E.g., Paris" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="destinationDescription">Description:</label>
                                                <textarea id="destinationDescription" class="form-control" rows="2" placeholder="E.g., The city of lights." required></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="destinationImage">Destination Image:</label>
                                                <input type="file" id="destinationImage" class="form-control" accept="image/*" required>
                                                <img id="imagePreview" src="" alt="Image Preview" style="display:none; width:50px; margin-top:10px;">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" id="addDestination" class="btn btn-primary">Add Destination</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Top Destinations List -->
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="destinationTable">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dynamic destinations will be added here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="background: #484848;padding: 10px 0px;margin-top:10px;">
                                    <div class="col-md-12">
                                        <h5>Customer Reviews</h5>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="review_title" id="review_title" required placeholder="Enter If Want To change Section Title">
                                    </div>

                                    <!-- Customer Review Input Form -->
                                    <div class="col-md-12 mb-10" id="review-form">
                                        <!-- <h3>Add Customer Review</h3> -->
                                        <div class="row" id="review-container">
                                            <div class="col-md-3">
                                                <label for="customerName">Name:</label>
                                                <input type="text" id="customerName" class="form-control" placeholder="Your Name" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="star_rating">Star Rating:</label>
                                                <select id="star_rating" class="form-control" required>
                                                    <option value="" disabled selected>Select Rating</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Stars</option>
                                                    <option value="3">3 Stars</option>
                                                    <option value="4">4 Stars</option>
                                                    <option value="5">5 Stars</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="reviewDescription">Description:</label>
                                                <textarea id="reviewDescription" class="form-control" rows="2" placeholder="Write your review..." required></textarea>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" id="addReview" class="btn btn-primary">Add Review</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Customer Reviews List -->
                                    <div class="col-md-12">
                                        <!-- <h4>Customer Reviews List</h4> -->
                                        <table class="table table-bordered" id="reviewTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Star Rating</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dynamic reviews will be added here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input-2">Join Club Section</label>
                                            <textarea class="ckeditor" name="club_section" id="summernoteEditor"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="input-2">Flight Deals Section</label>
                                            <textarea class="ckeditor" name="flight_deal" id="summernoteEditor1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                            <h5>Blog Section</h5>
                                            <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cust_support_title" id="cust_support_title" required placeholder="Enter If Want To change Section Title">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="cust_support_desc" id="cust_support_desc" placeholder="Enter If Want To change Section Description"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div>
<script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    // Array to store flight data
    // Array to store flight data

    // Global array to hold flight recommendations
    var flightRecommendations = [];
    <?php if (!empty($flight_details)): ?>
    // Assign flight details to the flightRecommendations array
    var flightRecommendations = <?php echo json_encode($flight_details[0]['flights']); ?>;
    <?php endif; ?>
    // console.log(flightRecommendations);
    // Function to add flight recommendation
    document.getElementById('addFlight').addEventListener('click', function() {
        // Get values from the form
        const airline_code = document.getElementById('airline_code').value;
        const airline_name = document.getElementById('airline_name').value; // Hidden field
        const airline_logo = document.getElementById('airline_logo').value; // Hidden field
        const departure_date = document.getElementById('departure_date').value;
        const departure_location = document.getElementById('departure_location').value;
        const departure_iata_code_city = document.getElementById('departure_iata_code_city').value; // Hidden field
        const departure_city_name = document.getElementById('departure_cityname').value; // Hidden field
        const arrival_location = document.getElementById('arrival_location').value;
        const arrival_iata_code_city = document.getElementById('arrival_iata_code_city').value; // Hidden field
        const arrival_city_name = document.getElementById('arrival_cityname').value; // Hidden field
        const arrival_date = document.getElementById('arrival_date').value;
        const price = document.getElementById('price').value;

        // Create an object for the flight recommendation
        const flight = {
            airline_code,
            airline_name,
            airline_logo,
            departure_date,
            departure_location,
            departure_iata_code_city,
            departure_city_name,
            arrival_location,
            arrival_iata_code_city,
            arrival_city_name,
            arrival_date,
            price
        };

        // Push the flight to the array
        flightRecommendations.push(flight);
        updateFlightTable();
        
        // Optionally, clear the input fields after adding
        // document.getElementById('flight-form').reset();
    });

    // Function to update the flight table
    function updateFlightTable() {
        const tbody = document.querySelector('#flightTable tbody');
        tbody.innerHTML = ''; // Clear previous rows
        // console.log(flightRecommendations);
        flightRecommendations.forEach((flight, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${flight.airline_code}</td>
                <td>${flight.departure_date}</td>
                <td>${flight.departure_location}</td>
                <td>${flight.arrival_location}</td>
                <td>${flight.arrival_date}</td>
                <td>${flight.price}</td>
                <td><button class="btn btn-danger delete-flight" data-index="${index}">Delete</button></td>
            `;
            tbody.appendChild(row);
        });

        // Reattach delete event listener after updating the table
        attachDeleteEventListeners();
    }

    // Function to attach delete event listeners to buttons
    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-flight');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                deleteFlight(index);
            });
        });
    }

    // Function to delete flight
    function deleteFlight(index) {
        flightRecommendations.splice(index, 1); // Remove flight from array
        updateFlightTable(); // Update the displayed table
    }


    // Initialize the destinations array with PHP data if available
    var destinations = [];
    <?php if (!empty($flight_details)): ?>
    // Assign flight details to the destinations array
    destinations = <?php echo json_encode($flight_details[0]['destinations']); ?>;
    <?php endif; ?>

    // Function to preview uploaded image
    document.getElementById('destinationImage').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    // Function to add destination data to the table
    document.getElementById('addDestination').addEventListener('click', function() {
        // Get form values
        const title = document.getElementById('destinationTitle').value;
        const description = document.getElementById('destinationDescription').value;

        // Get the image file
        const imageFile = document.getElementById('destinationImage').files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            // Create destination object and add to destinations array
            const destinationData = {
                title: title,
                description: description,
                image: event.target.result // Store the Base64 string
            };
            destinations.push(destinationData);

            // Update the table with the new destination
            updateDestinationTable();

            document.getElementById('destinationTitle').value = '';
            document.getElementById('destinationDescription').value = '';
            document.getElementById('destinationImage').value = ''; // Clear the file input
            document.getElementById('imagePreview').style.display = 'none'; // Hide the image preview
        };

        if (imageFile) {
            reader.readAsDataURL(imageFile); // Read the file as Base64 data
        }
       
    });

    // Function to update the destination table
    function updateDestinationTable() {
        const tableBody = document.querySelector("#destinationTable tbody");
        tableBody.innerHTML = ''; // Clear existing rows
        console.log(destinations);
        destinations.forEach((destination, index) => {
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td><img src="${destination.image}" alt="Destination Image" width="50"></td>
                <td>${destination.title}</td>
                <td>${destination.description}</td>
                <td><button class="btn btn-danger delete-destination" data-index="${index}" onclick="deleteDestination(${index});">Delete</button></td>
            `;
            tableBody.appendChild(newRow);
        });
    }

    // Function to delete a destination by index
    function deleteDestination(index) {
        if (index >= 0 && index < destinations.length) {
            destinations.splice(index, 1); // Remove destination from the array
            updateDestinationTable(); // Refresh the table to reflect the changes
        }

        // Log the updated destinations array for testing
        console.log(destinations);
    }

        // Array to store review data
    var reviews = [];
    <?php if (!empty($flight_details)): ?>
    // Assign flight details to the destinations array
    var reviews = <?php echo json_encode($flight_details[0]['reviews']); ?>;
    <?php endif; ?>
    // Function to add review data to the table
    document.getElementById('addReview').addEventListener('click', function() {
        // Get form values
        const name = document.getElementById('customerName').value.trim();
        const star_rating = parseInt(document.getElementById('star_rating').value, 10);
        const description = document.getElementById('reviewDescription').value.trim();

        // Validation for empty fields and valid star ratings
        if (!name || !description || isNaN(star_rating) || star_rating < 1 || star_rating > 5) {
            alert("Please enter a valid name, star rating (1-5), and description.");
            return;
        }

        // Create review object and add to reviews array
        const review = {
            name,
            star_rating,
            description
        };
        reviews.push(review);
        updateReviewTable();

        // Optionally clear the form after submission
        // document.getElementById('review-form').reset();
    });

    // Function to update the review table
    function updateReviewTable() {
        const tbody = document.querySelector('#reviewTable tbody');
        tbody.innerHTML = ''; // Clear previous rows
        console.log(reviews);
        reviews.forEach((review, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${review.name}</td>
                <td>${'★'.repeat(review.star_rating) + '☆'.repeat(5 - review.star_rating)}</td>
                <td style="max-width: 200px; overflow: auto; white-space: break-spaces;">${review.description}</td>
                <td><button class="btn btn-danger delete-review" data-index="${index}">Delete</button></td>
            `;
            tbody.appendChild(row);
        });

        // Reattach delete event listeners after updating the table
        attachDeleteEventListeners();
    }

    // Function to attach delete event listeners to buttons
    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-review');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                deleteReview(index);
            });
        });
    }

    // Function to delete a review
    function deleteReview(index) {
        reviews.splice(index, 1); // Remove review from array
        updateReviewTable(); // Update the displayed table
    }

</script>
<script>
    function Getairline_codeAutocomplete() {
    var input = document.getElementById('airline_code');
    var loader = document.getElementById('loader'); // Get loader element
        input.addEventListener('input', function() {
            var value = this.value;

            // Clear previous suggestions before sending a new request
            var suggestionsList = document.getElementById('airlineSuggestions');
            clearSuggestions(suggestionsList);

            // Proceed if input is at least 1 character long
            if (value.length >= 1) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", '<?php echo base_url('apiController/getAirlineList') ?>', true);
                loader.style.display = 'block';
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);

                        // Filter the data based on the airline code using LIKE functionality
                        var filteredData = data.filter(function(item) {
                            return item.AirLineCode.toLowerCase().includes(value.toLowerCase());
                        });

                        // Clear previous suggestions
                        clearSuggestions(suggestionsList);

                        // Create suggestions based on filtered data
                        filteredData.forEach(function(item) {
                            var listItem = document.createElement("li");
                            listItem.innerHTML = `<div class='item_container'>
                                <div class='item_details'>${item.AirLineName}</div>
                                <div class='item_code'>${item.AirLineCode}</div>
                                <div class='item_code'><img src="${item.AirLineLogo}" style="width:70px;"></div>
                            </div>`;
                            
                            listItem.addEventListener('click', function() {
                                input.value = item.AirLineCode;
                                var hiddenFieldName = document.getElementById('airline_name');
                                hiddenFieldName.value = item.AirLineName;
                                var hiddenFieldLogo = document.getElementById('airline_logo');
                                hiddenFieldLogo.value = item.AirLineLogo;
                                clearSuggestions(suggestionsList); // Clear the suggestions after selection
                            });
                            suggestionsList.appendChild(listItem);
                        });
                        loader.style.display = 'none';
                        // Show suggestions if there are any
                        if (suggestionsList.childNodes.length > 0) {
                            suggestionsList.style.display = 'block';
                        } else {
                            suggestionsList.style.display = 'none'; // Hide if no suggestions
                        }
                    }
                };
                xhr.send();
            } else {
                suggestionsList.style.display = 'none'; // Hide suggestions if input is less than 1 character
            }
        });
    }



    // Function to clear suggestions
    function clearSuggestions(list) {
        if (list) { // Check if the list is not null
            while (list.firstChild) {
                list.removeChild(list.firstChild);
            }
            list.style.display = 'none'; // Hide the list after clearing
        }
    }

    document.getElementById('airline_code').addEventListener('keyup', function() {
        Getairline_codeAutocomplete();
    });
    // Call the airline code autocomplete function


    function GetFlightAutocomplete(selector) {
        var input = document.getElementById(selector);
        // Get loader element
        var dataList = document.getElementById(selector === 'departure_location' ? 'departureSuggestions' : 'arrivalSuggestions');
        if(selector === 'departure_location'){
            var loader = document.getElementById('loader1');
        }else{
            var loader = document.getElementById('loader2'); 
        }
        input.addEventListener('input', function() {
            var value = this.value;

            // Clear previous suggestions
            clearSuggestions(dataList);

            if (value.length >= 2) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", '<?php echo $front_url; ?>/airport-city-lookup?q=' + value, true);
                loader.style.display = 'block';
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);

                        // Clear existing suggestions before adding new ones
                        clearSuggestions(dataList);

                        data.forEach(function(item) {
                            var listItem = document.createElement("li");
                            listItem.innerHTML = `<div class='item_container'>
                            <div class='item_details'>${item.cityName}, ${item.countryName}<br>${item.iataCode} : ${item.name}</div>
                            <div class='item_code'>${item.iataCode}</div>
                        </div>`;
                            listItem.addEventListener('click', function() {
                                input.value = item.iataCode; // Set the input value to the selected IATA code
                                var hiddenField = input.parentNode.querySelector(".iata_code_city");
                                hiddenField.value = item.cityName + ", " + item.countryName;

                                // Setting city name in hidden field
                                var citynameField = input.parentNode.querySelector(".cityname");
                                citynameField.value = item.cityName;

                                clearSuggestions(dataList); // Clear the suggestions after selection
                            });
                            dataList.appendChild(listItem);
                            loader.style.display = 'none';
                        });

                        // Make the suggestion list visible
                        dataList.style.display = data.length > 0 ? 'block' : 'none';
                    }
                };
                xhr.send();
            }
        });
    }

    function clearSuggestions(list) {
        if (list) { // Check if the list is not null
            while (list.firstChild) {
                list.removeChild(list.firstChild);
            }
            list.style.display = 'none'; // Hide the list after clearing
        }
    }
    // Attach keyup events for departure_location and arrival_location
    document.getElementById('departure_location').addEventListener('keyup', function() {
        GetFlightAutocomplete('departure_location');
    });

    document.getElementById('arrival_location').addEventListener('keyup', function() {
        GetFlightAutocomplete('arrival_location');
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernoteEditor1').summernote();
        $('#blog_frm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Prepare the data to be sent
            var formData = new FormData(this);
            formData.append('flights', JSON.stringify(flightRecommendations));
            formData.append('destinations', JSON.stringify(destinations));
            formData.append('reviews', JSON.stringify(reviews));
            console.log('Flights:', JSON.stringify(flightRecommendations));
            $.ajax({
                url: '<?php echo base_url('save-flight'); ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        alert('Data saved successfully!');
                        window.location.reload();
                    }
                },
                error: function() {
                    alert('An error occurred while saving data.');
                }
            });
        });
    });
</script>
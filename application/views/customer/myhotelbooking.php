 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h2">Hotel Booking</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
          <tr>
                  <th>BookingId</th>
                  <th>Traveller Details</th>
                  <th>Hotel Details</th>
                  <th>CheckIn</th>
                  <th>CheckOut</th>
                  <th>Createdate</th>
                </tr>
          </thead>
          <tbody>
          <?php
                if(count((array)$customerhotelbookings) > 0)
                {
                    foreach($customerhotelbookings as $booking)
                    {
                        $phone = "";
                        $phone .= $booking->TravellerPhone;
                        if(!empty($booking->TravellerAltPhone))
                        {
                             $phone .= " , ".$booking->TravellerAltPhone;
                        }
                ?>
                <tr>
                  <td><a href="<?php echo base_url('hotel-details/'.$booking->HotelId); ?>" target="_blank"><?php echo $booking->BookingId; ?></td>
                  <td><?php echo $booking->TravellerName."<br>".$booking->TravellerEmail."<br>".$phone ?></td>
                  <td><?php echo $booking->HotelName."<br>".$booking->HotelAddress."<br>".$booking->HotelRating; ?></td>
                  <td class="text-center"><?php echo $booking->CheckIn; ?></td>
                  <td class="text-center"><?php echo $booking->Checkout; ?></td>
                  <td><?php echo date("Y-m-d",strtotime($booking->Createdate)); ?></td>
                </tr>
                <?php
                    }
                }
                else
                {
                ?>
                 <tr>
                 <td colspan="10" style="text-align: center;font-size: 14px;">No Booking Found</td>
                </tr>
                <?php
                }
                ?>
          </tbody>
          <tr>
                  <th>BookingId</th>
                  <th>Traveller Details</th>
                  <th>Hotel Details</th>
                  <th>CheckIn</th>
                  <th>CheckOut</th>
                  <th>Createdate</th>
                </tr>
        </table>
      </div>
    </main>
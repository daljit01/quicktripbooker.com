 
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom custompadd">
        <h1 class="h2">Booking Details</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
          <tr>
                  <th>BookingId</th>
                  <th>Origin</th>
                  <th>Destination</th>
                  <th>Dep date</th>
                  <th>Return date</th>
                  <th>Adults</th>
                  <th>Childs</th>
                  <th>Infants</th>
                  <th>Total travellers</th>
                  <th>Createdate</th>
                </tr>
          </thead>
          <tbody>
          <?php
                if(count((array)$customerbookings) > 0)
                {
                    foreach($customerbookings as $booking)
                    {
                ?>
                <tr>
                  <td><a href="<?php echo base_url('viewbooking/'. $booking->PlainId)?>"><?php echo $booking->PlainId; ?></a></td>
                  <td><?php echo $booking->OriginCity."<br>(".$booking->OriginCode.")"; ?></td>
                  <td><?php echo $booking->DestinationCity."<br>(".$booking->DestinationCode.")"; ?></td>
                  <td class="text-center"><?php echo $booking->DepartureDate; ?></td>
                  <td class="text-center"><?php echo $booking->ReturnDate; ?></td>
                  <td class="text-center"><?php echo $booking->Adults; ?></td>
                  <td class="text-center"><?php echo $booking->Childs; ?></td>
                  <td class="text-center"><?php echo $booking->Infants; ?></td>
                  <td class="text-center"><?php echo $booking->travellers; ?></td>
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
                  <th>Origin</th>
                  <th>Destination</th>
                  <th>Dep date</th>
                  <th>Return date</th>
                  <th>Adults</th>
                  <th>Childs</th>
                  <th>Infants</th>
                  <th>Total travellers</th>
                  <th>Createdate</th>
                </tr>
        </table>
      </div>
    </main>
        
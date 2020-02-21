<div class="container">
                    <div class="text-center contact-title"><!-- Center Begin -->
                        <h4> Pay Offline Using This Method</h4>
                        <p class="text-muted">  After payment confirm order from MY ORDERS section.</p>
                        <p class="text-muted ">
                            If you have any questions, feel free to <a href="../contactus.php">contact us.</a>  </p>
                    </div><!-- Center Finish  -->

    <div class="table-responsive"><!-- table- responsive Begin-->


    <table class="table table-bordered table-hover"><!-- table Begin-->


        <thead><!--thead Begin-->


            <tr class="text-center"><!-- row Begin-->


                <th colspan="2"> Bank Account Details </th>
                <?php 
                $get_bank = "select * from bank_details";
                $run_bank = mysqli_query($con, $get_bank);
               while($row_bank= mysqli_fetch_array($run_bank)){
                   $bank_name = $row_bank['bank_name'];
                   $account_name = $row_bank['account_name'];
                   $account_no = $row_bank['account_no'];


?>

            </tr><!-- row Finish-->

        </thead><!-- thead Finish-->

        <tbody>

            <tr><!-- row Begin-->

                <th> Bank Name </th>
                <td> <?php  echo $bank_name; ?> </td>
               

                
            </tr><!-- row Finish-->
        </tbody>

         <tbody>

            <tr><!-- row Begin-->

                <th> Account Name </th>
                <td> <?php echo $account_name ?></td>
               

                
            </tr><!-- row Finish-->
        </tbody>
      
         <tbody>

            <tr><!-- row Begin-->

                <th> Account No </th>
                <td> <?php echo $account_no ?> </td>
               
                <?php } ?>
                
            </tr><!-- row Finish-->
        </tbody>

    </table><!-- table Finish-->
</div><!-- table-responsive Finish-->
</div>


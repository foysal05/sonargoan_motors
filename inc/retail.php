 <form action="db/db_sale.php" method="post">
   <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price/BDT</th>
        <th>Sub-Total/BDT</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('db/db.php');
      $p_id=$_POST['id'];

      foreach ($p_id as  $product_id) {
                         //echo $product_id."<br>";
        $parts=$product_id;

        $query="SELECT * FROM product WHERE p_id IN ($product_id)";

        $result=mysqli_query($con,$query);
//echo mysqli_error();
        if(mysqli_num_rows($result)>0){

          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <tr>
              <td class="col-md-6"><?php echo $row['name'];?></td>
              <td class="col-md-2">
                <input onchange="myFunction<?php echo $parts;?>(quantity<?php echo $product_id; ?>,retail<?php echo $product_id;?>,total_cost<?php echo $product_id;?>);TotalPrice()" type="number" onkeypress="return isNumberKeyDiscount(event)" max="<?php echo $row['quantity'];?>" min="1" class="qp" id="quantity<?php echo $product_id;?>" name="quantity[]">
              </td>
              <td class="col-md-2">
                <input type="hidden" name="id[]" value="<?php echo $product_id;?>">
                <input type="hidden" name="type" value="1">

                <input style="border:none;" readonly="" id="retail<?php echo $product_id;?>" type="text" readonly="" value="<?php echo $row['retail'];?>" name=""> 
              </td>
              <td class="col-md-2">
                <input type="text" class="price" value="" style="border:none;" readonly="" name=""  id="total_cost<?php echo $product_id;?>">
              </td>
            </tr>


            <script type="text/javascript">
              function myFunction<?php echo $parts;?>(q,r,t){
                var quantity =q.value;
                var price =r.value;
                var cal=price*quantity;
                document.getElementById('total_cost<?php echo $parts;?>').value=parseInt(cal);
              }
            </script>

            <?php
          }
        }
      }

      ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>

      <script>
        function TotalPrice() {
          var sum = 0;
          $('.price').each(function() {
            sum += Number($(this).val());
          });
          $('#totalPriceR').val(sum);
        };
      </script>    

      <tr>
       <td></td>
       <td></td>
       <td class="text-right"><h2><strong>Total: </strong></h2></td>
       <td class="text-left text-danger"><h2><strong><input id="totalPriceR" class="total" type="text" style="border:none;" readonly=""  name="total"></strong></h2></td>

     </tr>
     <tr>
       <td></td>
       <td></td>
       <td class="text-right"><h2><strong>Less: </strong></h2></td>
       <td class="text-left text-danger"><h2><strong><input id="discountR" class="total" type="text" required="" style="border:none;" onkeypress="return isNumberKeyDiscount(event)"   name="less"></strong></h2></td>

     </tr>
     <tr>
       <td></td>
       <td></td>
       <td class="text-right"><h2><strong>Payable: </strong></h2></td>
       <td class="text-left text-danger"><h2><strong><input id="payableR" class="total" type="text" style="border:none;" readonly=""  name="payable"></strong></h2></td>

     </tr>

     <script type="text/javascript">
      function isNumberKeyDiscount(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
          return false;
        return true;
      }

    </script>
    
          <script type="text/javascript">

            $(document).ready(function(){
              $('#totalPriceR').keyup(calculateR);
              $('#discountR').keyup(calculateR);
              $('#payableR').keyup(calculateR);
   // $('#total_cost').keyup(calculate);
 });
            function calculateR(e)
            {
    //$('#payable').val($('#quantity').val() * $('#price').val());
    $('#payableR').val($('#totalPriceR').val() - $('#discountR').val());

  }
</script>
</tbody>
</table>
<button type="submit" name="confirm_sale" class="btn btn-success btn-block">Confirm Sale</button>

</form>


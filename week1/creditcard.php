
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        #txtInput1 {
            margin-left: 85px;
        }
        
         #txtInput2 {
            margin-left: 95px;
        }
        
         #txtInput3 {
            margin-left: 50px;
        }
        
    </style>
     <form name="test" method="post">
         <!--Here I have my form-->
         <h3>Amount owed <input type="text" name="amountOwed" id="txtInput1" value=""> </h3>
         <h3>Interest rate <input type="text" name="interestRate" id="txtInput2" value=""> </h3>
         <h3>Monthly Payment <input type="text"  name="monthlyPayment" id="txtInput3" value=""> </h3>
            <input type="submit" value="Show me the damage" name="clickMe" >
            
            
        </form> 
        <br />
        <table style="border: 1px solid black; border-spacing: 30px; font-size: 20px;">
            <tr>
                <th>Month</th>
                <th>Interest Paid</th>
                <th>Owed</th>
            </tr>
       
        <?php
            $month = 1;
            if (isset($_POST ['amountOwed'])) {
               
                
                //create some variables then store them
                
                $currentAmountOwed = $_POST ['amountOwed'];
                $interestRate = $_POST ['interestRate'];
                $monthlyPayment = $_POST ['monthlyPayment'];
                //calculate in while loop
                 $totalAmountOwed = $_POST ['amountOwed'];
                
                //I calculate interest paid
                //I calculate current amount owed
                
                $interestPaid = $currentAmountOwed * $interestRate / 100 / 12;
                $currentAmountOwed = $currentAmountOwed + $interestPaid - $monthlyPayment;
                              
                //enter a while loop
                
                while($currentAmountOwed > 0) {
                    echo "<tr><td>$month</td><td>$interestPaid</td><td>$currentAmountOwed</td>";
                    
                    $interestPaid = $currentAmountOwed * $interestRate / 100 / 12;
                    $currentAmountOwed = $currentAmountOwed + $interestPaid - $monthlyPayment;
                    
                    $month++;
                }
                $str = "</table>";
               
                $total = $initialAmountOwed - $interestPaid;
                
                $str = "<br />";
                echo "total amount spent over $month months is $total ";
                $str = "<br />";
                
            } else {
                echo "<br>" . "Welcome! click the button to see the damage";
            }

            
            
        
      
?>    
           
      
</body>
</html>


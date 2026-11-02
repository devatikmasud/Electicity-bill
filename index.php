

            <!-- 
            Condition:
                 For First 50 Units - TK. 7.50/Unit
                 For Next 100 Units - TK. 8.50/Unit
                 For Next 100 Units - TK. 10.50/Unit
                 For Units above 250 - TK. 12.50/Unit -->

     <?php


   $result_str = $result ='';

    if(isset($_POST['units-submit'])){
        $units = $_POST['units'];

        if(!empty($units)){
            $result = calculate_bill($units);
            $result_str =' Total Amount of '. $units .' - ' . $result ;
        }
    }


    //As Per Unit cost

    function calculate_bill($units){
        $unit_cost_First =7.50;
        $unit_cost_second =8.50;
        $unit_cost_third =10.50;
        $unit_cost_Fourt =12.50;

        if($units<=50){
            $bill = $units * $unit_cost_First;
        }

        else if ($units>50 && $units <=100){
            $temp = 50 *$unit_cost_First;
            $remining_units=$units - 50;
            $bill =$temp + ($remining_units * $unit_cost_second);
        }

        else if($units>100 && $units <=200){
            $temp=(50*7.50) + (100 * $unit_cost_second);
            $remining_units=$units - 150;
            $bill = $temp + ($remining_units * $unit_cost_third);
        }

        else{
            $temp =(50*7.50) + (100*$unit_cost_second)+ (100*$unit_cost_third);
            $remining_units = $units -250;
            $bill = $temp + ($remining_units * $unit_cost_Fourt );
       }
       return number_format((float) $bill , 2 , '.' , '');                   
    }



    ?>              

   
  <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>electrycity bill-project</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div id="page-wrap">

            <h2 style=" text-align: center; padding: 60px 0 0 0; font-size: 28px;">Calculate Electrycity Bill</h2>
            <form action="" method="post" id="coll">

                <input style="background: blueviolet; color: white; padding: 8px;" type="number" name="units" placeholder="Please Enter Your units">

                <input style="padding:8px 14px; border-radius: 8px; color: white; background: blueviolet;" type="submit" name="units-submit" value="submit">
                
            </form>

            <div>
                <?php  echo $result_str; ?>
            </div>
            
        </div>
    
    </body>
</html>

  



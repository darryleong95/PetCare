if($execute){
 while($row = pg_fetch_array($execute)){
   if($keyCounter == 1){
     if(strpos($row['servicetitle'], $keyword) !== false){
       //Select this result
       if($priceCounter == 1){
         if($price >= $row['price']){
           if($startCounter == 1){
             $resultStartDate = $row['servicestart'];
             $resultEnd = $row['serviceend'];
             if(strtotime($startDate) >= strtotime($resultStartDate) && strtotime($startDate) <= strtotime($resultEnd)){
               if($endCounter == 1){
                 $resultEndDate = $row['serviceend'];
                 if(strtotime($endDate) <= strtotime($resultEndDate)){
                   //Display final results
                   echo "<div class='service-blocks'>";
                   echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                   echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                   echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                   echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                   echo "</div>";
                 }
                 else{
                   //No Results
                   $_SESSION['no-results-1'] = true;
                   header("Location:search.php");
                 }
               }
               else{
                 //Display final results
                 echo "<div class='service-blocks'>";
                 echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                 echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                 echo "</div>";
               }
             }
             else{
               $_SESSION['no-results-2'] = true;
               header("Location:search.php");
             }
           }
           else{
             if($endCounter == 1){
               $resultEndDate = $row['serviceend'];
               $resultStartDate = $row['servicestart'];
               if(strtotime($endDate) >= strtotime($resultStartDate) && strtotime($endDate) <= strtotime($resultEndDate)){
                 //Display final results
                 echo "<div class='service-blocks'>";
                 echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                 echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                 echo "</div>";
               }
               else{
                 $_SESSION['no-results-3'] = true;
                 header("Location:search.php");
               }
             }
             else{
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
           }
         }
         else{
           $_SESSION['no-results-4'] = true;
           header("Location:search.php");
         }
       }
       else{
         if($startCounter == 1){
           $resultStartDate = $row['servicestart'];
           $resultEnd = $row['serviceend'];
           if(strtotime($startDate) >= strtotime($resultStartDate) && strtotime($startDate) <= strtotime($resultEnd)){
             if($endCounter == 1){
               $resultEndDate = $row['serviceend'];
               if(strtotime($endDate) <= strtotime($resultEndDate)){
                 //Display final results
                 echo "<div class='service-blocks'>";
                 echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                 echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                 echo "</div>";
               }
               else{
                 //No Results
                 $_SESSION['no-results-5'] = true;
                 header("Location:search.php");
               }
             }
             else{
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
           }
           else{
             $_SESSION['no-results-6'] = true;
             header("Location:search.php");
           }
         }
         else{
           if($endCounter == 1){
             $resultEndDate = $row['serviceend'];
             $resultStartDate = $row['servicestart'];
             if(strtotime($endDate) >= strtotime($resultStartDate) && strtotime($endDate) <= strtotime($resultEndDate)){
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
             else{
               $_SESSION['no-results-7'] = true;
               header("Location:search.php");
             }
           }
           else{
             //Display final results
             echo "<div class='service-blocks'>";
             echo "<span class='title'>" . $row['servicetitle'] . "</span>";
             echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
             echo "</div>";
           }
         }
       }
     }
     else{
       $_SESSION['no-results-8'] = true;
       header("Location:search.php");
     }
   }
   else{
     //MADE IT TO THE OTHER SIDE OF THE TREE
     if($priceCounter == 1){
       if($price >= $row['price']){
         if($startCounter == 1){
           $resultStartDate = $row['servicestart'];
           $resultEnd = $row['serviceend'];
           if(strtotime($startDate) >= strtotime($resultStartDate) && strtotime($startDate) <= strtotime($resultEnd)){
             if($endCounter == 1){
               $resultEndDate = $row['serviceend'];
               if(strtotime($endDate) <= strtotime($resultEndDate)){
                 //Display final results
                 echo "<div class='service-blocks'>";
                 echo "<span class='title'>" . $row['servicetitle'] . "</span>";
                 echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
                 echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
                 echo "</div>";
               }
               else{
                 //No Results
                 $_SESSION['no-results-9'] = true;
                 header("Location:search.php");
               }
             }
             else{
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
           }
           else{
             $_SESSION['no-results-10'] = true;
             header("Location:search.php");
           }
         }
         else{
           if($endCounter == 1){
             $resultEndDate = $row['serviceend'];
             $resultStartDate = $row['servicestart'];
             if(strtotime($endDate) >= strtotime($resultStartDate) && strtotime($endDate) <= strtotime($resultEndDate)){
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
             else{
               $_SESSION['no-results-11'] = true;
               header("Location:search.php");
             }
           }
           else{
             //Display final results
             echo "<div class='service-blocks'>";
             echo "<span class='title'>" . $row['servicetitle'] . "</span>";
             echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
             echo "</div>";
           }
         }
       }
       else{
         $_SESSION['no-results-12'] = true;
         header("Location:search.php");
       }
     }
     else{
       if($startCounter == 1){
         $resultStartDate = $row['servicestart'];
         $resultEnd = $row['serviceend'];
         if(strtotime($startDate) >= strtotime($resultStartDate) && strtotime($startDate) <= strtotime($resultEnd)){
           if($endCounter == 1){
             $resultEndDate = $row['serviceend'];
             if(strtotime($endDate) <= strtotime($resultEndDate)){
               //Display final results
               echo "<div class='service-blocks'>";
               echo "<span class='title'>" . $row['servicetitle'] . "</span>";
               echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
               echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
               echo "</div>";
             }
             else{
               //No Results
               $_SESSION['no-results-13'] = true;
               header("Location:search.php");
             }
           }
           else{
             //Display final results
             echo "<div class='service-blocks'>";
             echo "<span class='title'>" . $row['servicetitle'] . "</span>";
             echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
             echo "</div>";
           }
         }
         else{
           $_SESSION['no-results-14'] = true;
           header("Location:search.php");
         }
       }
       else{
         if($endCounter == 1){
           $resultEndDate = $row['serviceend'];
           $resultStartDate = $row['servicestart'];
           if(strtotime($endDate) >= strtotime($resultStartDate) && strtotime($endDate) <= strtotime($resultEndDate)){
             //Display final results
             echo "<div class='service-blocks'>";
             echo "<span class='title'>" . $row['servicetitle'] . "</span>";
             echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
             echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
             echo "</div>";
           }
           else{
             $_SESSION['no-results-15'] = true;
             header("Location:search.php");
           }
         }
         else{
           //Display final results
           echo "<div class='service-blocks'>";
           echo "<span class='title'>" . $row['servicetitle'] . "</span>";
           echo "<div class='row'><div class='col-sm-5'>Start date:</div><div class='col-sm-7'>" . $row['servicestart'] . "</div></div>";
           echo "<div class='row'><div class='col-sm-5'>End date:</div><div class='col-sm-7'>" . $row['serviceend'] . "</div></div>";
           echo "<div class='row'><div class='col-sm-5'>Service ID:</div><div class='col-sm-7'>" . $row['serviceid'] . "</div></div>";
           echo "</div>";
         }
       }
     }
   }
 }
}

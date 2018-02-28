<?php
    $db = pg_connect("host=localhost port=5433 dbname=cs2102p user=postgres password=darrylimJy1995");
    $result = pg_query($db, "SELECT * FROM book where title = '$_POST[bookid]'");		// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    if (isset($_POST['submit'])) {
        echo readfile("/newService");;
    }
    if (isset($_POST['new'])) {	// Submit the update SQL command
        $result = pg_query($db, "UPDATE book SET book_id = '$_POST[bookid_updated]',
    name = '$_POST[book_name_updated]',price = '$_POST[price_updated]',
    date_of_publication = '$_POST[dop_updated]'");
        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
?>

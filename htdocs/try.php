<?php
  $date = new DateTime('2015-01-01');
  $date -> modify('+ 1 day');
  echo $date->format('Y-m-d');
?>

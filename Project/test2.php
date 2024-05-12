<?php
  if (isset($_POST['value']) && isset($_POST[btn])) {
    $receivedValue = $_POST['value'];
    echo "Received Value: $receivedValue";
  }
?>
<?php

    function getValue($id) {
        require("connection.php");
        $result = mysqli_query($connnect, $query = "SELECT * FROM sorting_table WHERE id = '$id'");
        $arr = mysqli_fetch_assoc($result);
        $value = $arr['value'];
        return $value;
    }

    function setValue($id, $value) {
        require("connection.php");
        $result = mysqli_query($connnect, "UPDATE sorting_table SET value = '$value' WHERE id ='$id'");
    }

    function bubble_sort() {
        require("connection.php");
        $result = mysqli_query($connnect, "SELECT DISTINCT * FROM sorting_table"); 
        $size = mysqli_num_rows($result);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i - 1; $j++) {
                $k = $j + 1;
                if (getValue($k) < getValue($j)) {
                    $temp = getValue($k);
                    setValue($k, getValue($j));
                    setValue($j, $temp);
                }
            }
        }
        for ($i = 0; $i < $size; $i++) {
            echo ("Number $i, value = '" . getValue($i) . "'");
            echo "<br>";
        }
    }

?>
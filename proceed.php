<?php
if (isset($_POST)) {
    $to_city = $_POST['city_to'];
    $from_city = $_POST['city_from'];
    $kilos = $_POST['kilograms'];
    $meters = $_POST['meters'];
    $options = $_POST['options'];


    $del_to_addr = false;
    $del_from_addr = false;
    $rigid = false;
    $stretch = false;
    $bort = false;
    $insurance = false;
    if (isset($options)) {
        foreach ($options as $opt) {
            switch ($opt) {
                case 'opt1':
                    $del_to_addr = true;
                    break;
                case 'opt2':
                    $del_from_addr = true;
                    break;
                case 'opt3':
                    $rigid = true;
                    break;
                case 'opt4':
                    $stretch = true;
                    break;
                case 'opt5':
                    $bort = true;
                    break;
                case 'opt6':
                    $insurance = true;
                    break;
                default:
                    break;
            }
        }
    }


}

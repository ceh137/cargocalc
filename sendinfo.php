<?php
$str_result = file_get_contents('php://input');
$res = json_decode($str_result);

$from_city= $res->city1;
$to_city = $res->city2;

$method_delivery = isset($res->ecorad) ? 'Эконом' : 'Экспресс';

$to_address = isset($res->toAddress) ? true : false;
$from_address = isset($res->fromAddress) ? true : false;

$address_client_from = $from_address ? $res->addressFrom : '';
$address_client_to =  $to_address ? $res->addressTo : '';
$address_client_to = str_replace(' ', '%20', $address_client_to);
$address_client_from = str_replace(' ', '%20', $address_client_from);

$date_from = $res->dateFrom;
$date_to = $res->dateTo;

$from_addr_time_from = $res->Time1;
$from_addr_time_until = $res->Time2;
$to_addr_time_from = $res->Intime3;
$to_addr_time_until = $res->Intime4;

$worth = $res->worth;

$kilos = $res->kg;
$meters = $res->meters;
$pieces = $res->pieces;
$heaviest = $res->heaviest;
$longest = $res->longest;

$INNsender = str_replace(' ', '%20',$res -> INNsender );
$FIOsender = str_replace(' ', '%20',$res -> FIOsender );
$Telsender = str_replace(' ', '%20',$res -> Telsender );
$Emailsender = str_replace(' ', '%20',$res -> Emailsender );

$INNreceiver = str_replace(' ', '%20',$res -> INNreceiver );
$FIOreceiver = str_replace(' ', '%20',$res -> FIOreceiver );
$Telreceiver = str_replace(' ', '%20',$res -> Telreceiver );
$Emailreceiver = str_replace(' ', '%20',$res -> Emailreceiver );

$INN3dparty = str_replace(' ', '%20',$res -> INN3dparty );
$FIO3dparty = str_replace(' ', '%20',$res -> FIO3dparty );
$Tel3dparty = str_replace(' ', '%20',$res -> Tel3dparty );
$Email3dparty = str_replace(' ', '%20',$res -> Email3dparty );

$who_pays_term_transfer ='';
$who_pays_all = '';
$who_pays_pac = '';
$who_pays_ins = '';
$who_pays_from_addr_to_term = '';
$who_pays_from_term_to_addr = '';
$who_pays_prr_at_addr = '';
$who_pays_prr_to_addr = '';
$term_trans = '';
$all = '';
$pac = '';
$ins = '';
$from_addr_to_term = '';
$from_term_to_addr = '';
$prr_at_addr = '';
$prr_to_addr = '';
$del_to_addr = '-';
$del_from_addr = '-';
$rig_pac = '-';
$stretch_pac = '-';
$bort_pac = '-';
$insurance = '-';
$PRR_from_addr = '-';
$PRR_to_addr = '-';

if ($res->check1 == 'opt1') {
    $del_to_addr = '+';
}
if ($res->check2 == 'opt2') {
    $del_from_addr = '+';
}
if ($res->check3 == 'opt3') {
    $rig_pac = '+';
}
if ($res->check4 == 'opt4') {
    $stretch_pac = '+';
}
if ($res->check5 == 'opt5') {
    $bort_pac = '+';
}
if ($res->check6 == 'opt6') {
    $insurance = '+';
}
if ($res->check7 == 'opt7') {
    $PRR_from_addr = '+';
}
if ($res->check8 == 'opt8') {
    $PRR_to_addr = '+';
}

if (isset($res->PayTermTransferSender)) {
    $term_trans = $res->PayTermTransferSender;
    $who_pays_term_transfer = 'Отправитель';
} elseif (isset($res->PayTermTransferReceiver)) {
    $term_trans = $res->PayTermTransferSender;
    $who_pays_term_transfer = 'Получатель';
} elseif (isset($res->PayTermTransfer3dparty)) {
    $term_trans = $res->PayTermTransfer3dparty;
    $who_pays_term_transfer = '3-е%20лицо';
}


if (isset($res->PayAllSender)) {
    $all = $res->PayAllSender;
    $who_pays_all = 'Отправитель';
} elseif (isset($res->PayAllReceiver)) {
    $all = $res->PayAllReceiver;
    $who_pays_all = 'Получатель';
} elseif (isset($res->PayAll3dparty)) {
    $all = $res->PayAll3dparty;
    $who_pays_all = '3-е%20лицо';
}

if (isset($res->PayPacSender)) {
    $pac = $res->PayPacSender;
    $who_pays_pac = 'Отправитель';
} elseif (isset($res->PayPacReceiver)) {
    $pac = $res->PayPacReceiver;
    $who_pays_pac = 'Получатель';
} elseif (isset($res->PayPac3dparty)) {
    $pac = $res->PayPac3dparty;
    $who_pays_pac = '3-е%20лицо';
}

if (isset($res->PayInsSender)) {
    $ins = $res->PayInsSender;
    $who_pays_ins = 'Отправитель';
} elseif (isset($res->PayInsReceiver)) {
    $ins = $res->PayInsReceiver;
    $who_pays_ins = 'Получатель';
} elseif (isset($res->PayIns3dparty)) {
    $ins = $res->PayIns3dparty;
    $who_pays_ins = '3-е%20лицо';
}


if (isset($res->PayFromAddressToTermSender)) {
    $from_addr_to_term = $res->PayFromAddressToTermSender;
    $who_pays_from_addr_to_term = 'Отправитель';
} elseif (isset($res->PayFromAddressToTermReceiver)) {
    $from_addr_to_term = $res->PayFromAddressToTermReceiver;
    $who_pays_from_addr_to_term = 'Получатель';
} elseif (isset($res->PayFromAddressToTerm3dparty)) {
    $from_addr_to_term = $res->PayFromAddressToTerm3dparty;
    $who_pays_from_addr_to_term = '3-е%20лицо';
} else

if (isset($res->PayFromTermToAddressSender)) {
    $from_term_to_addr = $res->PayFromTermToAddressSender;
    $who_pays_from_term_to_addr = 'Отправитель';
} elseif (isset($res->PayFromTermToAddressReceiver)) {
    $from_term_to_addr = $res->PayFromTermToAddressReceiver;
    $who_pays_from_term_to_addr = 'Получатель';
} elseif (isset($res->PayFromTermToAddress3dparty)) {
    $from_term_to_addr = $res->PayFromTermToAddress3dparty;
    $who_pays_from_term_to_addr = '3-е%20лицо';
} else

if (isset($res->PayPRRatAddressSender)) {
    $prr_at_addr = $res->PayPRRatAddressSender;
    $who_pays_prr_at_addr = 'Отправитель';
} elseif (isset($res->PayPRRatAddressReceiver)) {
    $prr_at_addr = $res->PayPRRatAddressReceiver;
    $who_pays_prr_at_addr = 'Получатель';
} elseif (isset($res->PayPRRatAddress3dparty)) {
    $prr_at_addr = $res->PayPRRatAddress3dparty;
    $who_pays_prr_at_addr = '3-е%20лицо';
}

if (isset($res->PayPRRToAddressSender)) {
    $prr_to_addr = $res->PayPRRToAddressSender;
    $who_pays_prr_to_addr = 'Отправитель';
} elseif (isset($res->PayPRRToAddressReceiver)) {
    $prr_to_addr = $res->PayPRRToAddressReceiver;
    $who_pays_prr_to_addr = 'Получатель';
} elseif (isset($res->PayPRRToAddress3dparty)) {
    $prr_to_addr = $res->PayPRRToAddress3dparty;
    $who_pays_prr_to_addr = '3-е%20лицо';
}



$url = "p1=$method_delivery&p2=$from_city&p3=$to_city&p4=$address_client_from&p5$address_client_to&p5=$date_from&p6=$date_to&p7=$from_addr_time_from&p8=$from_addr_time_until&p9=$to_addr_time_from&p10=$to_addr_time_until&p11=$kilos&p12=$meters&p13=$pieces&p14=$heaviest&p15=$longest&p16=$term_trans&p17=$del_to_addr&p18=$del_from_addr&p19=$rig_pac&p20=$stretch_pac&p21=$bort_pac&p22=$insurance&p23=$PRR_from_addr&p24=$PRR_to_addr&p25=$worth&p26=$INNsender&p27=$FIOsender&p28=$Telsender&p29=$Emailsender&p30=$INNreceiver&p31=$FIOreceiver&p32=$Telreceiver&p33=$Emailreceiver&p34=$INN3dparty&p35=$FIO3dparty&p36=$Tel3dparty&p37=$Email3dparty&p38=$who_pays_all($all)&p39=$who_pays_term_transfer($term_trans)&p40=$who_pays_from_term_to_addr";
print_r($res);
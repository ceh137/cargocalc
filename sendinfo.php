<?php
$str_result = file_get_contents('php://input');
$res = json_decode($str_result);

$from_city= $res->city1;
$to_city = $res->city2;

$method_delivery = urlencode(isset($res->ecorad) ? 'Эконом' : 'Экспресс');

$to_address = isset($res->toAddress) ? true : false;
$from_address = isset($res->fromAddress) ? true : false;

$address_client_from = $from_address ? $res->addressFrom : '';
$address_client_to = $res->addressTo;
$address_client_to = urlencode($address_client_to);
$address_client_from = urlencode($address_client_from);

$date_from = $res->dateFrom;
$date_to = $res->dateTo;

$total = $res->total;

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
$FIOsender = urlencode($res -> FIOsender);
$Telsender = str_replace(' ', '%20',$res -> Telsender );
$Emailsender = str_replace(' ', '%20',$res -> Emailsender );

$INNreceiver = str_replace(' ', '%20',$res -> INNreceiver );
$FIOreceiver = urlencode($res -> FIOreceiver);
$Telreceiver = str_replace(' ', '%20',$res -> Telreceiver );
$Emailreceiver = str_replace(' ', '%20',$res -> Emailreceiver );

$INN3dparty = str_replace(' ', '%20',$res -> INN3dparty );
$FIO3dparty = urlencode($res -> FIO3dparty);
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

$del_to_addr = urlencode('-');
$del_from_addr = urlencode('-');
$rig_pac = urlencode('-');
$stretch_pac = urlencode('-');
$bort_pac = urlencode('-');
$insurance = urlencode('-');
$PRR_from_addr = urlencode('-');
$PRR_to_addr = urlencode('-');

if ($res->check1 == 'opt1') {
    $del_to_addr = urlencode('+');
}
if ($res->check2 == 'opt2') {
    $del_from_addr = urlencode('+');
}
if ($res->check3 == 'opt3') {
    $rig_pac = urlencode('+');
}
if ($res->check4 == 'opt4') {
    $stretch_pac = urlencode('+');
}
if ($res->check5 == 'opt5') {
    $bort_pac = urlencode('+');
}
if ($res->check6 == 'opt6') {
    $insurance = urlencode('+');
}
if ($res->check7 == 'opt7') {
    $PRR_from_addr = urlencode('+');
}
if ($res->check8 == 'opt8') {
    $PRR_to_addr = urlencode('+');
}

if (isset($res->PayTermTransferSender)) {
    $term_trans = $res->PayTermTransferSender;
    $who_pays_term_transfer = urlencode('Отправитель');
} elseif (isset($res->PayTermTransferReceiver)) {
    $term_trans = $res->PayTermTransferReceiver;
    $who_pays_term_transfer = urlencode('Получатель');
} elseif (isset($res->PayTermTransfer3dparty)) {
    $term_trans = $res->PayTermTransfer3dparty;
    $who_pays_term_transfer = urlencode('3-е лицо');
}


if (isset($res->PayAllSender)) {
    $all = $res->PayAllSender;
    $who_pays_all = urlencode('Отправитель');
} elseif (isset($res->PayAllReceiver)) {
    $all = $res->PayAllReceiver;
    $who_pays_all = urlencode('Получатель');
} elseif (isset($res->PayAll3dparty)) {
    $all = $res->PayAll3dparty;
    $who_pays_all = urlencode('3-е лицо');
}

if (isset($res->PayPacSender)) {
    $pac = $res->PayPacSender;
    $who_pays_pac = urlencode('Отправитель');
} elseif (isset($res->PayPacReceiver)) {
    $pac = $res->PayPacReceiver;
    $who_pays_pac = urlencode('Получатель');
} elseif (isset($res->PayPac3dparty)) {
    $pac = $res->PayPac3dparty;
    $who_pays_pac = urlencode('3-е лицо');
}

if (isset($res->PayInsSender)) {
    $ins = $res->PayInsSender;
    $who_pays_ins = urlencode('Отправитель');
} elseif (isset($res->PayInsReceiver)) {
    $ins = $res->PayInsReceiver;
    $who_pays_ins = urlencode('Получатель');
} elseif (isset($res->PayIns3dparty)) {
    $ins = $res->PayIns3dparty;
    $who_pays_ins = urlencode('3-е лицо');
}


if (isset($res->PayFromAddressToTermSender)) {
    $from_addr_to_term = $res->PayFromAddressToTermSender;
    $who_pays_from_addr_to_term = urlencode('Отправитель');
} elseif (isset($res->PayFromAddressToTermReceiver)) {
    $from_addr_to_term = $res->PayFromAddressToTermReceiver;
    $who_pays_from_addr_to_term = urlencode('Получатель');
} elseif (isset($res->PayFromAddressToTerm3dparty)) {
    $from_addr_to_term = $res->PayFromAddressToTerm3dparty;
    $who_pays_from_addr_to_term = urlencode('3-е лицо');
}

if (isset($res->PayFromTermToAddressSender)) {
    $from_term_to_addr = $res->PayFromTermToAddressSender;
    $who_pays_from_term_to_addr = urlencode('Отправитель');
} elseif (isset($res->PayFromTermToAddressReceiver)) {
    $from_term_to_addr = $res->PayFromTermToAddressReceiver;
    $who_pays_from_term_to_addr = urlencode('Получатель');
} elseif (isset($res->PayFromTermToAddress3dparty)) {
    $from_term_to_addr = $res->PayFromTermToAddress3dparty;
    $who_pays_from_term_to_addr = urlencode('3-е лицо');
}

if (isset($res->PayPRRatAddressSender)) {
    $prr_at_addr = $res->PayPRRatAddressSender;
    $who_pays_prr_at_addr = urlencode('Отправитель');
} elseif (isset($res->PayPRRatAddressReceiver)) {
    $prr_at_addr = $res->PayPRRatAddressReceiver;
    $who_pays_prr_at_addr = urlencode('Получатель');
} elseif (isset($res->PayPRRatAddress3dparty)) {
    $prr_at_addr = $res->PayPRRatAddress3dparty;
    $who_pays_prr_at_addr = urlencode('3-е лицо');
}

if (isset($res->PayPRRtoAddressSender)) {
    $prr_to_addr = $res->PayPRRtoAddressSender;
    $who_pays_prr_to_addr = urlencode('Отправитель');
} elseif (isset($res->PayPRRtoAddressReceiver)) {
    $prr_to_addr = $res->PayPRRtoAddressReceiver;
    $who_pays_prr_to_addr = urlencode('Получатель');
} elseif (isset($res->PayPRRtoAddress3dparty)) {
    $prr_to_addr = $res->PayPRRtoAddress3dparty;
    $who_pays_prr_to_addr = urlencode('3-е лицо');
}



$url = "https://script.google.com/macros/s/AKfycbw4koAEJ-JzGymWt34S5Y2es_CCoBJGcipANANz5jK9BixAD896y4sUIPi8GEuMW8Ae/exec?p1=$method_delivery&p2=$from_city&p3=$to_city&p4=$address_client_from&p5=$address_client_to&p6=$date_from&p7=$date_to&p8=$from_addr_time_from&p9=$from_addr_time_until&p10=$to_addr_time_from&p11=$to_addr_time_until&p12=$kilos&p13=$meters&p14=$pieces&p15=$heaviest&p16=$longest&p17=$term_trans&p18=$del_to_addr&p19=$del_from_addr&p20=$rig_pac&p21=$stretch_pac&p22=$bort_pac&p23=$insurance&p24=$PRR_from_addr&p25=$PRR_to_addr&p26=$worth&p27=$INNsender&p28=$FIOsender&p29=$Telsender&p30=$Emailsender&p31=$INNreceiver&p32=$FIOreceiver&p33=$Telreceiver&p34=$Emailreceiver&p35=$INN3dparty&p36=$FIO3dparty&p37=$Tel3dparty&p38=$Email3dparty&p39=$who_pays_all($all)&p40=$who_pays_term_transfer($term_trans)&p41=$who_pays_from_term_to_addr($from_term_to_addr)&p42=$who_pays_from_addr_to_term($from_addr_to_term)&p43=$who_pays_pac($pac)&p44=$who_pays_ins($ins)&p45=$who_pays_prr_at_addr($prr_at_addr)&p46=$who_pays_prr_to_addr($prr_to_addr)&p47=$total";

$handle = fopen($url, 'r');
echo $who_pays_prr_to_addr;
echo $prr_to_addr;
//https://script.google.com/macros/s/AKfycbw4koAEJ-JzGymWt34S5Y2es_CCoBJGcipANANz5jK9BixAD896y4sUIPi8GEuMW8Ae/exec?p1=%D0%AD%D0%BA%D1%81%D0%BF%D1%80%D0%B5%D1%81%D1%81&p2=Moscow&p3=SPB&p4=%D0%BE%D0%B1%D0%BB%20%D0%9E%D0%BC%D1%81%D0%BA%D0%B0%D1%8F,%20%D1%80-%D0%BD%20%D0%98%D1%81%D0%B8%D0%BB%D1%8C%D0%BA%D1%83%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9,%20%D1%85%20%E2%84%96%2012,&p5%D0%B3%20%D0%A1%D0%B0%D0%BD%D0%BA%D1%82-%D0%9F%D0%B5%D1%82%D0%B5%D1%80%D0%B1%D1%83%D1%80%D0%B3,%20%D1%83%D0%BB%20%D0%93%D0%B5%D0%BD%D0%B5%D1%80%D0%B0%D0%BB%D0%B0%20%D0%9A%D1%80%D0%B0%D0%B2%D1%87%D0%B5%D0%BD%D0%BA%D0%BE,&p6=2021-06-21&p7=2021-06-28&p8=12:00&p9=16:00&p10=12:00&p11=16:00&p12=20000&p13=80&p14=26&p15=1000&p16=300&p17=91000&p18=+&p19=+&p20=+&p21=+&p22=-&p23=+&p24=+&p25=+&p26=100000&p27=sdvs&p28=Ahctybq%20pwvkspdvm&p29=+79859505372&p30=ac@b.tr&p31=w;rlbmwrn&p32=kmergbwb%20wortmbw&p33=+79859505372&p34=ac@b.tr&p35=rwimborwi&p36=wbtw%20woritnboirw&p37=+79859505372&p38=ac@b.tr&p39=()&p40=%D0%9E%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D0%B5%D0%BB%D1%8C(91000)&p41=()&p42=%D0%9F%D0%BE%D0%BB%D1%83%D1%87%D0%B0%D1%82%D0%B5%D0%BB%D1%8C(13000)&p43=%D0%9E%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D0%B5%D0%BB%D1%8C(80000)&p44=%D0%9E%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D0%B5%D0%BB%D1%8C(500)&p45=()&p46=()&p47=100000
echo $url;
print_r($res);


<?php
include 'proceed.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" >

    <title>Title</title>
</head>

<body>

    <h1 class="text-center">Дата и направление перевозки</h1>
    <form>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">Откуда</h3>
                    <select id="city1" style="max-width: 400px;" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        <option value="Moscow" <?= $from_city=='Moscow' ? 'selected' : '' ?>>Москва</option>
                        <option value="SPB" <?= $from_city=='SPB' ? 'selected' : '' ?>>Санкт-Петербург</option>
                    </select>
                    <p id="DepEco" class="text-center">erb</p>
                    <p id="DepExpress" class="text-center">bf</p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fromrad" id="fromAddress" <?=  $del_from_addr==true ? 'checked' : ''?>>
                        <label class="form-check-label" for="fromAddress">
                            От адреса
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fromrad" id="fromTerminal" <?= !$del_from_addr==true ? 'checked' : '' ?>>
                        <label class="form-check-label" for="fromTerminal">
                            От терминала
                        </label>
                    </div>
                    <input class="form-control my-2" id="addressFrom" type="text" placeholder="Адрес"
                        aria-label="адрес">
                    <input class="form-control" id="dateFrom" type="date" placeholder="Дата" aria-label="адрес">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="inTime1">
                        <label class="form-check-label" for="inTime1">
                            Фиксированное время +\- 2ч (+500 р.)
                        </label>
                    </div>
                    <div class="container">
                        От
                        <div class="col"><input class="form-control my-2" id="Time1" type="time" placeholder="time">
                        </div>
                        До
                        <div class="col"><input class="form-control my-2" id="Time2" type="time" placeholder="time">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <button type="button" id="changeCities" class="btn btn-warning mt-5">Поменять города
                        местами</button>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rad" id="Ecorad">
                        <label class="form-check-label" for="Ecorad">
                            ЭКОНОМ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rad" id="Expressrad" checked>
                        <label class="form-check-label" for="Expressrad">
                            ЭКСПРЕСС
                        </label>
                    </div>
                </div>
                <div class="col">
                    <h3 class="text-center">Куда </h3>
                    <select id="city2" style="max-width: 400px;" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        <option value="SPB" <?= $to_city=='SPB' ? 'selected' : '' ?>>Санкт-Петербург</option>
                        <option value="Moscow" <?= $to_city=='Moscow' ? 'selected' : '' ?>>Москва</option>
                    </select>
                    <p id="arrEco" class="text-center"></p>
                    <p id="arrExpress" class="text-center"></p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="torad" id="toAddress" <?=  $del_to_addr==true ? 'checked' : ''?>>
                        <label class="form-check-label" for="toAddress">
                            До адреса
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="torad" id="toTerminal"  <?=  !$del_to_addr==true ? 'checked' : ''?>>
                        <label class="form-check-label" for="toTerminal">
                            До терминала
                        </label>
                    </div>
                    <input class="form-control my-2" id="addressTo" type="text" placeholder="Адрес" aria-label="адрес">
                    <input class="form-control" id="dateTo" type="date" placeholder="Дата" aria-label="адрес">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="inTime2">
                        <label class="form-check-label" for="inTime2">
                            Фиксированное время +\- 2ч (+500 р.)
                        </label>
                    </div>
                    <div class="container">
                        От
                        <div class="col"><input class="form-control my-2" id="Intime3" type="time" step="1800" placeholder="time">
                        </div>
                        До
                        <div class="col"><input class="form-control my-2" id="Intime4" type="time" step="1800" placeholder="time">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <h1 class="text-center">Информация о грузе</h1>

        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    Вес груза
                    <br>
                    <div class="input-group">
                        <input id="kg" type="number" class="form-control" value="<?= $kilos ?>" aria-label="Sizing example input"
                            aria-describedby="labelkg">
                        <span class="input-group-text" id="labelkg">КГ</span>
                    </div>

                    <label for="kgRange" class="form-label"></label>
                    <input type="range" min='0' max="100" step="0.5" class="form-range"  id="kgRange">

                </div>
                <div class="col-sm-2 col-md-2">
                    Обьем груза
                    <br>
                    <div class="input-group">
                        <input id="meters" type="number" class="form-control" value="<?= $meters ?>" step="0.01" min="0" max="80"
                            aria-label="Sizing example input" aria-describedby="labelmeters">
                        <span class="input-group-text" id="labelmeters">M^3</span>
                    </div>
                    <label for="metersRange" class="form-label"></label>
                    <input type="range" min="0" max="1000" step="0.01" class="form-range" id="metersRange">

                </div>
                <div class="col-sm-2 col-md-2">
                    Кол-во мест
                    <br>
                    <div class="input-group">

                        <input id="pieces" type="number" class="form-control" value="1" step="1" min="0" max="50"
                            aria-label="Sizing example input" aria-describedby="labelpieces">
                        <span class="input-group-text" id="labelpieces">ШТ</span>
                    </div>
                    <label for="piecesrange" class="form-label"></label>
                    <input type="range" min="0" max="1000" step="0.01" class="form-range" id="piecesrange">

                </div>
                <div class="col-sm-2 col-md-2">
                    Самое тяжелое место <br>
                    <div class="input-group">

                        <input id="heaviest" type="number" class="form-control" value="5" step="1" min="0"
                            max="1000" aria-label="Sizing example input" aria-describedby="lableheaviest">
                        <span class="input-group-text" id="lableheaviest">КГ</span>
                    </div>
                    <label for="heaviestRange" class="form-label"></label>
                    <input type="range" min="0" max="1000" step="0.01" class="form-range" id="heaviestRange">

                </div>
                <div class="col-sm-2 col-md-2">
                    Самое длинное <br>
                    <div class="input-group">
                        <input id="longest" type="number" class="form-control" value="10" step="1" min="0" max="300"
                            aria-label="Sizing example input" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">СМ</span>
                    </div>
                    <label for="longestRange" class="form-label"></label>
                    <input type="range" min="0" max="100" step="0.01" class="form-range" id="longestRange">

                </div>

                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt1" id="check1" <?=  $del_to_addr==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check1" id="labelFor1">
                        Доставка груза на адрес
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt2" id="check2" <?=  $del_from_addr==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check2" id="labelFor2">
                        Забор груза на адресе
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="radio" name="package" value="opt3" id="check3" <?=  $rigid==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check3" id="labelFor3">
                        Жесткая упаковка
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt4" id="check4" <?=  $stretch==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check4" id="labelFor4">
                        Упаковка в стретч-пленку
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="radio" name="package" value="opt5" id="check5" <?=  $bort==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check5" id="labelFor5">
                        Упаковка в паллет-борт
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt6" id="check6" <?=  $insurance==true ? 'checked' : ''?>>
                    <label class="form-check-label" for="check6" id="labelFor6">
                        Страховка
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt7" id="check7">
                    <label class="form-check-label" for="check7" id="labelFor7">
                        ПРР на адресе забора груза
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input check" type="checkbox" value="opt8" id="check8">
                    <label class="form-check-label" for="check8" id="labelFor8">
                        ПРР на адресе доставки груза
                    </label>

                </div>
                <div class="col-sm-2 col-md-2">

                <input id="worth" type="number"class="form-control" value="0" step="1" min="0"
                       aria-label="Sizing example input" aria-describedby="lableworth">
                <span class="input-group-text" id="lableworth">Ценность (Руб)</span>
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <h1>Отправитель</h1>

                    <label for="INNsender" class="form-label">ИНН, если юр. лицо</label>
                    <input type="text" class="form-control" id="INNsender" placeholder="ИНН">

                    <label for="FIOsender" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="FIOsender" placeholder="ФИО">

                    <label for="Telsender" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="Telsender"
                        pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                        placeholder="+7(___)___-__-__">

                    <label for="Emailsender" class="form-label">Example label</label>
                    <input type="email" class="form-control" id="Emailsender" placeholder="Email">

                    <div class="container mt-5">
                        <div class="form-check">
                            <input class="form-check-input PayAll" type="radio" name="PayAll" value="" id="PayAllSender">
                            <label class="form-check-label" for="PayAllSender">
                                За все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayTermTransfer Sender" type="radio" name="PayTermTransfer" value="" id="PayTermTransferSender">
                            <label class="form-check-label" for="PayTermTransferSender">
                                За терминальную перевозку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPac Sender" type="radio" name="PayPac" value="" id="PayPacSender">
                            <label class="form-check-label" for="PayPacSender">
                                За упаковку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayIns Sender" type="radio" name="PayIns" value="" id="PayInsSender">
                            <label class="form-check-label" for="PayInsSender">
                                За страховку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromAddressToTerm Sender" type="radio" name="PayFromAddressToTerm" value="" id="PayFromAddressToTermSender">
                            <label class="form-check-label" for="PayFromAddressToTermSender">
                                За доставку от адреса до терминала
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRatAddress Sender" type="radio" name="PayPRRatAddress" value="" id="PayPRRatAddressSender">
                            <label class="form-check-label" for="PayPRRatAddressSender">
                                За ПРР на адресе
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromTermToAddress Sender" type="radio" name="PayFromTermToAddress" value="" id="PayFromTermToAddressSender">
                            <label class="form-check-label" for="PayFromTermToAddressSender">
                                За доставку с терминала на адрес
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRtoAddress Sender" type="radio" name="PayPRRtoAddress" value="" id="PayPRRtoAddressSender">
                            <label class="form-check-label" for="PayPRRtoAddressSender">
                                За ПРР на доставке на адрес
                            </label>
                        </div>
                        <h5 id="PaymentSender"></h5>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <h1>Получатель</h1>

                    <label for="INNreceiver" class="form-label">ИНН, если юр. лицо</label>
                    <input type="text" class="form-control" id="INNreceiver" placeholder="ИНН">

                    <label for="FIOreceiver" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="FIOreceiver" placeholder="ФИО">

                    <label for="Telreceiver" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="Telreceiver"
                        pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                        placeholder="+7(___)___-__-__">

                    <label for="Emailreceiver" class="form-label">Example label</label>
                    <input type="email" class="form-control" id="Emailreceiver" placeholder="Email">

                    <div class="container mt-5">
                        <div class="form-check">
                            <input class="form-check-input PayAll " type="radio" name="PayAll" value="" id="PayAllReceiver">
                            <label class="form-check-label" for="PayAllReceiver">
                                За все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayTermTransfer Receiver" type="radio" name="PayTermTransfer" value="" id="PayTermTransferReceiver">
                            <label class="form-check-label" for="PayTermTransferReceiver">
                                За терминальную перевозку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPac Receiver" type="radio" name="PayPac" value="" id="PayPacReceiver">
                            <label class="form-check-label" for="PayPacReceiver">
                                За упаковку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayIns Receiver" type="radio" name="PayIns" value="" id="PayInsReceiver">
                            <label class="form-check-label" for="PayInsReceiver">
                                За страховку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromAddressToTerm Receiver" type="radio" name="PayFromAddressToTerm" value="" id="PayFromAddressToTermReceiver">
                            <label class="form-check-label" for="PayFromAddressToTermReceiver">
                                За доставку от адреса до терминала
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRatAddress Receiver" type="radio" name="PayPRRatAddress" value="" id="PayPRRatAddressReceiver">
                            <label class="form-check-label" for="PayPRRatAddressReceiver">
                                За ПРР на адресе
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromTermToAddress Receiver" type="radio" name="PayFromTermToAddress" value="" id="PayFromTermToAddressReceiver">
                            <label class="form-check-label" for="PayFromTermToAddressReceiver">
                                За доставку с терминала на адрес
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRtoAddress Receiver" type="radio" name="PayPRRtoAddress" value="" id="PayPRRtoAddressReceiver">
                            <label class="form-check-label" for="PayPRRtoAddressReceiver">
                                За ПРР на доставке на адрес
                            </label>
                        </div>
                        <h5 id="PaymentReceiver"></h5>
                    </div>

                </div>
                <div class="col-sm-4 col-md-4">
                    <h1>3-е лицо</h1>

                    <label for="INN3dparty" class="form-label">ИНН, если юр. лицо</label>
                    <input type="text" class="form-control" id="INN3dparty" placeholder="ИНН">

                    <label for="FIO3dparty" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="FIO3dparty" placeholder="ФИО">

                    <label for="Tel3dparty" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="Tel3dparty"
                        pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                        placeholder="+7(___)___-__-__">

                    <label for="Email3dparty" class="form-label">Example label</label>
                    <input type="email" class="form-control" id="Email3dparty" placeholder="Email">

                    <div class="container mt-5">
                        <div class="form-check">
                            <input class="form-check-input PayAll " type="radio" name="PayAll" value="" id="PayAll3dparty">
                            <label class="form-check-label PayAlllabel" for="PayAll3dparty">
                                За все
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayTermTransfer 3dparty" type="radio" name="PayTermTransfer" value="" id="PayTermTransfer3dparty">
                            <label class="form-check-label PayTermTransferlabel" for="PayTermTransfer3dparty">
                                За терминальную перевозку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPac 3dparty" type="radio" name="PayPac" value="" id="PayPac3dparty">
                            <label class="form-check-label PayPaclabel" for="PayPac3dparty">
                                За упаковку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayIns 3dparty" type="radio" name="PayIns" value="" id="PayIns3dparty">
                            <label class="form-check-label PayInslabel" for="PayIns3dparty">
                                За страховку
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromAddressToTerm 3dparty" type="radio" name="PayFromAddressToTerm" value="" id="PayFromAddressToTerm3dparty">
                            <label class="form-check-label PayFromAddressToTermlabel" for="PayFromAddressToTerm3dparty">
                                За доставку от адреса до терминала
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRatAddress 3dparty" type="radio" name="PayPRRatAddress" value="" id="PayPRRatAddress3dparty">
                            <label class="form-check-label PayPRRatAddresslabel" for="PayPRRatAddress3dparty">
                                За ПРР на адресе
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayFromTermToAddress 3dparty" type="radio" name="PayFromTermToAddress" value="" id="PayFromTermToAddress3dparty">
                            <label class="form-check-label PayFromTermToAddresslabel" for="PayFromTermToAddress3dparty">
                                За доставку с терминала на адрес
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input PayPRRtoAddress 3dparty" type="radio" name="PayPRRtoAddress" value="" id="PayPRRtoAddress3dparty">
                            <label class="form-check-label PayPRRtoAddresslabel" for="PayPRRtoAddress3dparty">
                                За ПРР на доставке на адрес
                            </label>
                        </div>
                        <h5 id="Payment3dparty"></h5>
                    </div>

                </div>
            </div>
            <h1 id="total" class="mt-5">ИТОГО:</h1>
            <br>
            <input type="submit" class="btn btn-primary my-5">
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="ahunter-suggest.js"></script>
    <script SRC="props.js"></script>

    <script src="arrays.js"></script>
    <script src="timer.js"></script>
    <script src="sendform.js"></script>
</body>


</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" >
    <title>Calculator</title>
</head>

<body>
    <h1 class="text-center">Расчитайте стоимость доставки</h1>
    <form action="nextpage.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6">
                <select id="city1" style="max-width: 400px;" name="city_from" class="form-select form-select-lg mb-3"
                    aria-label=".form-select-lg example">
                    <option value="Moscow" selected>Москва</option>
                    <option value="SPB">Санкт-Петербург</option>
                </select>
                <button type="button" id="changeCities" class="btn btn-warning mb-5">Поменять города местами</button>
            </div>

            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                <select id="city2" style="max-width: 400px;" name="city_to" class="form-select form-select-lg mb-3"
                    aria-label=".form-select-lg example">
                    <option value="SPB" selected>Санкт-Петербург</option>
                    <option value="Moscow">Москва</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-6">
                <div class="input-group mb-3">
                    <input id="kg" type="number" name="kilograms" class="form-control" aria-label="Sizing example input"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">КГ</span>
                </div>

                <label for="kgRange" class="form-label"></label>
                <input type="range" min='0' max="100" step="0.5" class="form-range" value="" id="kgRange">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="opt1" name="options[]" id="check1">
                    <label class="form-check-label" for="check1" id="labelFor1">
                        Доставка груза на адрес
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="opt2" name="options[]" id="check2">
                    <label class="form-check-label" for="check2" id="labelFor2">
                        Забор груза на адресе
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="options[]" value="opt3"  id="check3">
                    <label class="form-check-label" for="check3" id="labelFor3">
                        Жесткая упаковка
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="opt4" name="options[]" id="check4">
                    <label class="form-check-label" for="check4" id="labelFor4">
                        Упаковка в стретч-пленку
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="options[]" value="opt5" id="check5">
                    <label class="form-check-label" for="check5" id="labelFor5">
                        Упаковка в паллет-борт
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="opt6" name="options[]" id="check6">
                    <label class="form-check-label" for="check6" id="labelFor6">
                        Страховка
                    </label>
                </div>

            </div>


            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                <div class="input-group mb-3">
                    <input id="meters" type="number" name="meters" class="form-control" value="0.01" step="0.01" min="0" max="80"
                        aria-label="Sizing example input" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">M^3</span>
                </div>
                <label for="metersRange" class="form-label"></label>
                <input type="range" min="0" max="100" step="0.01" class="form-range" id="metersRange">

                <br>
                <br>
                <br>
                <h3 id="DepEco"></h3>
                <h3 id="arrEco"></h3>
                <h1 id="resultEco" class="mb-5">Стоимость ЭКОНОМ: </h1>
                <h3 id="DepExpress"></h3>
                <h3 id="arrExpress"></h3>
                <h1 id="resultExpress">Стоимость ЭКСПРЕСС: </h1>

                <input class="btn btn-primary" type="submit" value="Оформить доставку">

            </div>
        </div>
    </div>

    </form>













    <script src="arrays.js"></script>
    <script src="timerforindex.js"></script>
    <script src="script.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
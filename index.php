<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stwórz własną skrzynke samochodową</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="generate.js"></script>
</head>
<body class="bg-dark bg-opacity-10">
<div class="container-lg">
    <div class="container bg-white rounded-3 p-5">
        <div class="row d-flex align-items-center">
            <div class="column col d-flex justify-content-center flex-column">
                <div class="form-1">
                    <div class="mb-5 container-fluid m-0 p-0">
                        <h1>Wprowadź wymiary dla Twojej skrzynki</h1>
                        <h6>(podana wartość wyrażana jest w centymetrach)</h6>
                    </div>
                    <div class="alert d-none"></div>
                    <div class="mb-3">
                        <label for="height" class="form-label fs-5 fw-normal">Wysokość:</label>
                        <input placeholder="25" type="number" class="form-control" id="height"
                               min="10"
                               max="40">
                    </div>
                    <div class="mb-3">
                        <label for="width" class="form-label fs-5 fw-normal">Szerokość:</label>
                        <input placeholder="40" type="number" class="form-control" id="width" min="10" max="100">
                    </div>
                    <div class="mb-5">
                        <label for="length" class="form-label fs-5 fw-normal">Długość:</label>
                        <input placeholder="60" type="number" class="form-control" id="length" min="10" max="100">
                    </div>
                    <button id="btn-next-1" class="mt-3 btn btn-primary">Przejdź dalej</button>
                    <div class="mt-4 border-bottom suma d-none justify-content-end fs-5">koszt wykonania:
                        <div class="cena fw-bold ms-2"></div>
                    </div>
                    <div class="fs-6 fst-italic mt-5">*wysokość musi mieścić się w przedziale 10-40cm</div>
                    <div class="fs-6 fst-italic">*szerokość musi mieścić się w przedziale 10-100cm</div>
                    <div class="fs-6 fst-italic mb-5">*długość musi mieścić się w przedziale 10-100cm</div>
                </div>
                <div class="form-2">
                    <div class="mb-5 container-fluid m-0 p-0">
                        <h1>Podaj swoje dane kontaktowe</h1>
                        <h6>(Potrzebujemy Twoich danych w celu wysłania przesyłki)</h6>
                    </div>
                    <div class="alert d-none"></div>
                    <div class="mb-3">
                        <label for="name" class="form-label fs-5 fw-normal">Imię:</label>
                        <input placeholder="Jan" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label fs-5 fw-normal">Nazwisko:</label>
                        <input placeholder="Kowalski" type="text" class="form-control" id="surname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-5 fw-normal">Email:</label>
                        <input placeholder="jankowalski@email" type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="telephon" class="form-label fs-5 fw-normal">Telefon:</label>
                        <input placeholder="111222333" type="number" class="form-control" id="telephon">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label fs-5 fw-normal">Adres zamieszkania:</label>
                        <input placeholder="Warszawa 00/00" type="text" class="form-control" id="address">
                    </div>
                    <div class="mb-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                            <label class="form-check-label fs-6 fw-normal" for="inlineFormCheck">
                                Zapoznałem się z regulaminem i akceptuję politykę prywatności
                            </label>
                        </div>
                    </div>
                    <button id="btn-prev-1" class="mt-3 btn btn-primary">Wróć</button>
                    <button id="btn-next-2" class="mt-3 btn btn-primary">Przejdź dalej</button>
                    <div class="mt-4 border-bottom suma d-none justify-content-end fs-5">koszt wykonania:
                        <div class="cena fw-bold ms-2"></div>
                    </div>
                </div>
            </div>
            <div class="col pos-box">
                <div class="cube">
                    <div class="p_height"><span class="fs-6 d-flex align-items-center"></span></div>
                    <div class="p_width"><span class="fs-6 d-flex align-items-end"></span></div>
                    <div class="p_length"><span class="fs-6 d-flex align-items-end"></span></div>
                    <div class="cube__wall cube__front"></div>
                    <div class="cube__wall cube__front inside"></div>
                    <div class="cube__wall cube__back"></div>
                    <div class="cube__wall cube__back inside"></div>
                    <div class="cube__wall cube__right"></div>
                    <div class="cube__wall cube__right inside"></div>
                    <div class="cube__wall cube__left"></div>
                    <div class="cube__wall cube__left inside"></div>
                    <div class="cube__wall cube__bottom"></div>
                    <div class="cube__wall cube__bottom inside"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
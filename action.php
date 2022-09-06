<?php

//Stałe zmienne
const MAX_HEIGHT = 40;
const MAX_WIDTH = 100;
const MAX_LENGTH = 100;
const MIN_HEIGHT = 10;
const MIN_WIDTH = 10;
const MIN_LENGTH = 10;
const PRICE_MATERIAL = 28/10000;
const PRICE_FELT = 25/10000;
const PRICE_OSB = 25/10000;


class Box1 {

    //Komunukaty błędów
    const MAX_HEIGHT_ERROR = 'Maksymalna wysokość to '.MAX_HEIGHT.' cm';
    const MAX_WIDTH_ERROR = 'Maksymalna szerokość to '.MAX_WIDTH.' cm';
    const MAX_LENGTH_ERROR = 'Maksymalna długość to '.MAX_LENGTH.' cm';
    const MIN_HEIGHT_ERROR = 'Minimalna wysokość to '.MIN_HEIGHT.' cm';
    const MIN_WIDTH_ERROR = 'Minimalna szerokość to '.MIN_WIDTH.' cm';
    const MIN_LENGTH_ERROR = 'Minimalna długość to '.MIN_LENGTH.' cm';

    public $height;
    public $width;
    public $length;

    public function __construct($postHeight,$postWidth,$postLength) {
        $this->height = $postHeight;
        $this->width = $postWidth;
        $this->length = $postLength;
    }

    public function checkData1() {

        //Sprawdzanie maksymalnych i minimalnych wymiarów
        if ($this->height > MAX_HEIGHT & $this->height !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MAX_HEIGHT_ERROR);
            echo json_encode($data);
        } else if ($this->width > MAX_WIDTH & $this->width !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MAX_WIDTH_ERROR);
            echo json_encode($data);
        } else if ($this->length > MAX_LENGTH & $this->length !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MAX_LENGTH_ERROR);
            echo json_encode($data);
        } else if ($this->height < MIN_HEIGHT & $this->height !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MIN_HEIGHT_ERROR);
            echo json_encode($data);
        } else if ($this->width < MIN_WIDTH & $this->width !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MIN_WIDTH_ERROR);
            echo json_encode($data);
        } else if ($this->length < MIN_LENGTH & $this->length !== 'false') {
            $data = array('error' => true, 'error_msg' => Box1::MIN_LENGTH_ERROR);
            echo json_encode($data);
        } else {

            //Powierzchnia materiałów
            $materialArea = 2*($this->height*$this->width)+2*($this->height*$this->length);
            $feltArea = 2*($this->width*$this->length)+(2*($this->height*$this->width)+2*($this->height*$this->length));
            $osbArea = 2*($this->width*$this->length)+(2*($this->height*$this->width)+($this->height*$this->length));

            //Podsumowanie kosztów
            $sum = ceil(($materialArea*PRICE_MATERIAL)+($feltArea*PRICE_FELT)+($osbArea*PRICE_OSB)+100);
            $data = array('error' => false, 'sum' => $sum);
            echo json_encode($data);
        }
    }
}

class Box2 {

    //Komunukaty błędów
    const NAME_ERROR = 'Proszę podać imię';
    const SURNAME_ERROR = 'Proszę podać nazwisko';
    const EMAIL_ERROR = 'Proszę podać adres email';
    const INCORRECT_EMAIL_ERROR = 'Proszę podać prawidłowy adres email';
    const TELEPHON_ERROR = 'Proszę podać numer telefonu';
    const INCORRECT_TELEPHON_ERROR = 'Proszę podać prawidłowy numer telefonu';
    const ADDRESS_ERROR = 'Proszę podać adres zamieszkania';
    const ACCEPT_ERROR = 'Proszę zaakceptować regulamin';

    public $name;
    public $surname;
    public $email;
    public $telephon;
    public $address;
    public $accept;

    public function __construct($postName,$postSurname,$postEmail,$postTelephon,$postAddress,$postAccept) {
        $this->name = $postName;
        $this->surname = $postSurname;
        $this->email = $postEmail;
        $this->telephon = $postTelephon;
        $this->address = $postAddress;
        $this->accept = $postAccept;
    }

    public function checkData2() {

        //Sprawdzanie danych kontaktowych
        if (empty($this->name) & $this->name !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::NAME_ERROR);
            echo json_encode($data);
        } else if (empty($this->surname) & $this->surname !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::SURNAME_ERROR);
            echo json_encode($data);
        } else if (empty($this->email) & $this->email !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::EMAIL_ERROR);
            echo json_encode($data);
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) & $this->email !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::INCORRECT_EMAIL_ERROR);
            echo json_encode($data);
        } else if (empty($this->telephon) & $this->telephon !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::TELEPHON_ERROR);
            echo json_encode($data);
        } else if (empty($this->address) & $this->address !== 'false') {
            $data = array('error' => true, 'error_msg' => Box2::ADDRESS_ERROR);
            echo json_encode($data);
        } else if ($this->accept === false) {
            $data = array('error' => true, 'error_msg' => Box2::ACCEPT_ERROR);
            echo json_encode($data);
        } else {
            $data = array('error' => false);
            echo json_encode($data);
        }
    }
}

//Ustawianie wymiarów skrzynki
if ($_POST['action'] == 'setData1') {

    //Pobranie nowych wymiarów
    $data = new Box1($_POST['height'], ($_POST['width']), ($_POST['length']));
    $data->checkData1();
}
if ($_POST['action'] == 'setData2') {

    //Pobranie nowych wymiarów
    $data = new Box2($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['telephon'], $_POST['address'],
        $_POST['accept']);
    $data->checkData2();
}
//Wymiary prezentowanej skrzynki
var height = 0;
var width = 0;
var length = 0;

var name = '';
var surname = '';
var email = '';
var telephon = '';
var address = '';
var accept = '';

var pSize = 10; //Odstęp parametru
var unit = ' cm'; //Jednostka miary
var size = 3.5; //Skala powiększenia

function generateBox(){

    //Zmiana skali w zależności od rozdzielczości
    if($(window).innerWidth() <= 751) size = 2.2;
    else if($(window).innerWidth() <= 1199 ) size = 3.2;

    //Wygląd zewnętrzny
    $('.cube').css({'width': width*size, 'height': height*size, 'padding-top': (height*size)+120});
    $('.cube__front').css({'width': width*size, 'height': height*size, 'transform': 'rotateY(0deg) translateZ('+(length/2)*size+'px)', 'bottom': '0'});
    $('.cube__back').css({'width': width*size, 'height': height*size, 'transform': 'rotateY(180deg) translateZ('+(length/2)*size+'px)', 'bottom': '0'});
    $('.cube__right').css({'width': length*size, 'height': height*size, 'transform': 'rotateY(90deg) translateZ('+((width-length)+(length/2))*size+'px)', 'bottom': '0'});
    $('.cube__left').css({'width': length*size, 'height': height*size, 'transform': 'rotateY(-90deg) translateZ('+(length/2)*size+'px)', 'bottom': '0'});
    $('.cube__bottom').css({'width': width*size, 'height': length*size, 'transform': 'rotateX(-90deg) translateZ('+(length/2)*size+'px)', 'bottom': '0'});

    //Wygląd wewnętrzny
    $('.cube__front.inside').css({'width': width*size, 'height': height*size, 'transform': 'rotateY(0deg) translateZ('+((length/2)*size-1)+'px)', 'bottom': '0'});
    $('.cube__back.inside').css({'width': width*size, 'height': height*size, 'transform': 'rotateY(180deg) translateZ('+((length/2)*size-1)+'px)', 'bottom': '0'});
    $('.cube__right.inside').css({'width': length*size, 'height': height*size, 'transform': 'rotateY(90deg) translateZ('+(((width-length)+(length/2))*size-1)+'px)', 'bottom': '0'});
    $('.cube__left.inside').css({'width': length*size, 'height': height*size, 'transform': 'rotateY(-90deg) translateZ('+((length/2)*size-1)+'px)', 'bottom': '0'});
    $('.cube__bottom.inside').css({'width': width*size, 'height': length*size, 'transform': 'rotateX(-90deg) translateZ('+(length/2)*size-1+'px)', 'bottom': '0'});

    //Wygląd pararametrów
    $('.p_width').css({'width': width*size, 'height': pSize*size, 'transform': 'rotateX(-90deg)' +
            ' translateY(-'+(((length/2)+(pSize/2))*size)+'px) translateZ('+(pSize/2)*size+'px)', 'bottom': '0'});
    $('.p_length').css({'width': length*size, 'height': pSize*size, 'transform': 'rotateY(90deg)' +
            ' rotateX(90deg) translateY(-'+(((length/2)+(pSize/2))*size)+'px) translateZ(-'+(pSize/2)*size+'px)',
        'bottom': '0'});
    $('.p_height').css({'width': pSize*size, 'height': height*size, 'transform': 'rotateY(270deg)' +
            'translateX(-'+(((length/2)+(pSize/2))*size)+'px) translateZ('+(pSize/2)*size+'px)', 'bottom': '0'});

    //Wygląd wartości parametrów i dodawanie wartości do paramatrów
    $('.p_height span').text(height+unit);
    $('.p_width span').text(width+unit).css({'transform': 'rotateX(180deg)'});
    $('.p_length span').text(length+unit).css({'transform': 'rotate(180deg)'});
}

function generate(){

    //Usuwanie komunikatu
    $('.alert').removeClass('alert-danger d-flex').empty().addClass('d-none');
    if(start == true) {
        generateBox(height=25,width=40,length=60)
        $('#btn-next-1').addClass('disabled');
    } else {
        let dataPost = {'action': 'setData1', 'height': height, 'width': width, 'length': length};
        if ($('.form-2').css('display') == 'block') {
            dataPost = {'action': 'setData2', 'name': name, 'surname': surname, 'email': email, 'telephon': telephon, 'address': address, 'accept': accept};
        }
        //Pobieranie maksymalnych i minimalnych wymiarów
        $.ajax({
            url: "action.php",
            type: "POST",
            data: dataPost,
            success: (response) => {
                const obj = $.parseJSON(response);

                //Sprawdzanie błędów
                if (obj.error == true) {
                    $('.alert').addClass('alert-danger d-flex').text(obj.error_msg).removeClass('d-none');
                    $('#btn-next-1').addClass('disabled');
                } else {
                    generateBox()
                    $('.cena').text(obj.sum + 'zł');
                    $('.suma').removeClass('d-none').addClass('d-flex');
                    $('#btn-next-1').removeClass('disabled');
                }
            }, error: (XMLHttpRequest, textStatus, errorThrown) => {
                alert("some error");
            }
        });
    }
}

//Pobieranie danych z inputa
function onChangeInput() {
    $('input').change((e) => {
        let id = e.target.id;
        window[id] = e.target.value; //Zmienna dynamiczna
        generate(start=false);
    });
}

$(document).ready(() => {
     generate(start=true);
     onChangeInput();

    //Po najechaniu na skrzynkę
    $('.cube').hover(() => {
        $('.p_height,.p_width,.p_length').css('display', 'flex');
    },() => {
        $('.p_height,.p_width,.p_length').css('display', 'none');
    });

    //Po kliknięciu
    $('#btn-next-1').click(() => {
        $('.form-1').slideUp('slow');
        $('.form-2').slideDown('slow');
    });
    $('#btn-prev-1').click(() => {
        $('.form-2').slideUp('slow');
        $('.form-1').slideDown('slow');
    });
});
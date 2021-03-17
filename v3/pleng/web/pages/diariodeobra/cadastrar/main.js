var cont1 = document.getElementById('parte1');
var cont2 = document.getElementById('parte2');
var cont3 = document.getElementById('parte3');

var form = document.getElementById('form1');

var contClick = 0;

function onClickAvancar() {
    
    switch(contClick) {
        case 0: {
            contClick+=1;
            ativaCont2();
            break;
        }
        case 1: {
            contClick+=1;
            ativaCont3();
            break;
        }
        default: {
            break;
        }
    }
}

function onClickVoltar() {
    
    switch(contClick) {
        case 1: {
            contClick-=1;
            ativaCont1();
            break;
        }
        case 2: {
            contClick-=1;
            ativaCont2();
            break;
        }
        default: {
            break;
        }
    }
}

function ativaCont1() {
    cont1.classList.remove('isHidden');
    form.classList.remove('isHidden');
    cont2.classList.add('isHidden');
    cont3.classList.add('isHidden');
}

function ativaCont2() {
    cont2.classList.remove('isHidden');
    form.classList.remove('isHidden');
    cont1.classList.add('isHidden');
    cont3.classList.add('isHidden');
}

function ativaCont3() {
    cont3.classList.remove('isHidden');
    cont2.classList.add('isHidden');
    cont1.classList.add('isHidden');
    form.classList.add('isHidden');
}


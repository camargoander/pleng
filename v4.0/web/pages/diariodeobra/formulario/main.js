var listaMateriais = [];

function onClickSalvarMaterial() {
    var select = document.querySelector('select[name="material"]'),
        id = select.value,
        nome = select.children[select.selectedIndex].textContent,
        qtdeUsada = document.querySelector('input[name="qtdeMatUsada"]').value,
        qtdeTotal = 400;
    
    var material = {
        id: id,
        nome: nome,
        qtdeUsada: qtdeUsada,
        qtdeTotal: qtdeTotal
    };

    listaMateriais.push(material);

    this.onAtualizarLista();
   
}

function criarCabecalho() {
    var div = document.createElement('div'),
        labelNome = document.createElement('label'),
        bNome = document.createElement('b'),
        labelQtdeUsada = document.createElement('label'),
        bQtdeUsada = document.createElement('b'),
        labelQtdeTotal = document.createElement('label'),
        bQtdeTotal = document.createElement('b'),
        labelExcluir = document.createElement('label'),
        bExcluir = document.createElement('b');

    div.classList.add('itemlista');

    labelNome.innerText = "Nome do material";
    labelQtdeUsada.innerText = "Qtde usada";
    labelQtdeTotal.innerText = "Qtde total";
    labelExcluir.innerText = "X";

    bNome.appendChild(labelNome);
    bQtdeUsada.appendChild(labelQtdeUsada);
    bQtdeTotal.appendChild(labelQtdeTotal);
    bExcluir.appendChild(labelExcluir);
    
    div.appendChild(bNome);
    div.appendChild(bQtdeUsada);
    div.appendChild(bQtdeTotal);
    div.appendChild(bExcluir);

    return div;
}

function criarBtnExcluir(id) {
    var label = document.createElement('label'),
        a = document.createElement('a'),
        b = document.createElement('b');
    
    a.href = `#deletar&id=${id}`;
    a.title = 'Excluir',
    a.innerText = 'X';

    b.appendChild(a);

    label.appendChild(b);

    return label;
}

function onDeletarMaterial(id) {

    listaMateriais.forEach(function(record, index) {
        if(record.id === id) {
            listaMateriais.splice(index, 1)

            this.onAtualizarLista()

            return
        }
    })
}

function onAtualizarLista() {
    var lista = document.querySelector('.lista'),
        cabecalho = this.criarCabecalho();

    lista.innerHTML = "";

    lista.appendChild(cabecalho);

    if(listaMateriais.length > 0) {
        listaMateriais.forEach(function(record) {
            var div = document.createElement('div'),
                labelNome = document.createElement('label'),
                labelQtdeUsada = document.createElement('label'),
                labelQtdeTotal = document.createElement('label');

            div.classList.add('itemlista');

            labelNome.innerText = record.nome;
            labelQtdeUsada.innerText = record.qtdeUsada;
            labelQtdeTotal.innerText = record.qtdeTotal;

            div.appendChild(labelNome);
            div.appendChild(labelQtdeUsada);
            div.appendChild(labelQtdeTotal);

            var btnExcluir = this.criarBtnExcluir(record.id)
            
            btnExcluir.addEventListener("click", () => {
               this.onDeletarMaterial(record.id)
            })

            div.appendChild(btnExcluir);

            lista.appendChild(div);
        });
    }

    setTimeout(() => {
        this.limpaRota();
    }, 100);
}

function limpaRota() {
    window.history.pushState({}, document.title, window.location.pathname)
}
// -----------------

var timerDataList = {};//Para usar com multiplos datalist

function qs(query, context) {
    return (context || document).querySelector(query);
 }
 function qsa(query, context) {
    return (context || document).querySelectorAll(query);
 }
   
qs("#obs").addEventListener('input', function (e) {
    var listAttr = e.target.getAttribute('list');
      
    if (timerDataList[listAttr]) 
        clearTimeout(timerDataList[listAttr]);
   
    timerDataList[listAttr] = setTimeout(executeCheckin, 100, e.target, listAttr);
 });
   
function executeCheckin(target, listAttr) {
    var options = qsa( 'option', qs('#' + listAttr) ),
        values = [];
     
    [].forEach.call(options, function (option) {
        values.push(option.value)
    });

    var currentValue = target.value;
        currentValue = currentValue.substr(0, currentValue.indexOf('-')).trim()
    var inValorTotal = document.querySelector('#tamTotal');
    var inLevantamento = document.querySelector('#levantamento');

    
    if (values.indexOf(target.value) !== -1) {
        var valorTotal = document.getElementById(currentValue).textContent;
        
        inValorTotal.value = valorTotal.substr(valorTotal.indexOf('-') + 2).trim()
        inLevantamento.value = currentValue;
    } else {
        inValorTotal.value = "";
        inLevantamento.value = "";
    }
 }


function calculaValorFaltante() {
    var valorTotal = document.getElementById('valorTotal')
    var valorRecebido = document.getElementById('valorRecebido')
    var valorFaltante = document.getElementById('valorFaltante')

    valorFaltante.value = valorTotal.value - valorRecebido.value;
}
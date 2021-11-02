var listaMateriais = [];
var materiaisArray = [];

function onClickSalvarMaterial() {
    var select = document.querySelector('select[name="material"]'),
        id = select.value,
        nome = select.children[select.selectedIndex].textContent,
        qtde = document.querySelector('input[name="qtde"]').value;
    
    var material = {
        id: id,
        nome: nome.trim(),
        qtde: qtde,
    };

    listaMateriais.push(material);

    this.onAtualizarLista();
   
}


function criarCabecalho() {
    var div = document.createElement('div'),
        labelNome = document.createElement('label'),
        bNome = document.createElement('b'),
        labelQtde = document.createElement('label'),
        bQtde = document.createElement('b'),
        labelExcluir = document.createElement('label'),
        bExcluir = document.createElement('b');

    div.classList.add('itemlista');

    labelNome.innerText = "Nome do material";
    labelQtde.innerText = "Quantidade";
    labelExcluir.innerText = "X";

    bNome.appendChild(labelNome);
    bQtde.appendChild(labelQtde);
    bExcluir.appendChild(labelExcluir);
    
    div.appendChild(bNome);
    div.appendChild(bQtde);
    div.appendChild(bExcluir);

    return div;
}


function criarBtnExcluir(id) {
    var label = document.createElement('label'),
        a = document.createElement('a'),
        b = document.createElement('b');
    
    // a.href = `#deletar&id=${id}`;
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
        cabecalho = this.criarCabecalho()
        materiaisInput = document.querySelector('#matValue');

    lista.innerHTML = "";

    materiaisArray = [];
    
    if(listaMateriais.length > 0) {
        
        lista.appendChild(cabecalho);

        listaMateriais.forEach(function(record) {

            var div = document.createElement('div'),
                labelNome = document.createElement('label'),
                labelQtde = document.createElement('label');

            div.classList.add('itemlista');

            labelNome.innerText = record.nome;
            labelQtde.innerText = record.qtde;

            div.appendChild(labelNome);
            div.appendChild(labelQtde);

            var btnExcluir = this.criarBtnExcluir(record.id)
            
            btnExcluir.addEventListener("click", () => {
               this.onDeletarMaterial(record.id)
            })

            div.appendChild(btnExcluir);

            lista.appendChild(div);

            materiaisArray.push(JSON.stringify(record))
        });

        materiaisInput.value = materiaisArray.toString().replace('},', '}\\');
    }


    setTimeout(() => {
        this.limpaRota();
    }, 100);
}

function limpaRota() {
    window.history.pushState({}, document.title, window.location.pathname + '#cadastrarModal')
}
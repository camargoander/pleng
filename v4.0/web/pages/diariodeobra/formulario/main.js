var listaMateriais = [];

function onClickSalvarMaterial() {
    var lista = document.querySelector('.lista'),
        id = document.querySelector('select[name="material"]').value,
        nome = document.querySelector('select[name="material"]').innerText,
        qtdeUsada = document.querySelector('input[name="qtdeMatUsada"]').value,
        qtdeTotal = 400;
    
    var material = {
        id: id,
        nome: nome,
        qtdeUsada: qtdeUsada,
        qtdeTotal: qtdeTotal
    };

    var cabecalho = this.criarCabecalho();

    listaMateriais.push(material);

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

            var btnExcluir = this.criarBtnExcluir(record.id);

            div.appendChild(btnExcluir);

            lista.appendChild(div);
        });
    }
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
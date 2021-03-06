// script de filtro
var atributo = 1;
/*
@atributo: 0 = nome, 6 = cidade, 7 = raça, 1-5 = icones de pata
*/
function filtro(nome) {
    var cards = document.getElementsByClassName("filtravel");
    for (card of cards) {
        card.style.display = "block";
        cidade = card.children[0].children[1].children[atributo].innerText;
        //console.log(cidade); // cidade do cachorro
        if (cidade.toLowerCase().search(nome.toLowerCase())) {
            card.style.display = "none";
        }
    }
}

// *******************

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");

    if ($("#wrapper").hasClass("toggled")) {
        $("#menu-toggle").html('<i class="fas fa-caret-right fa-2x"></i>');
    } else {
        $("#menu-toggle").html('<i class="fas fa-caret-left fa-2x"></i>');
    }
});

let anoAtual = new Date().getFullYear();
$("#anoAtual").html(anoAtual);

function preencheExemplosELabelBusca() {
    let buscaPor = $("#select-atributo").val();

    if (buscaPor == 1) {
        $("#label-busca").html("Raça");
        $("#busca").attr("placeholder", "Ex.: Buldogue, Pug, Yorkshire...");
    } else if (buscaPor == 2) {
        $("#label-busca").html("Localidade");
        $("#busca").attr(
            "placeholder",
            "Ex.: Fortaleza - CE, São Paulo - SP..."
        );
    }
}

preencheExemplosELabelBusca();
$("#select-atributo").change(function() {
    preencheExemplosELabelBusca();
});

if ($("#btnModalLoginNecessario").length > 0) {
    $("#btnModalLoginNecessario").click();
}

$("#btnModalLoginNecessarioEntrar").click(() => {
    $("#btnModalLoginNecessarioClose").click();
});

// Galeria
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs((slideIndex += n));
    plusDivsDelete(n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("galeria-item");
    if (n > x.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}

// btn deletar
var slideIndexDelete = 1;
showDivsDelete(slideIndexDelete);

function plusDivsDelete(n) {
    showDivsDelete((slideIndexDelete += n));
}

function showDivsDelete(n) {
    var i;
    var x = document.getElementsByClassName("galeria-item-delete");
    if (n > x.length) {
        slideIndexDelete = 1;
    }
    if (n < 1) {
        slideIndexDelete = x.length;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndexDelete - 1].style.display = "block";
}


const buttons = document.querySelectorAll(".bDelete");

buttons.forEach(button => {
    button.addEventListener("click", function(){
        const cod = this.dataset.cod;
        const confirm = window.confirm(`¿Deseas eliminar la categoria(${cod})?`);

        if (confirm) {
            httpRequest("http://localhost/ArteriaElectronicsMVC/categories/deleteCategory/" + cod, function(){
                console.log(this.responseText);

                const tbody = document.querySelector("#tbody-categories");
                const rows = document.querySelector("#row-" + cod);

                tbody.removeChild(rows);
            });
        }
    });
});

function httpRequest (url, callback) {
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(http);
        }
    }
}

function abrirform() {
    document.getElementById("formregistrar").style.display = "block";
}

function cancelarform() {
    document.getElementById("formregistrar").style.display = "none";
}
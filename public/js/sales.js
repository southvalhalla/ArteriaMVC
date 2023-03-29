const buttonAdd = document.querySelectorAll("#btnAdd");
const buttonDel = document.querySelectorAll("#btnDel");

const cardCheck = document.getElementById("confirm_card_method");
const cashCheck = document.getElementById("confirm_cash_method");
const nequiCheck = document.getElementById("confirm_nequi_method");

const cardElement1 = document.getElementById("card_element1");
const cardElement2= document.getElementById("card_element2");
const cardElement3 = document.getElementById("card_element3");
const cardElement4 = document.getElementById("card_element4");
const cardElement5 = document.getElementById("card_element5");
const cardElement6 = document.getElementById("card_element6");

const cashElement1 = document.getElementById("cash_element1");
const cashElement2 = document.getElementById("cash_element2");

const nequiElement1 = document.getElementById("nequi_element1");
const nequiElement2 = document.getElementById("nequi_element2");

const MethodInfo = document.getElementById("view-method");
const productsInfo = document.getElementById("view-products");
const viewInfo = document.getElementById("view-info");

const buttonDelete = document.querySelectorAll(".bDelete");

buttonAdd.forEach(button => {
    i = 0;
    button.addEventListener("click", ()=>{
        i++;
        const product = document.getElementById("product");
        const newP = document.getElementById("new");

        let newclone = newP.cloneNode(true);
        newclone.setAttribute('id', 'new-'+i);
        newclone.setAttribute('data-id', 'new-'+i);

        product.appendChild(newclone);

    });
});

$(document).ready(function() {
    $(cardCheck).change(function() {
        $.ajax({
            type: "POST",
            url: "sales/changeMethod",
            data: { required: true, disabled: false },
            success: function(response) {
                $(cardElement1).prop('required', true);
                $(cardElement2).prop('required', true);
                $(cardElement3).prop('required', true);
                $(cardElement4).prop('required', true);
                $(cardElement5).prop('required', true);
                $(cardElement6).prop('required', true);

                $(cardElement1).prop('disabled', false);
                $(cardElement2).prop('disabled', false);
                $(cardElement3).prop('disabled', false);
                $(cardElement4).prop('disabled', false);
                $(cardElement5).prop('disabled', false);
                $(cardElement6).prop('disabled', false);

                $(cashElement1).prop('required', false);
                $(cashElement2).prop('required', false);
                
                $(cashElement1).prop('disabled', true);
                $(cashElement2).prop('disabled', true);

                $(nequiElement1).prop('required', false);
                $(nequiElement2).prop('required', false);

                $(nequiElement1).prop('disabled', true);
                $(nequiElement2).prop('disabled', true);
            }
        });
    });
    $(cashCheck).change(function() {
        $.ajax({
            type: "POST",
            url: "sales/changeMethod",
            data: { required: true, disabled: false },
            success: function(response) {
                $(cardElement1).prop('required', false);
                $(cardElement2).prop('required', false);
                $(cardElement3).prop('required', false);
                $(cardElement4).prop('required', false);
                $(cardElement5).prop('required', false);
                $(cardElement6).prop('required', false);

                $(cardElement1).prop('disabled', true);
                $(cardElement2).prop('disabled', true);
                $(cardElement3).prop('disabled', true);
                $(cardElement4).prop('disabled', true);
                $(cardElement5).prop('disabled', true);
                $(cardElement6).prop('disabled', true);

                $(cashElement1).prop('required', true);
                $(cashElement2).prop('required', true);
                
                $(cashElement1).prop('disabled', false);
                $(cashElement2).prop('disabled', false);

                $(nequiElement1).prop('required', false);
                $(nequiElement2).prop('required', false);

                $(nequiElement1).prop('disabled', true);
                $(nequiElement2).prop('disabled', true);
            }
        });
    });
    $(nequiCheck).change(function() {
        $.ajax({
            type: "POST",
            url: "sales/changeMethod",
            data: { required: true, disabled: false },
            success: function(response) {
                $(cardElement1).prop('required', false);
                $(cardElement2).prop('required', false);
                $(cardElement3).prop('required', false);
                $(cardElement4).prop('required', false);
                $(cardElement5).prop('required', false);
                $(cardElement6).prop('required', false);

                $(cardElement1).prop('disabled', true);
                $(cardElement2).prop('disabled', true);
                $(cardElement3).prop('disabled', true);
                $(cardElement4).prop('disabled', true);
                $(cardElement5).prop('disabled', true);
                $(cardElement6).prop('disabled', true);

                $(cashElement1).prop('required', false);
                $(cashElement2).prop('required', false);
                
                $(cashElement1).prop('disabled', true);
                $(cashElement2).prop('disabled', true);

                $(nequiElement1).prop('required', true);
                $(nequiElement2).prop('required', true);

                $(nequiElement1).prop('disabled', false);
                $(nequiElement2).prop('disabled', false);
            }
        });
    });
});

function change(id){
    // const id = this.dataset.id;
    const buttonChange = document.getElementById("btnChange-" + id);
    const formStatus = document.getElementById("formStatus-" + id);
    const viewStatus = document.getElementById("viewStatus-" + id);
    viewStatus.setAttribute('hidden','');
    buttonChange.setAttribute('hidden','');
    formStatus.removeAttribute('hidden');
};
buttonDelete.forEach(button => {
    button.addEventListener("click", function(){
        const id = this.dataset.id;
        const confirm = window.confirm(`¿Deseas eliminar el producto(${id})?`);

        if (confirm) {
            httpRequest("http://localhost/ArteriaElectronicsMVC/sales/deleteSale/" + id, function(){
                console.log(this.responseText);

                const tbody = document.querySelector("#tbody-sales");
                const rows = document.querySelector("#row-" + id);

                tbody.removeChild(rows);
            });
        }
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
});

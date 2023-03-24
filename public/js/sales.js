const buttonAdd = document.querySelectorAll("#btnAdd");

buttonAdd.forEach(button => {
    button.addEventListener("click", function(){

        const product = document.getElementById("product");
        const newP = document.getElementById("new");

        let newclone = newP.cloneNode(true);

        product.appendChild(newclone);

    });
});

const node = document.createElement("div.");
const textnode = document.createTextNode("Water");
node.appendChild(textnode);
document.getElementById("myList").appendChild(node);
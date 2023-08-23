
function copy() {
    var text = document.getElementById("text");

    text.select();
    text.setSelectionRange(0,99999);

    navigator.clipboard.writeText(text.value);

    alert("Copied");
}


myButton.addEventListener("click", function () {
    myPopup.classList.add("show");
});
closePopup.addEventListener("click", function () {
    myPopup.classList.remove("show");
});
window.addEventListener("click", function (event) {
    if (event.target == myPopup) {
        myPopup.classList.remove("show");
    }
});

function copy1() {
    var text = document.getElementById("text1");

    text.select(); 
    text.setSelectionRange(0,99999);

    navigator.clipboard.writeText(text.value);

    alert("Copied");
}


function checkDate(date) {
    var re = /[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9] [0-9][0-9]:[0-9][0-9]:[0-9][0-9]/;
    return re.test(date);
}
function validate() {
    var date = document.getElementById("start").value;

    if (!checkDate(date)) {
        alert("La date saisie ne correspond pas au format suivant : YYYY-MM-JJ HH:MM:SS");
        window.event.preventDefault();
    }
    return false;
}

document.getElementById("add-button").addEventListener("click", validate);

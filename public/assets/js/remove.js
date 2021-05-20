var button = document.getElementsByClassName("remove");

for (let index = 0; index < button.length; index++) {
    button[index].addEventListener("click", (event) => {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                event.target.parentElement.parentElement.remove();
            }
        };

        xhttp.open("GET", "EventsManager.php?id=" + event.target.parentElement.parentElement.childNodes[1].textContent, true);
        xhttp.send();
    });
}


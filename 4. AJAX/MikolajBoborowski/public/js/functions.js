// Proste funkcje JavaScript, głównie dotyczące AJAX'a

// Przechodzi pod dany URL po potwierdzeniu przez użytkownika
function confirmLink(link, message) {
    if (confirm(message)) {
        window.location.href = link;
    }
}

// Wysyła formularz (POST) i podmienia zawartość wskazanego elementu
function ajaxPostForm(id_form, url, id_to_reload) {
    var form = document.getElementById(id_form);
    var formData = new FormData(form);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById(id_to_reload).innerHTML = this.responseText;
            } else {
                console.error('AJAX error: ' + this.status);
            }
        }
    };
    xhttp.open("POST", url, true);
    xhttp.send(formData);
}

// Asynchroniczne odświeżanie elementu (GET). Interval w ms.
function ajaxReloadElement(id_element, url, interval = 0) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id_element).innerHTML = this.responseText;
            if (interval > 0)
                setTimeout(function() {
                    ajaxReloadElement(id_element, url, interval)
                }, interval);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

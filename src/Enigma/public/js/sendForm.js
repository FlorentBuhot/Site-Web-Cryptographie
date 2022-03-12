function sendSelect() {
    document.querySelector("#formSelect").submit();
}

function sendReponse() {
    document.querySelector("#formReponse").removeAttribute('target');
    document.querySelector("input[name='action']").value = "formReussirEnigme";
    document.querySelector("#formReponse").submit();
}

function sendReponseMenu() {
    document.querySelector("#formReponse").removeAttribute('target');
    document.querySelector("input[name='action']").value = "formReussirEnigmeMenu";
    document.querySelector("#formReponse").submit();
}


function sendPoints() {
    toggle_text();
}

function sendFormPoints() {
    document.querySelector('#userPoints').innerHTML = document.querySelector("input[name=pointsJoueur]").value;
    document.querySelector("#formReponse").setAttribute('target', 'content');
    document.querySelector("input[name='action']").value = "formSupprPoints";
    document.querySelector("#formReponse").submit();
    return false;
}
const boutonIndice = document.querySelector('#indice_button');
const boutonBlocNote = document.querySelector('#blocnote_button');

const spanI = document.querySelector("#cont_ind");
const spanBN = document.querySelector('#cont_blocnote');

let isUpIndice = false, isUpBlocNote = false;

function toggle_textI() {
    isUpIndice = true;
    spanI.style.display = 'inline';
    boutonIndice.style.opacity = 0;

    if (isUpBlocNote) {
        spanI.style.top = '20%';
    }
}

function toggle_retourI() {
    isUpIndice = false;
    spanI.style.display = 'none';
    boutonIndice.style.opacity = 1;
}

function display_blocNote() {
    isUpBlocNote = true;
    spanBN.style.display = 'inline';
    boutonBlocNote.style.opacity = 0;

    if (isUpIndice) {
        spanI.style.top = '20%';
    }

}

function toggle_retourBN() {
    isUpBlocNote = false;
    spanBN.style.display = 'none';
    boutonBlocNote.style.opacity = 1;

    if (isUpIndice) {
        spanI.style.top = '30%';
    }
}
function convertSeconds(sec) {
    const convert = function (x) {
        return (x < 10) ? "0" + x : x;
    };
    let rep;
    let h = convert(parseInt(sec / (60 * 60)));
    let m = convert(parseInt(sec / 60 % 60));
    let s = convert(sec % 60);

    if (h == 0 && m == 0) {
        rep = s + " secondes !";
    } else if (h == 0) {
        rep = m + " minutes et " + s + " secondes !";
    } else {
        rep = h + " heures, " + m + " minutes et " + s + " secondes !";
    }
    return rep;
}

let interval;

function setTimer() {
    if (interval != null) {
        return;
    }
    interval = setInterval(Timer, 1000);
}

let temps;

function Timer() {
    temps++;
    if (temps === 600) {
        document.querySelector(".zone_alert").classList.add('active');
    }
}

function resetTimer() {
    temps = 0;
    clearInterval(interval);
    interval = null;
}

function getTimeConvert() {
    return convertSeconds(temps);
}

function getTime() {
    return temps;
}

function restart() {
    resetTimer();
    setTimer();
}

interval = null;
temps = 0;

function closeAlert() {
    document.querySelector(".zone_alert").classList.remove('active');
}

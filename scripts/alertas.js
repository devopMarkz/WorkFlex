if ("Notification" in window) {
    if (Notification.permission === "granted") {
        emitirNotificacoes();
    } 
    else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
                emitirNotificacoes();
            }
        });
    }
}

function emitirNotificacoes() {
    setInterval(() => {
        const agora = new Date();
        const horaAtual = agora.getHours();
        const minutosAtuais = agora.getMinutes();

        if (horaAtual === 9 && minutosAtuais === 30) {
            new Notification("WorkFlex", { body: "É hora da 1ª pausa (9:30h)!" });
        }
        if (horaAtual === 11 && minutosAtuais === 0) {
            new Notification("WorkFlex", { body: "É hora da 2ª pausa (11:00h)!" });
        }
        if (horaAtual === 15 && minutosAtuais === 30) {
            new Notification("WorkFlex", { body: "É hora da 3ª pausa (15:30h)!" });
        }
        if (horaAtual === 17 && minutosAtuais === 0) {
            new Notification("WorkFlex", { body: "É hora da 4ª pausa (17:00h)!" });
        }
    }, 60000);  
}

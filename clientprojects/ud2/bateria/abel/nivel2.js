document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const resultado = document.getElementById('resultado');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const nivelMagia = parseInt(document.getElementById("nivelMagia").value);
        const capa = document.getElementById("capa").value;

        let mensaje = "";

        if (nivelMagia > 70) {
            mensaje += "¡Cuidado, magia poderosa!<br>";
        } else {
            mensaje += "Magia inofensiva.<br>";
        }

        switch (capa) {
            case "invisible":
                mensaje += "Puedes espiar sin ser visto.";
                break;
            case "roja":
                mensaje += "Todos te miran.";
                break;
            case "negra":
                mensaje += "Sospechoso.";
                break;
            default:
                mensaje += "Capa desconocida.";
            }

        resultado.innerHTML = mensaje;
    });
});

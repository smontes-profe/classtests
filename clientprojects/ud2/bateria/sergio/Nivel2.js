 function evaluarAmenaza() {

      let nivelMagia = parseInt(document.getElementById("nivelMagia").value);
      let capa = document.getElementById("capa").value;
      let mensaje = "";

      if (nivelMagia > 70) {
        mensaje += "¡Cuidado, magia poderosa! ⚡<br>";
      } else {
        mensaje += "Magia inofensiva ✨<br>";
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


      document.getElementById("resultado").innerHTML = mensaje;
    }
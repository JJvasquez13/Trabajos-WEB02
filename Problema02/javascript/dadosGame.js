function cambiarColorCelda(numero) {
  const celda = document.getElementById(`celda${numero}`);
  if (celda) {
    celda.style.backgroundColor = "green";
  }
}

function lanzarDados() {
  // Genera números aleatorios entre 1 y 6 para dos dados
  const resultadoDado1 = Math.floor(Math.random() * 6) + 1;
  const resultadoDado2 = Math.floor(Math.random() * 6) + 1;

  // Actualiza las imágenes de los dados con los resultados
  document.getElementById("dado1").src = `img/cara${resultadoDado1}.jpg`;
  document.getElementById("dado2").src = `img/cara${resultadoDado2}.jpg`;

  // Suma los resultados de los dados
  const sumaDados = resultadoDado1 + resultadoDado2;

  // Define un número aleatorio no seleccionado por el usuario
  const numeroAleatorioUno = Math.floor(Math.random() * 11) + 2;
  const numeroAleatorioDos = Math.floor(Math.random() * 11) + 2;

  while (numeroAleatorioDos === numeroAleatorioUno) {
    numeroAleatorioDos = Math.floor(Math.random() * 11) + 2;
  }

  // Comprueba si la suma de los dados es igual al número aleatorio
  if (sumaDados === numeroAleatorioUno || sumaDados === numeroAleatorioDos) {
    document.getElementById("imagenResultado").src = "img/emoji1.png";
  } else {
    document.getElementById("imagenResultado").src = "img/emoji2.png";
  }

  for (let i = 2; i <= 12; i++) {
    const celda = document.getElementById(`celda${i}`);
    if (celda) {
      celda.style.backgroundColor = "";
    }
  }

  cambiarColorCelda(numeroAleatorioUno);
  cambiarColorCelda(numeroAleatorioDos);

  const numeroDado1Element = document.getElementById("numeroDado1");
  const numeroDado2Element = document.getElementById("numeroDado2");

  numeroDado1Element.textContent = numeroAleatorioUno;
  numeroDado2Element.textContent = numeroAleatorioDos;

  const numeroSumaElement = document.getElementById("numeroSuma");
  numeroSumaElement.textContent = sumaDados;
}

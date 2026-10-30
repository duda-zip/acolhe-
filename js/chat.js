function Options() {
    const menu = document.getElementById("optionsMenu");
    menu.style.display = menu.style.display === "none" ? "block" : "none";
  }
  
  function handleFile(input) {
    const file = input.files[0];
    if (file) {
      console.log("Arquivo selecionado:", file.name);
      // Você pode exibir ou enviar o arquivo aqui
    }
  }
  
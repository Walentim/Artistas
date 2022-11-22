<!--
####################################################################################################################
########################################## CADASTRO ROCKXABA ARTISTAS ##############################################
####################################################################################################################
-->

<?php

include_once('sair.php');

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS do multi-seletor de gêneros-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

<body class="cadastro-artista">
    <div class="conteudo">
        <h3 class="texto-artista"> Crie e Compartilhe com o RockXaba<h3>
                <form class="cadastro-artista-form">
                    <div class="form-p1">
                        <p> Insira seu nome de Artista ou Banda </p>
                        <input type="text" class="input-cadastro-artista" id="nome-artista" required>
                        <p> Faça uma descrição (máx 500 caracteres) </p>
                        <input type="text" class="input-cadastro-artista" id="dsc-artista" maxlength="500" minlength="20" required>
                        <p> Conte em qual/quais gêneros você se encaixa musicalmente </p>
                        <select name="generos" id="generos" multiple>
                            <option value="1"> Rock </option>
                            <option value="2"> Indie</option>
                            <option value="3"> Metal </option>
                            <option value="4"> Samba </option>
                            <option value="5"> Bossa Nova </option>
                        </select>
                        <p> Escolha uma imagem de perfil (sua logo) </p>
                        <input type="file" class="input-imagem" id="input-logo-artista" required>
                        <p> Escolha até 5 fotos para sua página </p>
                        <label for="files"></label>
                        <input id="files" type="file" multiple="multiple" accept="image/jpeg, image/png, image/jpg" required>
                        <output id="result">
                    </div>
                    <div class="form-p2">
                        <p> Nome no Instagram (opcional) </p>
                        <input type="text" class="input-cadastro-artista" id="nome-insta-artista">
                        <p> Assista o gif tutorial e cole aqui seu link do Spotify ou YouTube </p>
                        <input type="text" class="input-cadastro-artista" id="link-spotify" required>
                        <img class="gif-tutorial" src="">
                        <p> Dê cor para o seu perfil </p>
                        <div class="card">
                            <ul class="lista-seletor-cores">
                                <li class="color-item" id="red"></li>
                                <li class="color-item" id="green"></li>
                                <li class="color-item" id="amber"></li>
                                <li class="color-item" id="blue"></li>
                                <li class="color-item" id="gray"></li>
                            </ul>
                        </div>
                        <p> Contato </p>
                        <input type="text" class="input-cadastro-artista" id="contato-artista" required>
                    </div>
                </form>
                <a href="?sair">Sair</a>
    </div>

    <!-- JavaScript do multi-seletor de gêneros-->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

    <script>
        //JavaScript do multi-seletor de gêneros musicais 

        new MultiSelectTag('generos') // id

        //JavaScript do seletor de cores

        window.addEventListener("load", () => {

            const colorItems = document.querySelectorAll('.color-item');
            colorItems.forEach(item => {
                item.addEventListener('click', function() {

                    //Variável que guarda o id da cor escolhida (que é o nome dela)
                    const idSelected = this.id;

                })
            })

        })

        //JavaScript do upload das 5 fotos

        document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
            if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
                const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
                const output = document.querySelector("#result");
                output.innerHTML = "";
                for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
                    if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
                    const picReader = new FileReader(); // RETRIEVE DATA URI 
                    picReader.addEventListener("load", function(event) { // LOAD EVENT FOR DISPLAYING PHOTOS
                        const picFile = event.target;
                        const div = document.createElement("div");
                        div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                        output.appendChild(div);
                    });
                    picReader.readAsDataURL(files[i]); //READ THE IMAGE
                }
            } else {
                alert("Your browser does not support File API");
            }
        });
    </script>

</body>

</head>
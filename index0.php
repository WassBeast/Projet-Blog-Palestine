<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="scriptindex0.js"></script>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\style0.css">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .button2 {
  position: absolute;
  top: 20px; 
  right: 20px; 
  background-color: RED;
  color: #fff;
  border: none;
  padding: 12px 24px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}
.button1 {

  background-color: RED;
  color: #fff;
  border: none;
  padding: 12px 24px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}
.button2:hover {
  background-color: GREEN;
}
.button1:hover {
  background-color: GREEN;
}
header{
    background-color: black;
}
body{
    background-color: black;
}

footer {
  background-image: url('img6.png');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  padding-top: 870px;

 
}

</style>
</head>
<body>
  <header>
    <h1>Choisissez la langue de BLOG</h1>
    <div class="language-selector">
      <label for="language-select">Langue:</label>
      <select id="language-select">
        <option value="fr">Français</option>
        <option value="en">Anglais</option>
      </select>
    </div>
    <main>
  <a href="sign in.php" class="button2">Se deconnecter</a>
</main>

  </header>
  <main>
    <button id="start-button" class="button1">Commencer</button>
  </main>
  <footer> </footer>
  <script>
    document.getElementById("start-button").addEventListener("click", function() {
      var language = document.getElementById("language-select").value;
      var url = "";
      if (language === "fr") {
        url = "index1fr.html";
      } else if (language === "en") {
        url = "index1ag.html";
      }
      window.location.href = url;
    });
  </script>
</body>
</html>

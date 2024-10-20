<?php

class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("La connexion a échoué : " . $this->conn->connect_error);
        }
    }

    public function executeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function fetchSingle($result) {
        return $result->fetch_assoc();
    }

    public function close() {
        $this->conn->close();
    }
}

$database = new Database("localhost", "root", "", "db1");

$email_error = "";

$email = $_POST['email'] ?? null;
$password1 = $_POST['password1'] ?? null;



if (isset($email)) {  
    
    $check_query = "SELECT * FROM table2 WHERE email = '$email'";
    $check_result = $database->executeQuery($check_query);

    if ($check_result->num_rows == 0) {
        
        $email_error = "Error: Email n'existe pas ";
    } else {
        
        $user_data = $database->fetchSingle($check_result);
        if ($user_data['password1'] != $password1) {
            
            $email_error = "Error: mot de passe incorrect.";
        } else {
            header("Location: index0.php");
            exit(); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: black; /* Couleur de fond noire */
    color: #fff; /* Couleur du texte clair */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 450px;
    margin: 150px auto;
    background-color: #222; /* Fond du conteneur sombre */
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="tel"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #777; /* Bordure légèrement plus claire */
    border-radius: 5px;
    background-color: #444; /* Fond des champs de saisie sombre */
    color: #fff; /* Texte clair */
}

button {
    padding: 10px;
    background-color: black;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

button:hover {
    background-color: red; /* Légère modification pour le hover */
}

p {
    text-align: center;
    color: red;
    
}
a{
  color: white;
}


  </style>
  <title>Sign In - CV Generator</title>
</head>
<body>
  <div class="container">
    <form action="" method="post">
      <h2>Sign In</h2>
      <?php if(!empty($email_error)) { echo "<p>$email_error</p>"; } ?>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="tel" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password1">Password</label>
        <input type="password" id="password1" name="password1" required>

        

      </div>
      <button type="submit">Sign In</button>
      <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
  </div>
</body>
</html>

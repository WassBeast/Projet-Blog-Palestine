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

if (isset($_POST['name']) && isset($_POST['comment'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO table3 (name, comment) VALUES ('$name', '$comment')";

    if ($database->executeQuery($sql) === TRUE) {
        echo "";
    } else {
        echo "Erreur : " . $sql . "<br>" . $database->conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Article de Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: #eee;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: red;
        }

        main {
            padding: 20px;
        }

        article {
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-size: 20px;
        }

        article img {
            width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }

        .comment-section {
            margin-top: 20px;
            text-align: left;
        }

        .comment-section h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: red;
        }

        .comment-section form {
            margin-bottom: 20px;
            text-align: left;
        }

        .comment-section form label {
            font-weight: bold;
            color: red;
            display: block;
        }

        .comment-section form input[type="text"],
        .comment-section form textarea {
            width: calc(100% - 40px);
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 10px;
            border: 1px solid #888;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #444;
            color: #eee;
        }

        .comment-section form input[type="submit"] {
            background-color: red;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-section form input[type="submit"]:hover {
            background-color: green;
        }

        .comments {
            border-top: 1px solid #888;
            padding-top: 10px;
        }

        .comment {
            background-color: #555353;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            text-align: left;
        }

        .comment p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="color: red;">To support Gaza, they raise the Palestinian flag at the highest point in Loire-Atlantique</h1>
    </header>
    <main>
        <article>
            <img src="pal2.avif" alt="Image de l'article">
            <h2 style="color: red;">In Fercé, the Palestinian flag is raised high!</h2>
            <p>
            Saturday morning, April 13, at the call of the AFPS44, there were 58 activists (and two gendarmes) to raise the Palestinian flag at the highest point (116m) in Loire-Atlantique, at a place called "La Bretèche" in the municipality of Fercé. The gendarmerie was there at the request of the mayor who had been contacted in the preceding days by an anonymous interlocutor (on behalf of a group) wondering why we were not also planting the Israeli flag! Speeches were made to remind people of the ongoing genocide situation and the atrocities committed by the military in Gaza, the famine caused as a weapon of war by Israel on the Gaza population, as well as the intensification of colonization in the West Bank and the daily abuses of settlers supported by the army. A very clear statement was made to clarify that we have nothing against Jews as Jews and that anti-Semitism is a racist poison that we denounce like all racisms. What we are fighting against is this ideology and policy of oppression, denial, humiliation, deportation, and murder of Palestinians. A call for an immediate and definitive ceasefire was renewed, as well as a demand for the cessation of all military activity with Israel and free land access for the delivery of humanitarian aid to Gaza. A picnic followed at another high place in the northern department: La Mine d'Abbaretz (122m), where once againwe raised the Palestinian flag in the presence of Deputy Jean-Claude Raux.
            </p>
        </article>
        <br>
        
        <div class="comment-section" id="comment-section">
            <h3>Discussion</h3>

            <article>
                <div id="comments">
                    <?php 
                        $sql = "SELECT name, comment FROM table3"; // Assuming your table name is table3
                        $result = $database->executeQuery($sql);
                        
                        // Check if there are any comments
                        if ($result->num_rows > 0) {
                            // Output each comment
                            while ($row = $database->fetchSingle($result)) {
                                $name = $row['name'];
                                $comment = $row['comment'];
                                echo "<div class='comment'>$name: $comment</div>";
                            }
                        } else {
                            // Output a message if there are no comments
                            echo "<div class='comment no-comments'>No comments yet.</div>";
                        }
                    ?>
                </div>
            </article>
            <br>
        
            <form id="commentForm" action="#comment-section" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="commentText">Comment:</label><br>
                <textarea id="commentText" name="comment" rows="4" cols="50" required></textarea><br>
                <input type="submit" value="Ajouter un commentaire">
            </form>
        </div>
    </main>
    <footer>
       <br>
    </footer>

    <?php
    // Close the database connection
    $database->close();
    ?>

</body>
</html>
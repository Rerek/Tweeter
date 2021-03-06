<?php
require_once ("./src/connectPHP.php");
if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");
if(isset($_GET['tweetId'])){
    $tweetId = $_GET['tweetId'];
}

$tweetToShow = Tweet::ShowTweet($tweetId);

if($tweetToShow !== false) {
    echo("<h2>{$tweetToShow->getText()}</h2>");
    echo("ID Tweeta: {$tweetToShow->getId()}<br>");
    echo("Autor: {$tweetToShow->getIdUsera()}<br>");
    echo("Data dodania: {$tweetToShow->getdataDodania()}<br>");
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $komentarz = Comment::Create($_SESSION['userID'], $tweetId, $_POST['trescKomentarza']);
}

$tweet = Tweet::getTweetById($_GET['tweetId']);

?>
<br>
<?php echo ("<form action = 'showTweet.php?tweetId={$tweet->getId()}' method='post'>"); ?>
    <label>
        Dodaj Komentarz:
        <br>
        <input type="text" name="trescKomentarza">
    </label>
    </br>
    <input type="submit">
</form>

<?php
$allComments = Comment::loadAllComments($tweet->getId());
echo ("<h2>Kmentarze:</h2>");
foreach($allComments as $commentToShow){
    echo("<hr>");
    echo("<h4> {$commentToShow->getText()}</h4>");
    echo("Dodany przez uzytkownika: {$commentToShow->getIdUsera()}<br>");
    echo("Data dodania: {$commentToShow->getCreationDate()}<br>");
}
?>
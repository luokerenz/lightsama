<?php 
    require_once 'init.php'; 
    require_once '../supplyment/dbAccess.php';
    require_once '../phpFlick/phpFlickr.php';
    unset($_SESSION['phpFlickr_auth_token']);
    $api_key                 = "9c7e15fd3e006075c3647c94ee891bd8";
    $api_secret              = "59cd2bc5e832fe79";
    $f = new phpFlickr($api_key, $api_secret);
    if(isset($_GET['albumID'])) {
        // verify current user
        $albumID = $_GET["albumID"];
        $query1 = "select u.id from ScrapeAlbum sa join LinkUser lu on sa.scrapeUserID=lu.scrapeUserID join users u on lu.usersID=u.id where sa.id=$albumID";
        $result1=$conn->query($query1);
        $row1 = mysqli_fetch_array($result1);
        $userIdCheck = $user->data()->id;
        if ($row1[id]==$userIdCheck){$pass = 1;}
        else{ $pass = 0;}
    }else{
        // head to temp page
        echo "<a href='account.php'>Please login to modify your album!</a>";
        $pass = 0;
    }
?>

<?php 
    $query2 = "select lu.authToken,sa.albumID from ScrapeAlbum sa join LinkUser lu on sa.scrapeUserID=lu.scrapeUserID where sa.id=$albumID";
    $result2=$conn->query($query2);
    $row2 = mysqli_fetch_array($result2);
    $f->setToken($row2[authToken]);
    $f->auth("write");
    $requestAlbum = $f->photosets_getInfo($row2[albumID]);
    //print_r($requestAlbum);
?>

<?php if($user->isLoggedIn() and $pass==1): ?>
    <style>
        #avaMod {
            max-width: 500px;
            margin: auto;
        }
    </style>
    <div id='avaMod'>
        <form>
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" value="<?= $requestAlbum[title][_content]?>" id="example-text-input">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input class="form-control" type="text" value="<?= $requestAlbum[description][_content]?>" id="example-text-input">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php else : ?>
    <a href='account.php'>Please login to modify your album!</a>
<?php endif; ?>
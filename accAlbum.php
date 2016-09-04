<?php
require_once 'users/init.php';
include("newNavBar.php");
include "supplyment/dbAccess.php";
if(isset($_GET['page'])) {
    // get page number for location of the album list
    $page = $_GET["page"];
}else{
    $page = 1;
}
if(isset($_GET['id'])) {
    // id index exists
    $displayID = $_GET["id"];
}else{
    // head to temp page
    header('Location: explore.php');
}
function pageCount($inputStr){
    $replace = 'select count(*) from ';
    $replace2 = ' ';
    $regex = '/select(.*)from/';
    $regex2 = '/limit(.*)/';
    $mid = preg_replace($regex, $replace, $inputStr);
    return preg_replace($regex2, $replace2, $mid);
}
?>
<?php
    //get user avatar
    $query11 = "select * from ScrapeUser where id=$displayID";
    $result11=$conn->query($query11);
    $row11 = mysqli_fetch_array($result11);
    if($row11[Ubelong]=='flickr'){
        $server = $row11[extraOne];
        $farm = $row11[extraTwo];
        $userr = $row11[userID];
        $gravMod = "https://c2.staticflickr.com/$farm/$server/buddyicons/".$userr.".jpg";
    }
?>
<customheader>
    <style>
        .card-img{
            width:100%;
            height:auto;
          }
    </style>
</customheader>
<div class="container">
    <div class="card-columns">
        <?php
            $off = $page*50-50;
            $query7 =  "select id,title,belong,coverphoto from ScrapeAlbum where scrapeUserID=$displayID order by id desc limit 50 offset $off";
            $Pageurl = "/accAlbum.php?id=$displayID&";
            $totalPage = pageCount($query7);
            //echo $totalPage;
            $Presult=$conn->query($totalPage);
            $Prow = $Presult->fetch_assoc();
            $totalPageNum = floor($Prow['count(*)']/50)+1;
            //echo $totalPageNum;
            $result7=$conn->query($query7);
            if ($result7->num_rows > 0) {
            // output data of each row
            while($row7 = $result7->fetch_assoc()) {
                echo "<div class=\"card\">";
                echo "<img class=\"card-img\" src=\"".$row7[coverphoto]."\" alt=\"Card image\">";
                echo "<div class=\"card-img-overlay\">";
                echo "<h4 class=\"card-title\">".$row7[title]."</h4>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>

<?php mysqli_close($conn); ?>
<?php require_once 'footer.php'; ?>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: indro
 * Date: 26.01.2018
 * Time: 11:28
 */

require 'template.html';
require 'conn.php';
?>



<div id="main">
    <h1>Overwatch API</h1>
    <div class="form-group">
        <input class="form-control tag-input" placeholder="deathwish-22634" name="battletag" value="">
        <input class="btn btn-send" type="submit" value="Search" style="margin-top: -4px;">
    </div>
</div>

<div class="container" style="margin-top:20px;">
    <h2>How to use?</h2>
    <p>Enter your <a href="https://www.blizzard.com/en-us/">Battle.net</a> Overwatch battletag into input above and
        press "Search".</p>
    <h4>List of added battletags:</h4>
    <ul class="list-group">
        <?php
        $sql = "SELECT * FROM battletag";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item"><a href="profile.php?battletag='.$row["battle_tag"].'">' . $row["battle_tag"]. '</a></li>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </ul>
</div>

</body>
</html>


<script>
    $(document).ready(function () {

        $('.btn-send').click(function () {

            var battletag = $(".tag-input").val();

            if (battletag == '') {
                swal("Error", "Please enter battletag.", "error");
            }

            else {
                $(".btn-send").attr("disabled", "disabled");

                $.ajax({
                    type: 'POST',
                    url: 'owapi.php',
                    data: {battletag: battletag},
                    success: function (data) {
                        if (data == 'Ok') {
                            console.log(data);
                            window.location = '<?=  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>profile.php?battletag=' + battletag;
                        } else {
                            console.log(data);
                            $(".btn-send").removeAttr("disabled");
                            swal("Error", "Given battletag not found on API.", "error");
                        }
                    }
                });

            }


        });
    });
</script>
<?php include $_SERVER["DOCUMENT_ROOT"]."/volleyball/back/inc/connect.php"; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/volleyball/css/reset.css">
    <link rel="stylesheet" href="/volleyball/css/calendar.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(function(){
            $("#header").load("/volleyball/common/header.php");
            $("#footer").load("/volleyball/common/footer.html");
            $("#page-main").load("/volleyball/common/page-main.html");
            $('.menu_box').click(function(){
                $(this).find(".not_selected").slideToggle();
            })
        });
    </script>
</head>
<body>
    <header id="header" class="header"></header>
    <main class="main" id="main" onmouseover="menuOut()">
        <div id="page-main"></div>
        <div class="title">
            <h2>GAME</h2>
        </div>
        <div class="menu_tab_square">
            <div class="menu_tab_box">
                <section class="menu_tab">
                    <div class='box_blank'></div>
                    <h3><a href="/volleyball/index.php">첫화면</a></h3>
                    <ul class="menu_box" id="box1">
                        <li>NEWS</li>
                        <div class="not_selected">
                            <li><a href="/volleyball/pages/club/history.html">CLUB</a></li>
                            <li><a href="/volleyball/pages/team/player.html">TEAM</a></li>
                            <li><a href="/volleyball/pages/game/calendar.php">GAME</a></li>
                            <li><a href="/volleyball/pages/news/news.php">NEWS</a></li>
                            <li><a href="/volleyball/pages/fan/qna.php">FAN</a></li>
                        </div>
                    </ul>
                    <ul class="menu_box" id="box2">
                        <li>FAN</li>
                        <div class="not_selected">
                            <li><a href="/volleyball/pages/news/news.php">뉴스</a></li>
                            <li><a href="/volleyball/pages/news/noticement.html">공지사항</a></li>
                        </div>
                    </ul>
                </section>
            </div>
        </div>

        <div class="query">
            <h3>일정 및 결과</h3>
        </div>
        <div class="table_box">
            <table>
                <tr>
                    <th class='table_header' id='header1'>날짜</th>
                    <th class='table_header' id='header2'>시간</th>
                    <th class='table_header' id='header3'>경기</th>
                    <th class='table_header' id='header4'>장소</th>
                    <th class='table_header' id='header5'>라운드</th>
                </tr>

                <?php
                $sql = "SELECT * FROM schedule;";
                $result = mysqli_query($dbcon, $sql);
                while($array = mysqli_fetch_array($result)){
                    if($array["home_score"] !== NULL){
                        $game_result = $array["home_score"]." : ".$array["away_score"];
                    } else {
                        $game_result = " vs ";
                    };
                ?>
                <tr>
                    <td><?php echo substr($array["game_date"],0,10);?></td>
                    <td><?php echo substr($array["game_date"],11,5);?></td>
                    <td><?php echo $array["home_team"].$game_result.$array["away_team"];?></td>
                    <td><?php echo $array["stadium"];?></td>
                    <td><?php echo $array["round"]."라운드"?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </main>
    <footer id="footer" class="footer"></footer>
</body>
</html>
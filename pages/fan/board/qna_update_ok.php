<?php

include $_SERVER["DOCUMENT_ROOT"]."/volleyball/back/inc/connect.php";

$idx = $_POST['article_idx'];
$title = $_POST['qna_title'];
$content = $_POST['qna_content'];
$content = str_replace("'","\'",$content);
$content = str_replace('"','\"',$content);

$sql = "UPDATE board SET title='$title', content='$content' WHERE idx = $idx;";

mysqli_query($dbcon, $sql);

mysqli_close($dbcon);

echo "<script>
    alert('글이 수정되었습니다');
    location.href='article.php?idx=$idx';
</script>";
?>
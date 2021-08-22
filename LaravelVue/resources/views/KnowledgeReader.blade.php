<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>溫室設計知識專家系統</title>
    <!-- 字體設定的外部連結 -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap 的 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- 自己 的 CSS -->
    <link rel="stylesheet" href="/css/KnowledgeEditor/KnowledgeEditor.css"/>
    <link rel="stylesheet" href="/css/settopandbottom.css"/>

</head>
<body style="background-color: #FFEFD5;">
    <!-- Bootstrap 的 JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- jQuery 的 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <div class = 'container-fluid'>   <!-- container 會預設的寬跟高 -->
        <div class = "col-md-12" >
            <br><br>
            <!-- 知識文章查看 -->

            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h1>{!!$reader->name!!}</h1>

                </div>
                <div class="p-2 bd-highlight">
                    <h6>
                        編輯者：{!!$reader->editor!!}
                    </h6>
                    <h6>
                        最後修改日：{!!$reader->created_at!!}
                    </h6>
                </div>
                <div class="p-2 bd-highlight">

                </div>
            </div>
            <hr>

            <h5>
                {!!$reader->content!!}
            </h5>

        </div>
    </div>

</body>
</html>

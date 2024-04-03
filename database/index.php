<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <scrip src="js/main.js" defer></scrip>
</head>
<body>
<?php
if (isset($_GET['success'])):
?>
    <dialog id="modify-modal">
        <p><a href="#" class="close-modal">Close</a></p>
        <p><?php  ?></p>
    </dialog>

<?php
endif;
?>
<form action="insertData.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description"></textarea>
    </div>
    <div>
        <label for="file">File</label>
        <input type="file" name="file" id="file">
    </div>
    <div>
        <input type="submit" value="Save">
    </div>
    
</form>

<section>
    <table>
        <thead>
            <tr>
                <th>media_id</th>
                <th>user_id</th>
                <th>filename</th>
                <th>filesize</th>
                <th>media_type</th>
                <th>title</th>
                <th>description</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            <?php require_once 'selectData.php'; ?>
        </>
    </table>
</section>
<dialog id="modify-modal">
    <p><a href="#" class="close-modal">Close</a></p>
    <div id="modify-content"></div>
</dialog>
</body>
</html>

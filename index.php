<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>

<?php include('components/aside.php') ?>

<?php
//აქ მას მქონდა პრობლემა დატაბასაზსტან და მაგიტო ჩავაკომენტალე ლაინ 15.
$news = [];
// SELECT Query
$sql = "SELECT news.id as news_id, news.title as news_title, news.text, news.category_id, categories.id as cat_id, categories.title as category_title
          FROM news
    LEFT JOIN categories ON news.category_id = categories.id";
$result = mysqli_query($conn, $sql);
//$news = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

    <main>
        <div class="container-header">
            <h2>News</h2>
            <a href="form.php" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($news as $value): ?>
                    <tr>
                        <td><?= $value['news_id'] ?></td>
                        <td><?= $value['news_title'] ?></td>
                        <td><?= $value['category_title'] ?></td>
                        <td class="actions">
                            <a class="edit" href="edit.php?id=<?= $value['news_id'] ?>">Edit</a>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $value['news_id'] ?>">
                                <button class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>

<?php include('components/footer.php') ?>
<div class="container">
    <div class="row">
        <a class="btn btn-success" id="btn-shares" href="<?php echo ROOT_PATH; ?>/shares/add">Add shares</a>
        <?php foreach($viewmodel as $item ): ?>
        <div class="well">
            <?php echo $item['title']; ?>
            <hr>
            <small> <?php echo $item['create_date']; ?> </small>
            <br>
            <p>
                <?php echo $item['body'];?>
            </p>
            <br>
            <a class="btn btn-default" href="<?php echo $item['link']?>" target="_blank">Go the website</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
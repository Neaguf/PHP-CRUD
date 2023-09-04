<div class="card">


    <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <?php if (isset($editMode) && $editMode) : ?>
            <!-- Edit mode: Show input fields for title and image URL -->
            <form method="post" action="<?php echo base_url('services/save_changes'); ?>">
                <input type="text" name="editedTitle" class="form-control" value="<?php echo $title; ?>">
                <input type="text" name="editedImageUrl" class="form-control" value="<?php echo $imageUrl; ?>">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        <?php else : ?>
            <!-- View mode: Display card title and image -->
            <h5 class="card-title"><?php echo $title; ?></h5>
            <img src="<?php echo $imageUrl; ?>" class="img-fluid" alt="Wild Landscape" style="width:800px;height:800px" />
        <?php endif; ?>



        <?php if (isset($admin) && $admin == '1') : ?>
            <div class='button'>
                <?php if ($editMode) : ?>
                    <!-- Hide the "Edit" button -->

                <?php else : ?>
                    <!-- Show the "Edit" button -->
                    <a href="<?php echo base_url('index.php/services/edit'); ?>" class="btn btn-success">Edit</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
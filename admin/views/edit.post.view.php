<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h5><?php echo _EDITITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

               <input type="hidden" value="<?php echo $post['post_id']; ?>" name="post_id">

               <div class="form-row">
                <div class="form-group col-md-9">
                  <div class="block col-md-12">

                    <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
                    <input type="text" value="<?php echo $post['post_title']; ?>" name="post_title" class="form-control" required="">

                    <label><?php echo _TABLEFIELDSLUG; ?></label>
                    <input type="hidden" value="<?php echo $post['post_slug']; ?>" name="post_slug_save">
                    <input type="text" placeholder="<?php echo $post['post_slug']; ?>" name="post_slug" class="form-control">
                    
                    <label><?php echo _TABLEFIELDCONTENT; ?></label>
                    <textarea type="text" class="advancedtinymce form-control" name="post_content"><?php echo $post['post_content']; ?></textarea>
                    <br>

                    <fieldset>
                      <legend><?php echo _SEO; ?></legend>

                      <label class="no-margin-top"><?php echo _SEOTITLE; ?></label>
                      <input type="text" value="<?php echo $post['post_seotitle']; ?>" name="post_seotitle" class="form-control">


                      <label><?php echo _SEODESCRIPTION; ?></label>
                      <textarea type="text" class="form-control" name="post_seodescription"><?php echo $post['post_seodescription']; ?></textarea>

                    </fieldset>

                  </div>
                </div>

                <div class="form-group col-md-3 sidebar">

         <div class="block col-md-12">
           <label class="required"><?php echo _TABLEFIELDSTATUS; ?></label>
           <select class="custom-select form-control" name="post_status" required="">
          <?php
          if($post['post_status'] == 1){
            echo '<option value="1" selected="selected">'._ENABLED.'</option>';
            echo '<option value="0">'._DISABLED.'</option>';
          } else{
            echo '<option value="0" selected="selected">'._DISABLED.'</option>';
            echo '<option value="1">'._ENABLED.'</option>';
          }
          ?>
          </select>
        </div>

        <div class="block col-md-12">
            <label><?php echo _TABLEFIELDIMAGE; ?></label>
            <div class="new-image" id="image-preview">
                <?php if($post['post_image']): ?>
                    <img src="../../images/<?php echo $post['post_image']; ?>" style="width: 100%; height: auto; margin-bottom: 10px;">
                <?php endif; ?>
            </div>
            <input type="hidden" value="<?php echo $post['post_image']; ?>" name="post_image_save">
            <input type="file" name="post_image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary" type="submit" name="save"><?php echo _UPDATEITEM; ?></button>
        <button class="btn btn-danger deleteItem" type="button" data-url="../controller/delete_post.php?id=<?php echo $post['post_id']; ?>" data-redirect="../controller/posts.php"><?php echo _DELETEITEM; ?></button>

    </div>
  </div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

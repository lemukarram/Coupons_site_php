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
              <h5><?php echo _ADDITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

               <div class="form-row">
                <div class="form-group col-md-9">
                  <div class="block col-md-12">

                    <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
                    <input type="text" name="post_title" class="form-control" required="">

                    <label><?php echo _TABLEFIELDSLUG; ?></label>
                    <input type="text" name="post_slug" class="form-control">
                    
                    <label><?php echo _TABLEFIELDCONTENT; ?></label>
                    <textarea type="text" class="advancedtinymce form-control" name="post_content"></textarea>
                    <br>

                    <fieldset>
                      <legend><?php echo _SEO; ?></legend>

                      <label class="no-margin-top"><?php echo _SEOTITLE; ?></label>
                      <input type="text" name="post_seotitle" class="form-control">


                      <label><?php echo _SEODESCRIPTION; ?></label>
                      <textarea type="text" class="form-control" name="post_seodescription"></textarea>

                    </fieldset>

                  </div>
                </div>

                <div class="form-group col-md-3 sidebar">

         <div class="block col-md-12">
           <label class="required"><?php echo _TABLEFIELDSTATUS; ?></label>
           <select class="custom-select form-control" name="post_status" required="">
            <option value="1"><?php echo _ENABLED; ?></option>
            <option value="0"><?php echo _DISABLED; ?></option>
          </select>
        </div>

        <div class="block col-md-12">
            <label><?php echo _TABLEFIELDIMAGE; ?></label>
            <input type="file" name="post_image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary" type="submit" name="save"><?php echo _SAVEITEM; ?></button>

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

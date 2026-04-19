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


                <div class="form-row">
                  <div class="form-group col-md-9">
                    <div class="block col-md-12 padding-bottom-35">

                      <input type="hidden" value="<?php echo $menu['menu_id']; ?>" name="menu_id">

                      <label><?php echo _TABLEFIELDTITLE; ?></label>

                      <input type="text" value="<?php echo $menu['menu_name']; ?>" name="menu_name" class="form-control" required="">

                      <br>

                      <label class="control-label"><?php echo _TABLEFIELDLOCATION; ?></label>
                      <fieldset>

                        <table>
                         <tr>
                           <td>
                            <div class="pretty p-default p-curve p-bigger">
                              <?php if ($menu['menu_header'] == 1) {
                                echo '<input type="checkbox" name="menu_header" value="1" checked />';
                              }else{
                                echo '<input type="checkbox" name="menu_header" value="1" />';
                              } ?>
                              <div class="state p-success">
                                <label><?php echo _TABLEFIELDHEADER; ?></label>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pretty p-default p-curve p-bigger">
                              <?php if ($menu['menu_footer'] == 1) {
                                echo '<input type="checkbox" name="menu_footer" value="1" checked />';
                              }else{
                                echo '<input type="checkbox" name="menu_footer" value="1" />';
                              } ?>
                              <div class="state p-success">
                                <label><?php echo _TABLEFIELDFOOTER; ?></label>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pretty p-default p-curve p-bigger">
                              <?php if ($menu['menu_sidebar'] == 1) {
                                echo '<input type="checkbox" name="menu_sidebar" value="1" checked />';
                              }else{
                                echo '<input type="checkbox" name="menu_sidebar" value="1" />';
                              } ?>
                              <div class="state p-success">
                                <label><?php echo _TABLEFIELDSIDEBAR; ?></label>
                              </div>
                            </div>
                          </td>

                        </tr>
                      </table>
                    </fieldset>

                    <label class="control-label"><?php echo _NAVIGATION; ?></label>

                    <fieldset>

                      <ul class="listas sortable ui-sortable">
                        <?php foreach($navigations as $nav){
                          $parentLabel = "";
                          if (!empty($nav['navigation_parent'])) {
                              foreach($navigations as $pnav) {
                                  if ($pnav['navigation_id'] == $nav['navigation_parent']) {
                                      $parentLabel = ' <span class="badge badge-secondary" style="font-size:10px; font-weight:normal; vertical-align:middle;">Sub of: ' . $pnav['navigation_label'] . '</span>';
                                      break;
                                  }
                              }
                          echo '<li class="ui-sortable-handle" id="item-'.$nav['navigation_id'].'"> <span style="font-weight:bold;font-size: 14px;">' . $nav['navigation_label'] . '</span>' . $parentLabel . ' · <span style="font-size:12px">' . $nav['navigation_url'] . '</span>
                          <a class="delete-nav" href="../controller/delete_nav.php?id=' . $nav["navigation_id"] . '"><i class="fa fa-trash"></i> '._DELETEITEM.'</a>
                          <a class="edit-nav" href="#" data-id="' . $nav["navigation_id"] . '" style="float:right; margin-right:10px;"><i class="fa fa-edit"></i> '._EDITITEM.'</a>
                          </li>';
                          }
                          ?>

                          </ul>
                          ...
                          <?php require 'new.nav-page.view.php'; ?>

                          <div id="edit_nav_modal" class="modal fade">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                          <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><?php echo _EDITITEM; ?></h4>
                          </div>
                          <div class="modal-body">
                          <form enctype="multipart/form-data" method="post" id="updateNavigation">
                          <div class="form-group">
                          <input type="hidden" name="navigation_id" id="edit_navigation_id" />

                          <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
                          <input type="text" name="navigation_label" id="edit_navigation_label" class="form-control" required="" />

                          <br />

                          <div id="url_container">
                          <label class="required"><?php echo _HREFURL; ?></label>
                          <input type="text" name="navigation_url" id="edit_navigation_url" class="form-control" />
                          </div>

                          <div id="page_container" style="display:none;">
                          <label class="control-label required"><?php echo _PAGES; ?></label>
                          <select class="custom-select form-control" name="navigation_page" id="edit_navigation_page">
                          <?php foreach($pages as $page){
                          echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
                          } ?>
                          </select>
                          </div>

                          <br />
                          <label class="control-label"><?php echo _HREFTARGET; ?></label>
                          <select class="custom-select form-control" name="navigation_target" id="edit_navigation_target">
                          <option value="_self">Self</option>
                          <option value="_blank">Blank</option>
                          <option value="_top">Top</option>
                          </select>
                          <br>

                          <label class="control-label">Parent Navigation</label>
                          <select class="custom-select form-control" name="navigation_parent" id="edit_navigation_parent">
                          <option value="">None</option>
                          <?php foreach($navigations as $nav){ ?>
                          <option value="<?php echo $nav['navigation_id']; ?>"><?php echo $nav['navigation_label']; ?></option>
                          <?php } ?>
                          </select>
                          <br>

                          <label>Icon Class (Font Awesome)</label>
                          <input type="text" name="navigation_icon_class" id="edit_navigation_icon_class" class="form-control" placeholder="e.g. ti ti-home" />
                          <br>

                          <label>Icon Image</label>
                          <input type="file" name="navigation_icon_image" class="form-control" accept="image/*" />
                          <br>

                          <input type="submit" name="save" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" />
                          </div>
                          </form>
                          </div>
                          </div>
                          </div>
                          </div>
                        <table>
                          <tr>
                            <td><button class="save btn btn-embossed btn-primary" data-id="<?php echo $menu['menu_id']; ?>"><?php echo _SAVECHANGES; ?></button></td>
                            <td><div id="response" class="response"></div></td>
                          </tr>
                        </table>
                      <?php }else{ ?>
                        <p class="nomenuitems"><?php echo _NOITEMSFOUND; ?></p>
                      <?php } ?>
                    </fieldset>

                    <br>

                    <button type="button" data-toggle="modal" data-target="#add_page" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> <?php echo _ADDPAGE; ?></button>

                    <button type="button" data-toggle="modal" data-target="#add_link" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> <?php echo _ADDCUSTOMLINK; ?></button>



                  </div>

                </div>

                <div class="form-group col-md-3 sidebar">

                  <div class="block col-md-12">
                   <label><?php echo _TABLEFIELDSTATUS; ?></label>

                   <select class="custom-select form-control" name="menu_status" required="">

                    <?php
                    if($menu['menu_status'] == 1){
                      echo '<option value="1" selected="selected">'._ENABLED.'</option>';
                      echo '<option value="0">'._DISABLED.'</option>';

                    } else{
                      echo '<option value="0" selected="selected">'._DISABLED.'</option>';
                      echo '<option value="1">'._ENABLED.'</option>';
                    }
                    ?>

                  </select>

                </div>

                <button class="btn btn-primary" type="submit" name="save"><?php echo _UPDATEITEM; ?></button>
                <button class="btn btn-danger deleteItem" type="button" data-url="../controller/delete_menu.php?id=<?php echo $menu['menu_id']; ?>" data-redirect="../controller/menus.php"><?php echo _DELETEITEM; ?></button>

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

<?php require 'new.nav-link.view.php'; ?>

<?php require 'new.nav-page.view.php'; ?>



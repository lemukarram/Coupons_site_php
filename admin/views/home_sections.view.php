<div class="container-fluid side-padding">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Home Page Sections Management</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h5><i class="icon fa fa-info"></i> Tag Instructions!</h5>
                        You can use the following tags in text areas:
                        <ul>
                            <li><b>[h2]Header 2[/h2]</b> - Level 2 heading</li>
                            <li><b>[h3]Header 3[/h3]</b> - Level 3 heading</li>
                            <li><b>[b]Bold Text[/b]</b> - Bold text</li>
                            <li><b>[i]Italic Text[/i]</b> - Italic text</li>
                            <li><b>[list][item]List Item 1[/item][item]List Item 2[/item][/list]</b> - Bullet list</li>
                        </ul>
                    </div>

                    <?php if(isset($_GET['success'])): ?>
                        <div class="alert alert-success">Settings updated successfully!</div>
                    <?php endif; ?>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="card card-dark mt-4">
                            <div class="card-header"><h4 class="card-title">Sections Order & Visibility</h4></div>
                            <div class="card-body">
                                <p class="text-muted">Set the order and visibility for all homepage sections. Lower numbers appear first.</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Section Name</th>
                                                <th width="150">Order</th>
                                                <th width="150">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($sections as $name => $section): ?>
                                            <tr>
                                                <td>
                                                    <b><?php echo echoOutput($section['section_title']); ?></b><br>
                                                    <small class="text-muted"><?php echo $name; ?></small>
                                                    <input type="hidden" name="sections[<?php echo $name; ?>][title]" value="<?php echo echoOutput($section['section_title']); ?>">
                                                </td>
                                                <td>
                                                    <input type="number" name="sections[<?php echo $name; ?>][order]" class="form-control" value="<?php echo (int)$section['section_order']; ?>">
                                                </td>
                                                <td>
                                                    <select name="sections[<?php echo $name; ?>][status]" class="form-control">
                                                        <option value="1" <?php echo $section['section_status'] == 1 ? 'selected' : ''; ?>>Enabled</option>
                                                        <option value="0" <?php echo $section['section_status'] == 0 ? 'selected' : ''; ?>>Disabled</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        <h3>Custom Content Settings</h3>

                        <!-- Section: Long Text -->
                        <?php if(isset($sections['long_text'])): $s = $sections['long_text']; ?>
                        <div class="card card-default mt-4">
                            <div class="card-header"><h4 class="card-title">Long Text with Image</h4></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Section Title</label>
                                    <input type="text" name="sections[long_text][title]" class="form-control" value="<?php echo echoOutput($s['section_title']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Text Left (70%)</label>
                                    <textarea name="sections[long_text][description]" class="form-control" rows="5"><?php echo echoOutput($s['section_description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image Right (30%)</label>
                                    <input type="file" name="section_image_long_text" class="form-control">
                                    <?php if($s['section_image']): ?>
                                        <img src="../../images/<?php echo $s['section_image']; ?>" width="100" class="mt-2">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Text Under Image (100%)</label>
                                    <textarea name="sections[long_text][content]" class="form-control" rows="5"><?php echo echoOutput($s['section_content']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Section: About Us -->
                        <?php if(isset($sections['about_us'])): $s = $sections['about_us']; ?>
                        <div class="card card-default mt-4">
                            <div class="card-header"><h4 class="card-title">About Us (50/50)</h4></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Section Title</label>
                                    <input type="text" name="sections[about_us][title]" class="form-control" value="<?php echo echoOutput($s['section_title']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>About Text</label>
                                    <textarea name="sections[about_us][description]" class="form-control" rows="5"><?php echo echoOutput($s['section_description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Section Graphics/Image</label>
                                    <input type="file" name="section_image_about_us" class="form-control">
                                    <?php if($s['section_image']): ?>
                                        <img src="../../images/<?php echo $s['section_image']; ?>" width="100" class="mt-2">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Section: How to use Coupons -->
                        <?php if(isset($sections['how_to_use'])): $s = $sections['how_to_use']; ?>
                        <div class="card card-default mt-4">
                            <div class="card-header"><h4 class="card-title">How to use Coupons</h4></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Section Title</label>
                                    <input type="text" name="sections[how_to_use][title]" class="form-control" value="<?php echo echoOutput($s['section_title']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Section Description</label>
                                    <input type="text" name="sections[how_to_use][description]" class="form-control" value="<?php echo echoOutput($s['section_description']); ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Step 1</h5>
                                        <input type="text" name="sections[how_to_use][step1_title]" class="form-control mb-2" placeholder="Title" value="<?php echo echoOutput($s['step1_title']); ?>">
                                        <input type="text" name="sections[how_to_use][step1_icon]" class="form-control" placeholder="Icon name (Tabler Icons)" value="<?php echo echoOutput($s['step1_icon']); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Step 2</h5>
                                        <input type="text" name="sections[how_to_use][step2_title]" class="form-control mb-2" placeholder="Title" value="<?php echo echoOutput($s['step2_title']); ?>">
                                        <input type="text" name="sections[how_to_use][step2_icon]" class="form-control" placeholder="Icon name (Tabler Icons)" value="<?php echo echoOutput($s['step2_icon']); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Step 3</h5>
                                        <input type="text" name="sections[how_to_use][step3_title]" class="form-control mb-2" placeholder="Title" value="<?php echo echoOutput($s['step3_title']); ?>">
                                        <input type="text" name="sections[how_to_use][step3_icon]" class="form-control" placeholder="Icon name (Tabler Icons)" value="<?php echo echoOutput($s['step3_icon']); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Section: Subscription -->
                        <?php if(isset($sections['subscribe'])): $s = $sections['subscribe']; ?>
                        <div class="card card-default mt-4">
                            <div class="card-header"><h4 class="card-title">Subscription (Dark Mode)</h4></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Section Title</label>
                                    <input type="text" name="sections[subscribe][title]" class="form-control" value="<?php echo echoOutput($s['section_title']); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Section Description</label>
                                    <textarea name="sections[subscribe][description]" class="form-control" rows="2"><?php echo echoOutput($s['section_description']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Background Image</label>
                                    <input type="file" name="section_image_subscribe" class="form-control">
                                    <?php if($s['section_image']): ?>
                                        <img src="../../images/<?php echo $s['section_image']; ?>" width="100" class="mt-2">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Footer Customization -->
                        <div class="card card-default mt-4">
                            <div class="card-header"><h4 class="card-title">Footer Titles & About</h4></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Column 1: About Title</label>
                                            <input type="text" name="sections[footer_about][title]" class="form-control" value="<?php echo echoOutput($sections['footer_about']['section_title']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Column 1: About Description</label>
                                            <textarea name="sections[footer_about][description]" class="form-control" rows="3"><?php echo echoOutput($sections['footer_about']['section_description']); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Column 2: Service Title</label>
                                            <input type="text" name="sections[footer_service_title][title]" class="form-control" value="<?php echo echoOutput($sections['footer_service_title']['section_title']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Column 3: Like Us On Title</label>
                                            <input type="text" name="sections[footer_like_us_title][title]" class="form-control" value="<?php echo echoOutput($sections['footer_like_us_title']['section_title']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Column 4: Pursue Title</label>
                                            <input type="text" name="sections[footer_pursue_title][title]" class="form-control" value="<?php echo echoOutput($sections['footer_pursue_title']['section_title']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save Changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

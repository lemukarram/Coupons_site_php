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
                        <h4><?php echo _SECTIONES; ?></h4>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block counter-block mb-4">
                        <div class="value"><?php echo $coupons_total; ?></div>
                        <i class="dripicons-broadcast i-icon"></i>
                        <p class="label"><?php echo _COUPONS; ?></p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block counter-block mb-4">
                        <div class="value"><?php echo $users_total; ?></div>
                        <i class="dripicons-user-group i-icon"></i>
                        <p class="label"><?php echo _USERS; ?></p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="section-title">
                        <h4><?php echo _SUMMARY; ?></h4>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="block table-block mb-4">
                        <div class="block-heading d-flex align-items-center">
                            <h5 class="text-truncate"><?php echo _COUPONS; ?></h5>
                            <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/coupons.php"><?php echo _VIEWALL; ?> <i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                            <div class="table-responsive text-no-wrap">
                                <table class="table">
                                    <tbody class="text-middle">
                                        <?php foreach($coupons as $item): ?>
                                            <tr>
                                                <td class="product" width="50px">
                                                <?php if(!empty($item['coupon_image'])): ?>
                                                <img class="product-img product-img-w" src="../../images/<?php echo $item['coupon_image']; ?>">
                                                <?php endif; ?>
                                                <?php if(empty($item['coupon_image'])): ?>
                                                <img class="product-img product-img-w" src="../assets/images/no-image.png">
                                                <?php endif; ?>

                                                </td>
                                                <td class="name"><span class="span-title"><a class="btn-link" href="../controller/edit_coupon.php?id=<?php echo echoOutput($item['coupon_id']) ?>"><?php echo echoOutput($item['coupon_title']); ?></a></span></td>
                                                <td align="right" class="text-muted"><?php echo FormatDate($connect, $item['coupon_created']); ?></td> 
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div> 


                </div>
            </div>
        </div>
    </div>
</section>
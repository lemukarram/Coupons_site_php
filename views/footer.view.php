<script src="<?php echo $urlPath->assets_js('jquery.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit-icons.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('nice-select.min.js'); ?>"></script>
<?php if (isset($needsDatatables) && $needsDatatables): ?>
<script src="<?php echo $urlPath->assets_js('datatables.min.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('datatables.uikit.min.js'); ?>"></script>
<?php endif; ?>
<script src="<?php echo $urlPath->assets_js('rating.min.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('jquery.upload.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('clipboard.min.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('cookieconsent.min.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('main.js'); ?>"></script>

<?php require './views/cookieconsent.view.php'; ?>

</body>
</html>
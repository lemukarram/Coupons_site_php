<script>
window.cookieconsent.initialise({
  "theme": "classic",
  "content": {
    "message": "<?php echo echoOutput($translation['tr_201']); ?>",
    "dismiss": "<?php echo echoOutput($translation['tr_203']); ?>",
    "link": "<?php echo echoOutput($translation['tr_202']); ?>",
    "href": '<?php echo $urlPath->terms(); ?>'
  }
});
</script>
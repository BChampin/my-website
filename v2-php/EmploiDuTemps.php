<?php include('includes/env.php'); ?>
<?php
  if (!(isset($page)))
  {
    $page=0;
  }

  $variable = date('Ymd',time()-((time()-1511748000)%604800)+604800*$page);
  echo '<frameset rows=100%,0" frameborder="no" border="0">
  <frame name="ORT" src="'.$ENV['EDT_URL'].$variable.'.pdf">
  </frame></frameset>';
?>

<?php

add_action("wp_body_open", "gregbastianelli_redirect_to_frontend", 1);

function gregbastianelli_redirect_to_frontend()
{
  ?>
    <script>
    window.location.replace("https://www.gregbastianelli.com");
    </script>
  <?php
}

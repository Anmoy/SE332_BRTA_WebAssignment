<?php 
    session_start();
    session_unset();
    session_destroy();
?>
<script>
    window.location.href = "Login.html";
</script>    
<?php
exit();
?>
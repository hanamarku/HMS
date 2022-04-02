<?php
function component($EMËR_D,$MBIEMËR_D,$EMAIL_D,$MOSHA_D,$SPECIALIZIMI,$DEP_ID)
{
    $element = "
    <div class=\"box\">
    <img src=\"image/1.jpeg\" >
    <h3><?php echo[EMËR_D] ?></h3>
    <span>Specializimi: $SPECIALIZIMI</span> <br>

    <div class=\"share\">
    <span>Departamenti: $DEP_ID</span>
    </div>
</div>
    ";
    echo $element;
}
?>
<?php

echo "<div class='dashboard-item'>";
echo "<dl>";
echo $view->header()->setAttribute('template',$T('res_title'));
echo "<dt>".$T('res_label')."</dt><dd>"; echo $view->textLabel('res'); echo "</dd>";
echo "</dl>";
echo "</div>";

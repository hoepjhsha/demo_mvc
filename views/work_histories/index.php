<?php
echo '<ul>';
foreach ($work_histories as $item) {
    echo '<li>
    <a href="index.php?controller=work-histories&action=show&id=' . $item->id . '">' . $item->title . '</a>
  </li>';
}
echo '</ul>';
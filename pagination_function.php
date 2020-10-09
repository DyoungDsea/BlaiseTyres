<?php

    function pagination($link, $row, $pn, $totalPages){?>

<?php
        if (($row > 1) && ($pn > 3)) {
            ?>
            <li class="page-item ">
                <a class="page-link page-link--with-arrow" href="<?php echo $link;?>page=<?php echo (($pn-1));?>" title="Previous Page" aria-label="Previous">
                    <span class="page-link__arrow page-link__arrow--left" aria-hidden="true">
                        <svg width="7" height="11">
                            <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                        </svg>
                    </span>
                </a>
            </li>            
            <?php }?>

        <?php
        if (($pn - 1) > 1) {
            ?>
            <li class="page-item">
                <a class="page-link" href='<?php echo $link;?>page=1'>1</a>
            </li>

            <li class="page-item page-item--dots">
                <div class="pagination__dots"></div>
            </li>
        <?php
        }

        for ($i = ($pn - 1); $i <= ($pn + 3); $i ++) {
            if ($i < 1)
                continue;
            if ($i > $totalPages)
                break;
            if ($i == $pn) {
                $class = "active";
            } else {
                $class = "";
            }
            ?>
            <li class="page-item <?php echo $class; ?>">
                <a class="page-link" href='<?php echo $link;?>page=<?php echo $i; ?>'><?php echo $i; ?></a>
            </li>

            <?php
        }

        if (($totalPages - ($pn + 3)) >= 1) {
            ?>
            <li class="page-item page-item--dots">
                <div class="pagination__dots"></div>
            </li>
        <?php
        }
        if (($totalPages - ($pn + 3)) > 0) {
            if ($pn == $totalPages) {
                $class = "active";
            } else {
                $class = "";
            }
            ?>

            <li class="page-item <?php echo $class; ?>">
                <a class="page-link" href='<?php echo $link;?>page=<?php echo $totalPages; ?>'><?php echo $totalPages; ?></a>
            </li>
            
            <?php
        }
        ?>
    <?php
    if (($row > 1) && ($pn < $totalPages)) {
        ?>

        <li class="page-item">
            <a class="page-link page-link--with-arrow" href="<?php echo $link;?>page=<?php echo (($pn+1));?>" title="Next Page" aria-label="Next">
                <span class="page-link__arrow page-link__arrow--right" aria-hidden="true">
                    <svg width="7" height="11">
                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                    </svg>
                </span>
            </a>
        </li>
				
        <?php
    }
    ?>

  <?php  } ?>
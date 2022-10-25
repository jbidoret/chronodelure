<li id="fn-<?php echo $countstr ?>" value="<?php echo $order ?>">
    <?php echo $note ?>
    <?php if(option('sylvainjule.footnotes.back') && option('sylvainjule.footnotes.links')): ?>
        <span class="footnotereverse">
            <a href="#fnref-<?php echo $countstr ?>">
                <span><?php echo option('sylvainjule.footnotes.back') ?></span>
            </a>
        </span>
    <?php endif; ?>
</li>

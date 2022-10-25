<?php if(option('sylvainjule.footnotes.links')): ?>
<sup class="footnote"><a id="fnref-<?php echo $countstr ?>" href="#fn-<?php echo $countstr ?>"><span><?php echo $order ?></span></a></sup>
<?php else: ?>
<sup id="fnref-<?php echo $countstr ?>" class="footnote" data-ref="#fn-<?php echo $countstr ?>"><span><?php echo $order ?></span></sup>
<?php endif; ?>

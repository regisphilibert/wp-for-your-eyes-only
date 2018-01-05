<div id="debug-alert-<?php echo $id; ?>" class='debug-alert'>
    <nav>
        <a class='expend-alert'><?php $Component->dashicon('editor-expand') ?></a> | <a class='close-alert'><?php $Component->dashicon('no') ?></a>
    </nav>
    <div class='debug-alert-title'><?php $Component->dashicon('hidden') ?> <?php echo $title ?></div>
    <div class='debug-alert-content'>
        <?php if($trace): ?>
        <div class='backtrace'>
            <?php echo $trace['file'].":".$trace['line'] ?>
        </div>
        <?php endif; ?>
        <pre><?php print_r($alerts); ?></pre>
    </div>
</div>
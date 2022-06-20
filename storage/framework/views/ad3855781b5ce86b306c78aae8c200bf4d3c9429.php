<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Error (500)</title>
    <link rel="shortcut icon" href="<?php echo e(asset('app/admin/assets/images/favicon.ico')); ?>" type="image/ico">
    <link href="<?php echo e(asset('app/admin/assets/css/static.css')); ?>" rel="stylesheet">
</head>
<body>
    <article>
        <p><?php echo app('translator')->get('main::lang.alert_custom_error'); ?></p>
    </article>
</body>
</html>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/main/views/error.blade.php ENDPATH**/ ?>
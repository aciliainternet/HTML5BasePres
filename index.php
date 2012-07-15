<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=1024" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title>Acilia Talks | PHP 5.3 ZEND Certification</title>

        <meta name="description" content="Impress, iframe execution, jquery and syntaxhightlighter" />
        <meta name="author" content="Karlos Agudo" />
        <link href="/css/main.css" rel="stylesheet" />
        <link rel="shortcut icon" href="/images/favicon.png" />
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />
        <!-- Include *at least* the core style and default theme -->
        <link href="js/syntaxhighlighter/styles/shCore.css" rel="stylesheet" type="text/css" />
        <link href="js/syntaxhighlighter/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="impress-not-supported">
        <div id="impress">
            <div id="Index" class="step slide" data-x="0" data-y="0">
                <q>Talks</q>
                <ul>
                <?php
                //Look into slides for possible subdirs (name of the talks) and create a link for export o to watch the talk
                if ($handler = opendir('slides')) {
                    while (false !== ($talks = readdir($handler))) {
                        if ($talks != "." && $talks != "..") {
                            $possible_talks[]=$talks;
                        }
                    }
                    closedir($handler);
                }
                natsort($possible_talks);
                foreach($possible_talks as $talk): ?>
                    <li>
                        <a href="talk.php?dir=<?php echo "slides/".$talk ?>">
                            <?php echo  $talk; //strtolower(preg_replace('/([^A-Z-])([A-Z])/', '$1 $2', $talk)); ?>
                        </a>
                        <a class="export" href="export.php?dir=<?php echo "slides/".$talk ?>">- Export</a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <script src="js/impress.js"></script>
        <script>impress().init();</script>

    </body>
</html>

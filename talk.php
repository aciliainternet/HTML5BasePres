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
        <?php
        $possible_dir = $_GET["dir"];
        if(!is_dir($possible_dir)) die("Must pass a possible dir to this file");
        $global_search = $possible_dir."/*.php";
        foreach (glob($global_search) as $file) { //get the directory name and catch the possible slides
            $files[]=$file;
        }
        if(count($files)){
            natsort($files);
            foreach($files as $file){
                ///the position magic is here
                $possible_file = str_replace($possible_dir."/","",$file);

                list($y_position,$x_position,$name,$z_position,$subname) = array_pad(explode("-",$possible_file), 5, null);
                //$y_position = substr($y_position,7);//removes slides/
                if(isset($z_position)){
                    $z_position = $z_position*(-1);
                    $name = $name."-".$subname;
                    echo '<div id="'.$name.'" class="step slide" data-x="'.(int)($x_position*1000).'" data-y="'.(int)($y_position*1000).'"  data-z="'.(int)($z_position*1000).'">';
                }
                else{
                    echo '<div id="'.$name.'" class="step slide" data-x="'.(int)($x_position*1000).'" data-y="'.(int)($y_position*1000).'">';
                }

                include($file);
                echo '</div>';
                $links[] = $name;
            }
        }else{
            echo "No talks in this directory:".$possible_dir;
        }
        ?>
    </div>
    <div id="code-php-button">PHP</div>
    <div id="code-php" style="display:none">
        <div class="text-editor">
            <div class="menu">Editor   <a href="#" id="hide-code">Hide</a> </div>
            <textarea id="textarea_1" style="width:670px;height:155px">
                
            </textarea>
            <input type="file"  style="display:none" id="open_files" onChange="change_file()" />
        </div>
        <iframe id="show_result" src="/php_files/php_temp.php" ></iframe>
    </div>
    <div id="list-links">List Links</div>
    <div id="list-links-container" style="display:none">
        <ul>
            <?php foreach($links as $link): ?>
            <li><a href="#<? echo $link?>"><? echo $link?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<script src="js/impress.js"></script>
<script>impress().init();</script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/mio.js"></script>
<script src="/editarea_0_8_2/edit_area/edit_area_full.js"></script>

<!-- Include required JS files -->
<script type="text/javascript" src="js/syntaxhighlighter/scripts/shCore.js"></script>
 
<!--
    At least one brush, here we choose JS. You need to include a brush for every 
    language you want to highlight
-->
<script type="text/javascript" src="js/syntaxhighlighter/scripts/shBrushPhp.js"></script>
 


</body>
</html>

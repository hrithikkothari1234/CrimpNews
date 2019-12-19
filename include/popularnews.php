<?php

function get_populartopics(){

    echo "<div class='popular-topics'>
            <h5> Popular Topics </h5><br>";

    $rss = new DOMDocument();

    // Toi Most read news RSS
    $rss->load('https://timesofindia.indiatimes.com/rssfeedmostread.cms');

    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {
        $item = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = $feed[$x]['title'];
        $link = $feed[$x]['link'];

        if(strlen($title) > 18){
            $title = substr($title,0,18).'...';
        }

        echo "
                <a href='{$link}' target='_blank' class='text-muted'>
                    &#8674;{$title}
                </a>
                <br>
            ";

    }

    echo "</div>";
}

 ?>

<?php


    echo
    '
    <h6 class="news-container-title-box">
        Sports
    </h6>
    <hr class="news-container-title-box-hr">
    <div class="container">
    ';

    // Livemint RSS

    $rss = simplexml_load_file('https://www.livemint.com/rss/sports');

    $provider = "Livemint";

    $feed = array();
    foreach ($rss->channel->item as $node) {
        $item = array (
            'title' => $node->title,
            'desc' => $node->description,
            'link' => $node->link,
            'date' => $node->pubDate,
            'image' => $node->image,
            'provider' => $provider
            );
        array_push($feed, $item);
    }

    //Economictimes RSS
    $rss=simplexml_load_file('https://economictimes.indiatimes.com/news/sports/rssfeeds/26407562.cms');

    $provider = "Economic Times";
    foreach ($rss->channel->item as $node) {
        $item = array (
            'title' => $node->title,
            'desc' => $node->description,
            'link' => $node->link,
            'date' => $node->pubDate,
            'image' => $node->image,
            'provider' => $provider
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {

        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
        $image = $feed[$x]['image'];
        $description = $feed[$x]['desc'];

        $provider = $feed[$x]['provider'];

        // format : DAY_MONTH_YEAR
        $date = date('d_F_Y', strtotime($feed[$x]['date']));
        $result = explode('_',$date);

        $day = $result[0];
        $month = $result[1];
        $year = $result[2];

        $desc = explode('</a>',$description);
        if( count($desc)>1 )
            $actual_desc = $desc[1];
        else
            $actual_desc = $desc[0];


        if(strlen($actual_desc)>200){
            $actual_desc=substr($actual_desc,0,200).'...';
        }

        echo
        "
            <div class='row'>
                <div class='col-xl-12 news-content-card'>
                    <p class='news-title'>
                        <a href='{$link}' target='_blank'>
                            {$title}
                        </a>
                    </p>
                    <span class='news-provider'>
                        <a href='{$link}' target='_blank'>
                        {$provider}
                        </a>
                    </span>
                    <span class='news-date text-muted'>
                        <i class='fa fa-clock-o'></i> {$month} {$day},$year
                    </span>
                    <div class='imgBox-news pull-right'>
                        <img src='{$image}' alt='' class='pull-right'>
                    </div>
                    <p class='news-description'>
                        {$actual_desc}
                    </p>
                    <p>
                        <a href='{$link}' target='_blank' class='news-coverage'>
                            <i class='fa fa-folder-open'></i>
                            View full coverage
                        </a>
                    </p>
                </div>
            </div>
            <hr style='height:0px; border:none; border-top: 1px solid #12cad6;'>
        ";

    } // loop ends

    echo "</div>"; // container ends

?>

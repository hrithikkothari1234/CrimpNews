<?php

function get_topstories(){

    echo
    '
    <h6 class="news-container-title-box">
        Top News
    </h6>
    <hr class="news-container-title-box-hr">
    <div class="container">
    ';

    // Livemint RSS

    $rss = simplexml_load_file('https://www.livemint.com/rss/news');

    $provider = "Livemint";
    date_default_timezone_set('Asia/Kolkata');

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
    $rss=simplexml_load_file('https://economictimes.indiatimes.com/rssfeedsdefault.cms');

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
        if(strlen($description)>200){
            $description=substr($description,0,200).'...';
        }
        $provider = $feed[$x]['provider'];

        // format : DAY_MONTH_YEAR
        $date = date('d_F_Y', strtotime($feed[$x]['date']));
        $result = explode('_',$date);

        $day = $result[0];
        $month = $result[1];
        $year = $result[2];

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
                        {$description}
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
}

function get_topheadlines(){

    // Livemint RSS

    $rss = simplexml_load_file('https://www.livemint.com/rss/news');

    $provider = "Livemint";

    $top_feed = array();
    foreach ($rss->channel->item as $node) {
        $item = array (
            'title' => $node->title,
            'link' => $node->link,
            'date' => $node->pubDate,
            'provider' => $provider
            );
        array_push($top_feed, $item);
    }

    for($x=0; $x<count($top_feed); $x++) {

        $top_feed[$x]['title'] = (string)str_replace(' & ', ' &amp; ', $top_feed[$x]['title']);
        $top_feed[$x]['link'] = (string)$top_feed[$x]['link'];
        $top_feed[$x]['provider'] = (string)$top_feed[$x]['provider'];

        // format : DAY_MONTH_YEAR
        $date = (string)date('d_F_Y', strtotime($top_feed[$x]['date']));
        $result = explode('_',$date);

        $day = $result[0];
        $month = $result[1];
        $year = $result[2];

        $top_feed[$x]['date'] = $day.'_'.$month.'_'.$year;

    }

    // to get the news to display the headlines using javascript.
    echo"
        <div id='top-news-dom-target' style='display: none;'>";
            print_r($top_feed);
    echo "</div>";

}
 ?>

<?php

    echo
    '
    <h6 class="news-container-title-box">
        India
    </h6>
    <hr class="news-container-title-box-hr">
    <div class="container">
    ';

    // Toi RSS
    $rss=simplexml_load_file('https://timesofindia.indiatimes.com/rssfeeds/-2128936835.cms');

    $provider = "Times of India";

    $feed = array();
    foreach ($rss->channel->item as $node) {
        $item = array (
            'title' => $node->title,
            'link' => $node->link,
            'date' => $node->pubDate,
            'desc' => $node->description
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
        $description = (string)$feed[$x]['desc'];
        // format : DAY_MONTH_YEAR
        $date = date('d_F_Y', strtotime($feed[$x]['date']));
        $result = explode('_',$date);

        $day = $result[0];
        $month = $result[1];
        $year = $result[2];

        $result = explode('style="margin-top:3px;margin-right:5px;" src="', $description);
        if( count($result) > 1){
            $result = explode('" /></a>', $result[1]);
            if( count($result) > 1)
                $img_link = $result[0];
        }
        else
            $img_link = "";

        $descr = explode('</a>', $description);
        if( count($descr)>1 )
            $actual_descr = $descr[1];
        else
            $actual_descr = " ";

        if(strlen($actual_descr)>150){
            $actual_descr=substr($actual_descr,0,150).'...';
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
                        <img src='{$img_link}' alt='' class='pull-right'>
                    </div>
                    <p class='news-description'>
                        {$actual_descr}
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

    // NDTV.com RSS
    $rss=simplexml_load_file('http://feeds.feedburner.com/ndtvnews-india-news');

    $provider = "NDTV.com";

    $feed = array();
    foreach ($rss->channel->item as $node) {
    	$item = array (
    		'title' => $node->title,
    		'desc' => $node->description,
    		'link' => $node->link,
    		'date' => $node->pubDate
    		);
    	array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
        $description = $feed[$x]['desc'];
        if(strlen($description)>150){
            $description=substr($description,0,150).'...';
        }
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

    }   // loop ends

    echo "</div>"; // container ends


 ?>

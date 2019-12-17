<?php

function get_sportsstories(){

    echo '<h5 style="padding-bottom: 2%;"> Sports </h5>';

    $rss = new DOMDocument();

    // Livemint RSS
    $rss->load('https://www.livemint.com/rss/sports');

    $provider = "Livemint";
    date_default_timezone_set('Asia/Kolkata');

    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {
        $item = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'image' => $node->getElementsByTagName('image')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
        $image = $feed[$x]['image'];
        $description = $feed[$x]['desc'];
        if(strlen($description)>150){
            $description=substr($description,0,150).'...';
        }
        $date = date('i_H_d_m', strtotime($feed[$x]['date']));

        // Format : Minute_Hour_Day_Month
        $current_time =  date('i_H_d_m',strtotime(date('r',time())));

        $date_array = explode('_',$date);
        $current_time_array = explode('_',$current_time);

        if( $date_array[3] == $current_time_array[3] ) // same month
        {
            if($date_array[2] == $current_time_array[2]) // same day
            {
                if($date_array[1] == $current_time_array[1]) // Same hour
                {
                    $timespan = $current_time_array[0] - $date[0]; // calculate minute difference
                    $timespan = $timespan .' minutes ago';
                }
                else
                {
                    $timespan = $current_time_array[1] - $date_array[1]; // hour difference
                    $timespan = $timespan .' hours ago';
                }
            }
            else
            {
                $timespan = $current_time_array[2] - $date_array[2]; // days difference
                if ($timespan == 1)
                    $timespan = $timespan . ' day ago';
                else
                    $timespan = $timespan . ' days ago';
            }
        }
        else {
            $timespan = $current_time_array[3] - $date_array[3]; // months difference
            if($timespan < 0)
                $timespan = $timespan + 12;
            $timespan = $timespan . ' Months Ago';
        }

        echo "
            <div class='news'>
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
                    . {$timespan}
                </span>
                <img src='{$image}'width = '90' height='80' class='pull-right'>
                <p class='news-description'>
                    {$description}
                </p>
                <p>
                    <a href='{$link}' style='font-size: 0.8rem;' target='_blank'>
                        <i class='fa fa-folder-open'></i>
                        View full coverage
                    </a>
                </p>
            </div>
        ";
    }


    // economictimes RSS
    $rss->load('https://economictimes.indiatimes.com/news/sports/rssfeeds/26407562.cms');

    $provider = "Economic Times";

    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {
        $item = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'image' => $node->getElementsByTagName('image')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
        $image = $feed[$x]['image'];
        $date = date('i_H_d_m', strtotime($feed[$x]['date']));

        // Format : Minute_Hour_Day_Month
        $current_time =  date('i_H_d_m',strtotime(date('r',time())));

        $date_array = explode('_',$date);
        $current_time_array = explode('_',$current_time);

        if( $date_array[3] == $current_time_array[3] ) // same month
        {
            if($date_array[2] == $current_time_array[2]) // same day
            {
                if($date_array[1] == $current_time_array[1]) // Same hour
                {
                    $timespan = $current_time_array[0] - $date[0]; // calculate minute difference
                    $timespan = $timespan .' minutes ago';
                }
                else
                {
                    $timespan = $current_time_array[1] - $date_array[1]; // hour difference
                    $timespan = $timespan .' hours ago';
                }
            }
            else
            {
                $timespan = $current_time_array[2] - $date_array[2]; // days difference
                if ($timespan == 1)
                    $timespan = $timespan . ' day ago';
                else
                    $timespan = $timespan . ' days ago';
            }
        }
        else {
            $timespan = $current_time_array[3] - $date_array[3]; // months difference
            if($timespan < 0)
                $timespan = $timespan + 12;
            $timespan = $timespan . ' Months Ago';
        }

        echo "
            <div class='news'>
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
                    . {$timespan}
                </span>
                <img src='{$image}'width = '90' height='80' class='pull-right' style='position: relative; top: -10px;'>
                <p>
                    <a href='{$link}' style='font-size: 0.8rem;' target='_blank'>
                        <i class='fa fa-folder-open'></i>
                        View full coverage
                    </a>
                </p>
            </div>
        ";
    }

}

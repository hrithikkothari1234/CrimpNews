<?php

function get_indiastories(){

    echo '<h5 style="padding-bottom: 2%;"> India </h5>';

    // NDTV.com RSS
    $rss=simplexml_load_file('http://feeds.feedburner.com/ndtvnews-india-news');

    $provider = "NDTV.com";
    date_default_timezone_set('Asia/Kolkata');

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

    // Toi RSS
    $rss=simplexml_load_file('https://timesofindia.indiatimes.com/rssfeeds/-2128936835.cms');

    $provider = "Times of India";

    $feed = array();
    foreach ($rss->channel->item as $node) {
        $item = array (
            'title' => $node->title,
            'link' => $node->link,
            'date' => $node->pubDate
            );
        array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
        $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link = $feed[$x]['link'];
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


 ?>

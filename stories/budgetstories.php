<?php

function get_budgetstories(){

    echo '<h5 style="padding-bottom: 2%;"> Budget </h5>';

    // livemint RSS
    $rss=simplexml_load_file('https://www.livemint.com/rss/budget');

    $provider = "Livemint";
    date_default_timezone_set('Asia/Kolkata');

    $feed = array();
    foreach ($rss->channel->item as $node) {
    	$item = array (
    		'title' => $node->title,
            'desc' => $node->description,
            'image' => $node->image,
    		'link' => $node->link,
    		'date' => $node->pubDate
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

    //Economictimes RSS
    $rss=simplexml_load_file('https://economictimes.indiatimes.com/budget-2019/rssfeeds/67173653.cms');

    $provider = "Economic Times";

    $feed = array();
    foreach ($rss->channel->item as $node) {
    	$item = array (
    		'title' => $node->title,
    		'link' => $node->link,
    		'date' => $node->pubDate,
            'image' => $node->image,
            'desc' => $node->description
    		);
    	array_push($feed, $item);
    }

    for($x=0; $x<count($feed); $x++) {
    	$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    	$link = $feed[$x]['link'];
    	$date = date('i_H_d_m', strtotime($feed[$x]['date']));
        $image = $feed[$x]['image'];
        $description = (string)$feed[$x]['desc'];

        $result = explode('</a>', $description);
        if( count($result)>1 )
            $actual_desc = $result[1];
        else
            $actual_desc = $description;

        if(strlen($actual_desc)>150){
            $actual_desc=substr($actual_desc,0,150).'...';
        }

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
                <p class='news-description'>
                    {$actual_desc}
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

}


 ?>

<?php

function get_searchstories(){

    error_reporting(0);

    $searchValue = $_GET['q'];

    // Livemint RSS
    if(!$rss = simplexml_load_file('https://news.google.com/rss/search?q='.$searchValue))
        echo "Sorry, no stories were found for that particular topic!";
    else{

        $searchValue = ucfirst($searchValue);

        echo
            "
            <h6 class='news-container-title-box'>
                {$searchValue}
            </h6>
            <hr class='news-container-title-box-hr'>
            <div class='container'>
            ";


        $provider = "Google News";
      
        $feed = array();
        foreach ($rss->channel->item as $node) {
            $item = array (
                'title' => $node->title,
                'link' => $node->link,
                'date' => $node->pubDate,
                'provider' => $provider
                );
            array_push($feed, $item);
        }

        for($x=0; $x<count($feed); $x++) {
            $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
            $link = $feed[$x]['link'];
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
}


?>

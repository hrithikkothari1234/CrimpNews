
    var topHeadlines = document.getElementById("topHeadlines");
    var topnews = document.getElementById("top-news-dom-target").textContent;
    var result;
    x = 0;
    var result_len;

    // to display the top news and set the headline and link for it
    function display_headline(){
        result_array = result[x].split('=>');
        result_array.splice(0,1);
        result_array.splice(4,1);
        result_array_title = result_array[0].split('[link]')[0];
        result_array_link = result_array[1].split(' ')[1];
        result_array_date = result_array[2].split(' ')[1].split('_')[0];
        result_array_month = result_array[2].split(' ')[1].split('_')[1];
        result_array_year = result_array[2].split(' ')[1].split('_')[2];

        topHeadlines.innerHTML =
        result_array_title + "<br> <div style='color: #A0A0A0;'> - Livemint" + " " + result_array_month +" "+
            result_array_date + " , " + result_array_year + "</div";

        topHeadlines.setAttribute("href", result_array_link);
        if(x === result_len-1)
            x = 0;
        else
            x=x+1;
    }

    function get_headline(){
        result = (topnews.split('('));
        result.splice(0,2);
        result_len = result.length;
        display_headline();
        setInterval(display_headline, 4000);
    }

get_headline();


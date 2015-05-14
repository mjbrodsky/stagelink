// get the search term
function getSearchResults() {
    return $("#searchTerms").val();
  }



function getGraph(){
/*
    var d = 'http://performances.lincolncenter.org/api/v1/programs?limit=100&date=2014&callback=?';
    $.getJSON(d,function(data) {
        alert('here');
        console.log('here');
         console.log(data);
     });
*/


    $.ajax({
        url:'http://performances.lincolncenter.org/api/v1/programs?limit=100&date=2014',
        dataType:'json',
        success: function(response){
            console.log(response);
        }
    });


}
getGraph();

function getData(name) {
    if(typeof name!=='undefined'){

    }else{
        name = getSearchResults
    }

     var wikiCall = 'http://en.wikipedia.org/w/api.php?format=json&action=query&titles=' + name;
     var wikiCall = wikiCall + '&prop=extracts|pageimages&exintro=&callback=?';
     $.getJSON(wikiCall,function(data) {
         $.each(data.query.pages, function(i, item) {
         $(".wikiExcerpt").empty();
         var wikiExtract = item.extract;
         $(".wikiExcerpt").append(item.extract);
        });
     });

    var ytCall = 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyD14qCqZKSNgHEy6zTHAUGKThpKPGdUuNs&callback=?&q=' + name;

    $(".ytVideos").empty();
    $.getJSON(ytCall,function(data) {
        $.each(data.items, function(i, item) {
            if(i>=3){ // limit to 3 results
                return false;
            }
            var videoID = item.id.videoId;
            $(".ytVideos").append('<iframe title="YouTube video player" class="youtube-player" type="text/html" width="460" height="350" src="http://www.youtube.com/embed/'+ videoID + '"frameborder="0" allowFullScreen></iframe>');

        });
    });
    
    var gImageCall = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=' + name;
    var gImageCall = gImageCall + '&callback=?';

    $(".gImagesPanel").empty();
    $.getJSON(gImageCall,function(data) {
        $.each(data.responseData.results, function(i, item) {
            
            console.log(item.url);
            $(".gImagesPanel").append('<img src="'+ item.url+ '"/>');
            // if(i>=3){ // limit to 3 results
            //     return false;
            // }
            // var videoID = item.id.videoId;
            // $(".ytVideos").append('<iframe title="YouTube video player" class="youtube-player" type="text/html" width="460" height="350" src="http://www.youtube.com/embed/'+ videoID + '"frameborder="0" allowFullScreen></iframe>');

        });
    });

   // https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=mozart

    $('#myModal').modal('show');

}
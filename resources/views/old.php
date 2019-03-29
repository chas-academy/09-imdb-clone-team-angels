<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cineo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
        
* {
    margin: 0;
    padding: 0;
    /* overflow-x: hidden; */
    font-family: 'Montserrat', sans-serif;
}

body {
    overflow-x: hidden;
}

main {

}



/*________NAVIGATION BAR___________________*/

nav {
    width: 95vw;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
    top: 0;
    align-self: auto;
    position: fixed;
    background-color: rgba(0, 0, 0, 0.633);
    font-family: 'Montserrat', sans-serif;
    padding: 5px 2.5vw 5px 2.5vw;

    /* padding: 20px 0 20px 0; */
    /* left:2.5vw;
    right: 2.5vw; */
}

nav >.nav-flex-3 > .inline >.s-up-in >button {
    padding: 3px 8px;
    font-family: 'Montserrat', sans-serif;
    border-radius: 15px;
    color: rgb(205, 205, 205);
    background: none;
    border: 2px solid rgb(205, 205, 205);
}

nav >.nav-flex-3 > .inline >.search > button {
    border: none;
    margin-right: 10px;
    background: none;
    color:white;
}

nav >.nav-flex-3 > .inline >.search > button:hover {
    color:gray;
}

nav >.nav-flex-3 > .inline > .search > input {
    border: none;
    width: 80px;
    background-color: #ececec;
    padding: 2px;
    border-radius: 5px;
    visibility: hidden;
}

.nav-flex-1{
    width: 40vw;
    display: flex;
    flex-flow: column;
    justify-content: space-around;
}

.nav-flex-2{
    width: 20vw;
    text-align: center;
}

.nav-flex-2 > .cineo >  img{
    width: 10vw;
    padding-top: 4px;
}

.nav-flex-3{
    width: 40vw;
    display: flex;
    flex-flow: column;
    justify-content: space-around;

}

.inline{
    display: inline-flex;
    justify-content: flex-end;
    flex-wrap: wrap;
}


.search {
    flex-flow: row;
}

.fa-bars{
    font-size: 25px;
    color: white;
}

.fa-bars:hover {
    color: gray;
}


/*___________HEADER___________________*/

header {
    height: 100vh;
    background-color: rgb(255, 255, 255);
    text-align: center;
    display: flex;
    flex-flow: column;
    justify-content: space-around;
    background: url("https://images.unsplash.com/photo-1524985069026-dd778a71c7b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=2102&q=80");
    /* background-size: 100vw; */
    /* height: 70vh; */
    background-size: cover;
}

header > a > h1 {
    font-size: 65px;
    color: rgb(255, 255, 255);
    letter-spacing: 0.3em;
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Montserrat', sans-serif;
    text-shadow: 2px 2px 9px #717171;
    width: 90vw;
    margin: auto;
}

header > a > h1:hover {
    color: rgb(255, 204, 0);
    text-shadow: 2px 2px 9px #717171;
}

header > a {
    text-decoration: none;
}


/*_____MOVIES CONTAINER____*/

.container-background {
    height: 32vw;
}

.content {
    height: 32vw;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%,rgba(0, 0, 0, 0.65) 100%);
    display: flex;
    flex-flow: row;
    justify-content: space-around;
}

.content:hover {
    background: none;
}

.content > .right{
    text-align: right;
}

.flexallnum {
    width: 45vw;
    display: flex;
    justify-content: space-between;
}

.content > .flexallnum > div > h2 {
    font-size: 3.5em;
    color: rgb(255, 255, 255);
    letter-spacing: 0.3em;
    font-family: 'Raleway', sans-serif;
    text-shadow:1px 1px #000000;
    width: 45px;
    padding: 0px 0px 8px 15px;
    /* border: 3px solid rgb(255, 0, 0); */
    line-height: 0.9;
    vertical-align: center;
    border-radius: 100px;
    /* background-color: white; */
}

.flexall{
    margin: auto;
}

.flexall {
    width: 45vw;
}

.content > .flexall > .mov-name >h2 {
    font-size: 3.5em;
    color: White;
    letter-spacing: 0.3em;
    font-family: 'Raleway', sans-serif;
    text-shadow:1px 1px #000000;
}

.content > .flexall > .mov-name > h2:hover {
    color: rgb(0, 0, 0);
    text-shadow:1px 1px #ffffff;
}

.content > .flexall > .mov-desc > p {
    font-size: 0.9em;
    font-size: 0.9em;
    color: rgb(255, 255, 255);
    box-sizing: content-box;
    display: flex;
    font-family: 'Raleway', sans-serif;
}

.content > .flexall > .mov-year > p {
    font-size: 0.9em;
    font-size: 0.9em;
    color:  lightgray;
    box-sizing: content-box;
    /* display: flex; */
    font-family: 'Raleway', sans-serif;
    visibility: hidden;
}
a { text-decoration: none; color:white;}

.mov1{
    background-image:url(https://slack-imgs.com/?c=1&url=https%3A%2F%2Fimage.tmdb.org%2Ft%2Fp%2Fw1400_and_h450_face%2F%2F5A2bMlLfJrAfX9bqAibOL2gCruF.jpg);
    background-size: 100vw;
}

.mov2{
    background-image:url(https://image.tmdb.org/t/p/w1400_and_h450_face//d1hQaeKeAW3FBc3v6tIP5utleU0.jpg);
    background-size: 100vw;
}

.mov3{
    background-image:url(https://slack-imgs.com/?c=1&url=https%3A%2F%2Fimage.tmdb.org%2Ft%2Fp%2Fw1400_and_h450_face%2F%2Fnv4KsjnhcSIZtuw2mkT9IxoQ5oq.jpg);
    background-size: 100vw;
}

.mov4{
    background-image:url(https://slack-imgs.com/?c=1&url=https%3A%2F%2Fimage.tmdb.org%2Ft%2Fp%2Fw1400_and_h450_face%2F%2F9ywA15OAiwjSTvg3cBs9B7kOCBF.jpg
    );
    background-size: 100vw;
}

/*______FOOTER______*/

footer {
    height: 40vh;
    background-color: rgb(67, 67, 67);
}

.results {
    display: flex;
    flex-direction: row;
    width: auto;
    height: 47vh;
    overflow-x: scroll;
    /* background: darkgray; */
    margin-top: 120px;

}

header > a > h1 {margin-top: 250px;}
::-webkit-scrollbar { 
    display: none; 
}

.results>a{
    width: 420px;
    display: flex;
  flex-direction: column-reverse;
  margin: 8px;
  inner


}
.results>a>img{
    width: auto;
    height: 300px !important;
    box-shadow: 3px 3px 2px black;
}

.results>a>h4{
   height: 20px;
   /* color: black; */
   color: white;
   text-align: center;
   font-family: helvetica neue;
   font-weight: 200;
   margin: 4px;
}
.results>a>img:hover{
    height: 400px !important;
}



/*--------MEDIA QUERIES-------------------------*/
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px)  {
 

    .flexallnum{
        width: fit-content;
        /* height: 0vh; */
    }

    .flexall{
        width: 64vw;
        margin: auto 0 auto 0;
    }

    .header > a > h1 {
        font-size: 55px;
    }

    .content > .flexall > .mov-desc > p {

        height: 5vh;
        overflow-y: scroll
    }
    .content > .flexall > .mov-year > p {
        visibility: hidden;
        width: 100vw;
       height: 0;
    }

    .content > .flexall > .mov-name > h2 {
        font-size: 1.2em;
    }
    .s-up-in {
        width: 0vw;
        height: 0vw;
    }

}


@media only screen
    and (device-width : 375px)
    and (device-height : 812px)
    and (-webkit-device-pixel-ratio : 3) {

        .flexallnum{
            width: fit-content;
            /* height: 0vh; */
        }
        .flexall{
            width: 64vw;
            margin: auto 0 auto 0;
        }

        .header > a > h1 {
            font-size: 55px;
        }

        .content > .flexall > .mov-desc > p {

            height: 5vh;
            overflow-y: scroll
        }
        .content > .flexall > .mov-year > p {
            visibility: hidden;
            width: 100vw;
           height: 0;
        }

        .content > .flexall > .mov-name > h2 {
            font-size: 1.5em;
        }
        .s-up-in {
            width: 0vw;
            height: 0vw;
        }


    }


@media only screen
and (device-width : 375px)
and (device-height : 667px)
and (-webkit-device-pixel-ratio : 2) {

    .flexallnum{
        width: fit-content;
        /* height: 0vh; */
    }
    .flexall{
        width: 62vw;
        margin: auto 0 auto 0;
    }

    .header > a > h1 {
        font-size: 55px;
    }

    .content > .flexall > .mov-desc > p {

        height: 5vh;
        overflow-y: scroll
    }
    .content > .flexall > .mov-year > p {
        visibility: hidden;
        width: 100vw;
        height: 0;
    }

    .content > .flexall > .mov-name > h2 {
        font-size: 1.2em;
    }
    .s-up-in {
        width: 0vw;
        height: 0vw;
    }


}


/*--------MEDIA QUERIES-------------------------*/




</style>
    </head>
    <body>
       
        <nav>
      <div class="nav-flex-1">
        <div>
          <i class="fas fa-bars"></i>
        </div>
      </div>

      <div class="nav-flex-2">
        <div class="cineo">
          <img src="./images/cineoWhite.png">
        </div>
      </div>
      
      <div class="nav-flex-3">
        
        <div class="inline">
        <form action="" methd="GET">
          <div class="search">
          <input id="search" name="movieName" type="text" >
            <button class="item1" type="submit" name="action"><i class="fas fa-search"></i></button>
          
          </div>

          <div class="s-up-in">
            <button class="item1"><a href="/login">sign up</a></button>
            <button class="item1"><a href="/register">sign in</a></button>
          </div>
          </form>
        </div>

      </div>

    </nav>
    
                    </div>
                </div>
            </div>    
            <main>
      
      <header id="back" class="overlay">
        <a href="#top5"><h1>Top 5 Movies</h1></a>
        <div class="results">
    <?php
                        if(isset($_GET["action"])) {
                            if(isset($_GET["movieName"]) && !empty($_GET["movieName"])) {
                                $api = env('TMDB_API_KEY');
                                $searchedMovieName = $_GET["movieName"];
                                $url = "https://api.themoviedb.org/3/search/movie?api_key={$api}&language=en-US&query={$searchedMovieName}&page=1&include_adult=false";

                                $ch = curl_init();

                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_FAILONERROR, true);

                                $response = curl_exec($ch);

                                if (curl_error($ch)) {
                                    $error_msg = curl_error($ch);
                                }

                                curl_close($ch);

                                if (isset($error_msg)) {
                                    echo $error_msg;
                                } else {
                                    $decodedResponse = json_decode($response, true);

                                    $movie = "";
                                    foreach($decodedResponse['results'] as $value) {
                                        $movie .= "<a href='https://www.themoviedb.org/movie/{$value['id']}'>";
                                        $movie .= "<h4>{$value['title']} ({$value['release_date']})</h4>";
                                        $movie .= "<img src='https://image.tmdb.org/t/p/w1280/{$value['poster_path']}' style='height: 180px;'/>";
                                        $movie .= "<a/>";
                                    }

                                    echo $movie;
                                }
                            } else {
                                echo "No data in input box.";
                            }
                        }
                    ?>
                    </div>
      </header>
     
      <div id="top5" class="top-5-container">

        <div class="container-background mov1">
          <div class="content">

            <div class="flexall">
              <div class="mov-name">
                <h2>Aquaman</h2>
              </div>  
              <div class="mov-year">
                <p>2018</p>
              </div>
                <!-- <p>
                  </br> Director: James Cameron
                  </br> Writer: James Cameron
                  </br>
                </p> -->
              <div class="mov-desc">
                <p>Once home to the most advanced civilization on Earth,  plans to conquer the remaining oceanic people -- and then the surface world. Standing in his way is Aquaman, Orm's half-human, half-Atlantean brother and true heir to the throne. With help from royal counselor Vulko, Aquaman must retrieve the legendary Trident of Atlan and embrace his destiny as protector of the deep.</p>
              </div>
            </div>

            <div class="flexallnum">
                <div>
                </div> 
                <div>
                  <h2>1</h2>
                </div>  
            </div>

          </div>
        </div> 

        <div class="container-background mov2">
            <div class="content">

              <div class="flexallnum">
                <div>
                  <h2>2</h2>
                </div>  
                <div>
                </div> 
              </div>

              <div class="flexall right">
                <div class="mov-name">
                  <h2>Captain Marvel</h2>
                </div>  
                <div class="mov-year">
                  <p>2019</p>
                </div>
                  <!-- <p>
                    </br> Director: James Cameron
                    </br> Writer: James Cameron
                    </br>
                  </p> -->
                <div class="mov-desc">
                  <p>Captain Marvel gets caught in the middle of a galactic war between two alien races.</p>
                </div> 
              </div>
  
            </div>
          </div> 

        <div class="container-background mov3">
          <div class="content">

            <div class="flexall">
              <div class="mov-name">
                <h2>Ye wen wai zhuan</h2>
              </div>  
              <div class="mov-year">
                <p>2009</p>
              </div>
                <!-- <p>
                  </br> Director: James Cameron
                  </br> Writer: James Cameron
                  </br>
                </p> -->
              <div class="mov-desc">
                <p>While keeping a low profile after his defeat from Ip Man, Cheung Tin Chi gets into trouble after getting in a fight with a powerful foreigner.</p>
              </div>
            </div>
            
            <div class="flexallnum">
              <div>
              </div> 
              <div>
                <h2>3</h2>
              </div>  
            </div>

          </div>
        </div> 
        
        <div class="container-background mov4">
          <div class="content">

            <div class="flexallnum"> 
              <div>
                <h2>4</h2>
              </div> 
              <div>
              </div> 
            </div>

            <div class="flexall right">
              <div class="mov-name">
                <h2>Fifty Shades Of Grey</h2>
              </div>  
              <div class="mov-year">
                <p>2009</p>
              </div>
                <!-- <p>
                  </br> Director: James Cameron
                  </br> Writer: James Cameron
                  </br>
                </p> -->
              <div class="mov-desc">
                <p>Literature student Anastasia Steele's life changes forever when she meets handsome, yet tormented, billionaire Christian Grey.</p>
              </div>
            </div>

          </div>
        </div> 
        
      </div>


      <footer>
          
      </footer>

    </main>

        </div>    

     -->


  

    </body>
</html>

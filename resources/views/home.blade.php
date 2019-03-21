<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cineo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Compiled and minified Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <!-- Esra was here -->
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center" style="display: inline-block; height: 100%; ">
                    <img src="./images/cineoWhite.png" style="display: inline-block; height: 100%; padding: 0.25vw 0">
                </a>

                <ul id="nav-mobile" class="left">
                    <li><a href="/home">Home</a></li>
                </ul>

                <ul id="nav-mobile" class="right">
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
                    

            </div>
        </nav>


        <div class="row">
            <div class="col s12 m6 offset-m3 offset-l3">

                <div class="card grey lighten-3">
                    <div class="card-content white-text">
                        <div class="row center-align">
                            <form class="col col s6 offset-s3" action="" method="GET">
                            
                                <div class="input-field">
                                    <input id="search" name="movieName" type="text" >
                                    <label for="search">Search</label>
                                </div>

                                <div class="row">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>    
                </div>

                <div class="card grey lighten-4">
                    <div class="card-content">
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
                </div>
            </div>    
        </div>    

    

    </body>
</html>

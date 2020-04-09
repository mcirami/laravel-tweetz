<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
        <title>MyTweetz</title>
    </head>
    <body>

        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">MyTweetz</a>
                </div>
            </div>
        </nav>

        <div class="container">

            <form action="{{ route('post.tweet')  }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if(count($errors) > 0)

                    @foreach($erros->all() as $error)

                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>

                    @endforeach

                @endif

                <div class="form-group">
                    <label for="tweet_text">Tweet Text</label>
                    <input id="tweet_text" type="text" name="tweet" class="form-control">
                </div>
                <div class="form-group">
                    <label for="upload_images">Upload Images</label>
                    <input id="upload_images" type="file" name="images[]" multiple class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Create Tweet</button>
                </div>

            </form>

            @if(!empty($data))

                <ul class="list-group">
                    @foreach($data as $key => $tweet)
                        <li class="list-group-item mb-4">
                            <h3>{{ $tweet['text'] }}</h3>
                            <p> FAVORITE COUNT: {{$tweet['favorite_count']}}</p>
                            <p> RETWEET COUNT: {{$tweet['retweet_count']}}</p>
                        </li>

                        @if(!empty($tweet['extended_entities']['media']))

                            @foreach($tweet['extended_entities']['media'] as $i)

                                <img src="{{$i['media_url_https']}}" alt="" style="width:100px;">

                            @endforeach

                        @endif

                    @endforeach

                </ul>

            @else

                <p>No Tweets Found...</p>

            @endif
        </div>

    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>

<h1>Blog</h1>

@foreach($articles as $article)

<div>
    <h2>{{ $article['titre'] }}</h2>
    <p>{{ $article['contenu'] }}</p>
</div>

@endforeach

</body>
</html>

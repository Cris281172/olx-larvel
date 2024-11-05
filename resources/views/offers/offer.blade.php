<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <li>
                Tytuł: {{$offer->title}}
            </li>
            <li>
                Opis: {{$offer->description}}
            </li>
            <li>
                Kategoria: {{$offer->categories->name}}
            </li>
        </ul>
        <div>
            <h2>Autor</h2>
            <ul>
                <li>Imię: {{$offer->user_details->name}}</li>
                <li>Nazwisko: {{$offer->user_details->surname}}</li>
                <li>Wiek: {{$offer->user_details->age}}</li>
            </ul>
        </div>
        <a href="{{route('watchlist_toggle', $offer->id)}}">
            Dodaj do ulubionych
        </a>
        @if(auth()->check())
            <div>
                <a href="{{route('offer_delete', $offer->id)}}">
                    Usuń
                </a>
                <a href="{{route('offer_edit_view', $offer->id)}}">
                    Edytuj
                </a>
            </div>
        @endif
    </div>
</body>
</html>

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
    <ul>
        @foreach($notifcations as $notification)
            <li @if(!$notification->read_at) style="color: red;" @endif>
                @if($notification->type === 'user-logged')
                    Witaj {{$notification->data['name']}}! Poprawnie zalogowałeś się używając adresu {{$notification->data['email']}}
                @elseif($notification->type === 'offer-create')
                    Ogłoszenie dodane! Tytuł: {{$notification->data['title']}}, Cena {{$notification->data['price']}} zł
                @endif
                @if(!$notification->read_at)
                    <a href="{{route('notification_read', $notification->id)}}">
                        Oznacz jako przeczytane
                    </a>
                @else
                    Odczytano: {{$notification->read_at}}
                @endif

            </li>
        @endforeach

        <a href="{{route('notifications_read_all')}}">
            Odczytaj wszystkie
        </a>
    </ul>
    {{$notifcations->links()}}
</body>
</html>

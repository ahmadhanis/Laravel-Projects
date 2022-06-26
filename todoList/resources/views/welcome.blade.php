<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <style>
        @media screen and (max-width: 768px) {
            .w3-container {
                width: 100%;
            }
        }

        @media screen and (min-width: 768px) {
            .w3-container {
                width: 700px;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    @if (!session())
    <script>
        window.location = "login";
    </script>
    @endif
    @if (session('save'))
    <script>
        alert("Success");
    </script>
    @endif
    @if (session('error'))
    <script>
        alert("Failed");
    </script>
    @endif
    <div class="w3-container">
        <div class="w3-bar w3-blue ">
            <a class="w3-bar-item w3-button w3-right" href="{{route('logout')}}">Logout</a>
        </div>
        <header class="w3-center w3-padding-large w3-blue">
            <h2>
                ToDo List
            </h2>

        </header>
        <div>
            <button class="w3-button w3-round w3-right" onclick="document.getElementById('newitem').style.display= 'block';return false;">New Item</button>
        </div>
        <div class="w3-padding">
            <table class="w3-table w3-striped w3-bordered">
                <thead>
                    <th>No</th>
                    <th>Items</th>
                    <th>Description</th>
                    <th>Operations</th>
                </thead>
                @foreach ($listItems as $listItem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $listItem->name}}</td>
                    <td>{{ $listItem->description}}</td>
                    <td>
                        <div class="w3-cell">
                            <form method="post" action="{{route('markComplete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Completed?');">
                                {{csrf_field()}}
                                <button class="w3-button w3-round w3-block" type="submit">
                                    <i class="fa fa-check"></i></button>
                            </form>
                        </div>
                        <div class="w3-cell">
                            <form method="post" action="{{route('markDelete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                                {{csrf_field()}}
                                <button class="w3-button w3-round w3-block" type="submit">
                                    <i class="fa fa-trash"> </i></button>
                            </form>
                        </div>
                        <div class="w3-cell">
                            <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{$loop->iteration}}').style.display='block';return false;"><i class="fa fa-pencil-square-o"> </i>
                            </button>
                        </div>
                        <div id="{{$loop->iteration}}" class="w3-modal w3-animate-opacity">
                            <div class="w3-modal-content w3-round" style="width:500px">
                                <header class="w3-row w3-blue"> <span onclick="document.getElementById('{{$loop->iteration}}').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                                    <h4 class="w3-margin-left">Update Item</h4>
                                </header>
                                <div class="w3-padding">
                                    <form action="{{route('markUpdate',$listItem->id)}}" method="post" accept-charset="UTF-8">
                                        {{csrf_field()}}
                                        <p>
                                            <input class="w3-input w3-border w3-round" name="updateItem" type="text" required value="{{ $listItem->name }}">
                                        </p>
                                        <p>
                                        <p>
                                            <textarea class="w3-input w3-border w3-round" name="updateDesc" rows="4" cols="50" placeholder="To do description">{{ $listItem->description }}</textarea>
                                        </p>
                                        <p>
                                            <button class="w3-btn w3-round w3-blue" type="submit">Update</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach

            </table>
        </div>

        <footer class="w3-footer w3-center w3-blue">ToDo List App</footer>
    </div>
    <div id="newitem" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content w3-round" style="width:500px">
            <header class="w3-row w3-blue"> <span onclick="document.getElementById('newitem').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                <h4 class="w3-margin-left">New Item Form</h4>
            </header>
            <div class="w3-padding">
                <form method="post" action="{{route('saveItem')}}">
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="listItem" placeholder="To do item"></p>
                    <p><textarea class="w3-input w3-border w3-round" name="description" rows="4" cols="50" placeholder="To do description"></textarea></p>
                    <button class="w3-button w3-blue w3-round" type="submit">Save To-Do</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(".confirmation").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>

</html>
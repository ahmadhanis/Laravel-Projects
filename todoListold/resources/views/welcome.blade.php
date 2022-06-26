<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 64px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        @media only screen and (min-width: 800px) {
            .modalwindow{
                width: 50%;
            }
        }
        @media only screen and (min-width: 1024px) {
            .modalwindow{
                width: 40%;
            }   
        }
        @media only screen and (min-width: 1400px) {
            .modalwindow{
                width: 30%;
            }   
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1>To Do List</h1>
            <table class="w3-table w3-striped w3-bordered">
                <thead>
                    <th>No</th>
                    <th>Items</th>
                    <th>Description</th>
                    <th>Actions</th>
                </thead>

                @foreach ($listItems as $listItem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $listItem->name }}</td>
                    <td>{{ $listItem->description }}</td>
                    <td>
                        <div class="w3-cell">
                            <form method="post" action="{{route('markComplete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Completed?');">
                                {{csrf_field()}}
                                <button class="w3-button w3-round w3-block" type="submit"><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                        <div class="w3-cell">
                            <form method="post" action="{{route('markDelete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                                {{csrf_field()}}
                                <button class="w3-button w3-round w3-block" type="submit"><i class="fa fa-trash"> </i></button>
                            </form>
                        </div>

                        <div class="w3-cell">
                            <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{$loop->iteration}}').style.display='block';return false;"><i class="fa fa-pencil-square-o"> </i></button>
                        </div>
                        <div id="{{$loop->iteration}}" class="w3-modal w3-animate-opacity ">
                            <div class="w3-modal-content w3-round modalwindow" >
                                <header class="w3-container w3-blue"> <span onclick="document.getElementById('{{$loop->iteration}}').style.display='none'" class="w3-button w3-display-topright w3-large">&times;</span>
                                    <h4>Change Item</h4>
                                </header>
                                <div class="w3-container w3-padding">
                                    <form action="{{route('markUpdate',$listItem->id)}}" method="post" accept-charset="UTF-8">
                                        {{csrf_field()}}
                                        <p>
                                            <input class="w3-input w3-border w3-round" name="updateItem" type="text" value="{{ $listItem->name }}" required>
                                        </p>
                                        <p>
                                            <textarea class="w3-input w3-border w3-round" name="updateDesc" rows="4" cols="50" placeholder="To do description">{{ $listItem->description }}</textarea>
                                        </p>
                                        <p>
                                            <button class="w3-btn w3-round w3-blue" type="submit">Submit</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </table>
            <br>
            <div class="w3-card w3-padding">
                <form method="post" action="{{route('saveItem')}}" accept-charset="UTF-8">
                    {{csrf_field()}}
                    <label for="listItem">New Todo Item</label><br>
                    <hr>
                    <p>
                        <input class="w3-input w3-round w3-border" type="text" name="listItem" placeholder="To do item">
                    </p>
                    <p>
                        <textarea class="w3-input w3-border w3-round" name="description" rows="4" cols="50" placeholder="To do description"></textarea>
                    </p>
                    <button class="w3-button w3-blue w3-round">Save To-Do</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
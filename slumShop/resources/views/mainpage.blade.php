<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>MainPage</title>
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

    <header class="w3-center w3-padding-large w3-blue">
        <h2>Products List</h2>
    </header>
    <div>
        <button class="w3-button w3-round w3-right w3-blue w3-margin" onclick="document.getElementById('newitem').style.display= 'block';return false;">New Item</button>
    </div>

    <div class="w3-padding" style='max-width:600px;margin:auto'>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Operations</th>
            </thead>
            @foreach ($listProducts as $listItem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $listItem->id}}</td>
                <td>{{ $listItem->product_name}}</td>
                <td>{{ $listItem->product_price}}</td>
                <td>{{ $listItem->product_type}}</td>
                <td>{{ $listItem->product_qty}}</td>
                <td>
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
                                <h4 class="w3-margin-left">Update Product Form</h4>
                            </header>
                            <div class="w3-padding">
                                <form method="post" action="{{route('markUpdate',$listItem->id)}}">
                                    {{csrf_field()}}
                                    <p><input class="w3-input w3-round w3-border" type="text" name="prname" placeholder="Name" value ="{{ $listItem->product_name}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="text" name="prtype" placeholder="Type" value ="{{ $listItem->product_type}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="prprice" placeholder="Price" step="any" value ="{{ $listItem->product_price}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="prqty" placeholder="Quantity" value ="{{ $listItem->product_qty}}"></p>
                                    </textarea></p>
                                    <button class="w3-button w3-blue w3-round" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach


        </table>
    </div>
    <footer class="w3-footer w3-center w3-blue">SlumShop</footer>

    <div id="newitem" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content w3-round" style="width:500px">
            <header class="w3-row w3-blue"> <span onclick="document.getElementById
     ('newitem').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                <h4 class="w3-margin-left">New Product Form</h4>
            </header>
            <div class="w3-padding">
                <form method="post" action="{{route('saveproduct')}}">
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="prname" placeholder="Name"></p>
                    <p><input class="w3-input w3-round w3-border" type="text" name="prtype" placeholder="Type"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="prprice" placeholder="Price" step="any"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="prqty" placeholder="Quantity"></p>
                    </textarea></p>
                    <button class="w3-button w3-blue w3-round" type="submit">Insert</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
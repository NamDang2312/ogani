
<table  width="100%">
    <thead>
        <tr>
            <th class="shoping__product">Products</th>
            <th></th>
            <th>Price</th>
            <th class= "text-center">Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach (json_decode($showorderString,true) as $orderdetail )
       
        <tr>
            <td class="shoping__cart__item">
                <img class="image" style="width:100px;height:100px" src="{{ url('uploads') }}/{{ $orderdetail['image'] }}" alt=""></td>
                <td class= "center font-weight-bold ">
                    <h5>{{ $orderdetail['name']}}</h5>
            </td>
            <td class="shoping__cart__price center font-weight-bold">
                {{ $orderdetail['price']}}
            </td>
            <td class="text-center shoping__cart__quantity center font-weight-bold">
                {{ $orderdetail['quantity']}}
            </td>
            <td class="shoping__cart__total center font-weight-bold">
                {{ intval( $orderdetail['quantity']) * intval( $orderdetail['price'])}}
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

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
        {{-- @foreach ($arrayOderdetail as $orderdetail )
            
        @endforeach --}}
        {{-- <tr>
            <td class="shoping__cart__item">
                <img class="image" src="{{ url('uploads') }}/cart-1.jpg" alt=""></td>
                <td class= "center font-weight-bold "><h5>{{ $orderdetail -> id }}</h5>
            </td>
            <td class="shoping__cart__price center font-weight-bold">
                {{ $orderdetail -> price }}
            </td>
            <td class="text-center shoping__cart__quantity center font-weight-bold">
                {{ $orderdetail -> quantity }}
            </td>
            <td class="shoping__cart__total center font-weight-bold">
                {{ intval($orderdetail -> price) *  intval( $orderdetail -> quantity) }} 
            </td>
            
        </tr> --}}
        <tr>
            <td>{{ $arrayOderdetail }}</td>
            <td>{{ $arrayOderdetail }}</td>
            <td>{{ $arrayOderdetail }}</td>
            <td>{{ $arrayOderdetail }}</td>
            <td>{{ $arrayOderdetail }}</td>
        </tr>
    
    </tbody>

</table>
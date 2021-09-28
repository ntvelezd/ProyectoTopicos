</div>
<div id="app" class="col-11">
    <h2>{{__('cart.fac')}}</h2>
    <div class="row my-3">
        <div class="col-10">
            <h1>{{__('cart.bolsos')}}</h1>
            <p>{{__('cart.dir1')}}</p>
            <p>{{__('cart.dir2')}}</p>
            <p>{{__('cart.dir3')}}</p>
        </div>
    </div>
    <hr />
    <table class="table table-borderless factura">
        <thead>
            <tr>
                <th>{{__('cart.to')}}</th>
                <th> </th>
                <th>{{__('cart.send')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{auth()->user()->getName()}}</td>
                <td>{{ $data['order'] ->getAdress()}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless factura">
        <thead>
            <tr>
                <th>{{__('cart.order')}}</th>
                <th>{{__('cart.date')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data['order'] ->getId()}}</td>
                <td>{{ $data['order']['created_at']}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row my-5">
        <table class="table table-borderless factura">
            <thead>
                <tr>
                    <th>{{__('cart.cant')}}</th>
                    <th>{{__('cart.desc')}}</th>
                    <th>{{__('cart.price')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data["items"] as $item)
                @if ($item->handbag)
                <tr>
                    <td>{{ $item->getQuantity() }}</td>
                    <td>{{ $item->handbag->getName()}}</td>
                    <td>{{ $item->handbag->getPrice()}}</td>
                </tr>
                @endif
                @if ($item->accesory)
                <tr>
                    <td>{{ $item->getQuantity() }}</td>
                    <td>{{ $item->accesory->getName()}}</td>
                    <td>{{ $item->accesory->getPrice()}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>{{__('cart.total1')}}</th>
                    <th>${{$data['order'] ->getTotalPrice()}} COP</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="cond row">
        <div class="col-12 mt-3">
            <h4>{{__('cart.cond')}}</h4>
            <p>{{__('cart.pago')}}</p>
            <p>
                {{__('cart.mpago')}}
                <br />
                {{__('cart.cuenta')}}
                <br />
                {{__('cart.nequi')}}
            </p>
        </div>
    </div>
    <form method="POST" action="{{ route('cart.pdf') }}">
        @csrf
        <button type="submit" class="btn btn-primary" name="id" value="{{ $data['order']->getId() }}">{{__('cart.gen')}}
            PDF</button>
    </form>
    <a href="{{route('home.index')}}" class="btn btn-primary" role="button" aria-pressed="true">{{__('cart.start')}}</a>
</div>
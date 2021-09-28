</div>
<div id="app" class="col-11">
    <h2>Factura</h2>
    <div class="row my-3">
        <div class="col-10">
            <h1>Tienda bolsos</h1>
            <p>Av. Winston Churchill</p>
            <p>Plaza Orleans 3er. nivel</p>
            <p>local 312</p>
        </div>
        <div class="col-2">
            <img src="~/images/Mil-Pasos_Negro.png" />
        </div>
    </div>
    <hr />
    <table class="table table-borderless factura">
        <thead>
            <tr>
                <th>Facturar a</th>
                <th>Enviar a</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Arian Manuel Garcia Reynoso</td>
                <td>{{ $data['order'] ->getAdress()}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless factura">
        <thead>
            <tr>
                <th>N° de orden</th>
                <th>Fecha</th>
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
                    <th>Cant.</th>
                    <th>Descripcion</th>
                    <th>Precio Unitario</th>
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
                    <th>Total Factura</th>
                    <th>${{$data['order'] ->getTotalPrice()}} COP</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="cond row">
        <div class="col-12 mt-3">
            <h4>Condiciones y formas de pago</h4>
            <p>El pago se debe realizar en un plazo de 15 dias.</p>
            <p>
                Metodos de pago:
                <br />
                Cuenta de ahorros bancolombia: 112233445566
                <br />
                Cuenta Nequi: 123456789
            </p>
        </div>
    </div>
    <form method="POST" action="{{ route('cart.pdf') }}">
        @csrf
        <button type="submit" class="btn btn-primary" name="id" value="{{ $data['order']->getId() }}">Generate
            PDF</button>
    </form>
    <a href="{{route('home.index')}}" class="btn btn-primary" role="button" aria-pressed="true">Inicio</a>
</div>
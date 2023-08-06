@extends('layouts.app')

@section('content')

    <div class="container" style="min-width: 1000px;">
        <div class="card">
            <div class="card-header text-right">
                <strong>Bestellinformationen</strong>
            </div>
            <div class="card-body text-center">
                <div class="container">
                        <div class="row border col-lg-6 shadow mb-5"  style="margin-left: auto; margin-right: auto;">
                            <div class="mb-4 mt-3">
                                <h4>Bestellinformation Nummer{{$order->id}}</h4>
                                <div class="faq-date">
                                    <em>{{$order->updated_at}}</em><br>
                                    <em>{{$order->updated_at->diffForHumans()}}</em>
                                </div>
                            </div>
                            <div class="mb-3">
                                <img class="logo" src="{{asset('storage/'.$order->product->image)}}">
                            </div>
                        </div>

                    <div class="row border row mt-5 mb-5 shadow">
                            <table class="table table-responsive"  style="line-height: 30px">
                                <thead>
                                <tr>
                                    <th class="text-center bg-body-secondary">Produktname</th>
                                    <th class="text-center bg-body-secondary">Preis</th>
                                    <th class="text-center bg-body-secondary">Anzahl</th>
                                    <th class="text-center bg-body-secondary">VAT</th>
                                    <th class="text-center bg-body-secondary">Versandkosten</th>
                                    <th class="text-center bg-body-secondary">Gesamtkosten / Bezahlt</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = $order->price * $order->quantity; @endphp
                                <tr>
                                    <td>
                                        {{$order->product->title_de}}
                                    </td>
                                    <td class="text-right">
                                        <span>{{number_format($order->product->price)}} Euro </span>
                                    </td>
                                    <td class="text-right">
                                        <span> {{$order->quantity}}</span>
                                    </td>
                                    <td class="text-right">
                                        <span>%9</span>
                                    </td>
                                    <td class="text-right">
                                        <span>{{number_format(10)}} Euro </span>
                                    </td>
                                    <td class="text-right"></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><strong> gesamt </strong></td>
                                    <td></td>
                                    <td>{{number_format($total)}} Euro </td>
                                    <td>{{number_format(($total * 9  / 100))}} Euro  </td>
                                    <td>{{number_format(10)}} Euro </td>
                                    <td><strong>{{number_format(($total * 9  / 100)+($total+10))}} Euro </strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <div class="row border p-3 mt-5 mb-5 shadow">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header text-center"><h5>Käuferinformationen</h5></div>
                                <div class="card-body">
                                    <ul>
                                        <li> <strong>Nutzername : </strong> {{$order->user->name}}</li>
                                        <li> <strong>Email : </strong> {{$order->user->email}}</li>
                                        <li> <strong>Telefonnummer : </strong> {{$order->user->phone}}</li>
                                        <li> <strong>Provinzname : </strong> {{$order->user->state}}</li>
                                        <li> <strong>Stadtname : </strong> {{$order->user->city}}</li>
                                        <li> <strong>Adresse : </strong> {{$order->user->address}}</li>
                                        <li> <strong>Postleitzahl : </strong> {{$order->user->postcode}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header text-center"><h5>Produktinformation</h5></div>
                                <div class="card-body">
                                    <ul>
                                        <li> <strong>Produktname : </strong> {{$order->product->title_de}}</li>
                                        <li> <strong>Englischer Name des Produkts: </strong> {{$order->product->title_en}}</li>
                                        <li> <strong>Kategoriename : </strong> {{$order->product->category->name}}</li>
                                        <li> <strong>Marke : </strong> {{$order->product->brand}}</li>
                                        <li> <strong>Gekaufte Menge : </strong> {{$order->quantity}}</li>
                                        <li> <strong>Garantie : </strong> {{$order->product->guarantee}}</li>
                                        <li> <strong>Preis : </strong>{{number_format($order->product->price)}} Euro </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div style=" margin-left: 32%; margin-right: 30%">
                        <select name="status" class="form-select text-center" style="font-size: medium; font-weight: bold;">
                          <option value="active" @if($order->status == 'active')  selected @endif >aktiv</option>
                            <option value="pending" @if($order->status == 'pending')  selected @endif >ausstehend</option>
                            <option value="done" @if($order->status == 'done')  selected @endif >erledigt</option>
                        </select>
                    </div>
                    <div class="form-group text-center mt-5">
                        <button type="submit" class="btn btn-success btn-sm btn-block">bearbeiten</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

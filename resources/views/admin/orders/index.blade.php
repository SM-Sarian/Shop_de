@extends('layouts.app')

@section('title','Bestellungen')

@section('content')
    <div class="card card-default" style="min-width: 1000px; right: 10px">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1">Bestellungen</span>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Nutzername</th>
                    <th class="bg-primary-subtle">Produktname</th>
                    <th class="bg-primary-subtle">Bild</th>
                    <th class="bg-primary-subtle">Anzahl</th>
                    <th class="bg-primary-subtle">Endpreis</th>
                    <th class="bg-primary-subtle">Status</th>
                    <th class="bg-primary-subtle">anzeigen/Bearbeitungsstatus</th>
                    <th class="bg-primary-subtle">löschen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key=> $order)
                    @php $total = $order->price * $order->quantity; @endphp
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->product->title_de}}</td>
                        <td>
                            <img src="{{asset('storage/'.$order->product->image)}}" alt="" width="80px"  height="40px" class="rounded shadow">
                        </td>
                        <td>
                            <p>{{$order->quantity}}</p>
                        </td>
                        <td>
                            <p>{{number_format(($total * 9  / 100)+($total+10))}} Euro </p>
                        </td>
                        @if($order->status == 'active')
                        <td>
                            <p class="text-success"><strong>aktiv</strong></p>
                        </td>
                            @elseif($order->status == 'pending')
                                <td>
                                    <p class="text-warning"><strong>ausstehend</strong></p>
                                </td>
                        @else
                            <td>
                                <p class="text-secondary"><strong>erledigt</strong></p>
                            </td>
                        @endif
                        <td>
                            <a href="{{route('orders.show',$order->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                            <td>
                                <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" onclick="return confirm('Sind Sie sich sicher?')">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$orders->links()}}
@endsection

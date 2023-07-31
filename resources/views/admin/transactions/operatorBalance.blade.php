@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/transactions/operatorBalance.css') }}">
    <div class="content-margin">

        <form action="{{route('search-operators')}}" method="POST">
            @csrf
            <div class="row form-row">
                <div class="col-md">
                    <h4>Operator Deposits</h4>  
                </div>  
                <div class="search-area col-md">
                    <input type="text" class="form-control" name="search_field" id="">
                    <button type="submit" class="btn btn-primary search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="col-md">
                    <a href="{{route('operator-deposits')}}" class="btn btn-success default-btn">Show Default</a>
                </div> 
            </div> 
        </form>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Operator Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Area</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($operators->isEmpty())
                        <td colspan="13"><h4 class="bg-danger">No Data Available</h4></td>
                    @else   
                        @foreach ($operators as $operator)
                            <tr>
                                <td scope="col">{{$operator->name}}</td>
                                <td scope="col">{{$operator->phone}}</td>
                                <td scope="col">{{$operator->email}}</td>
                                <td scope="col"> {{$operator->aria}} </td>

                                @if ($operator->vendor_balances)
                                    <td scope="col"> {{$operator->vendor_balances->amount}} </td>

                                @else
                                    <td scope="col">0.00 </td>

                                @endif

                                <td scope="col">
                                    <div class="actions">
                                        @if ($operator->vendor_balances)
                                            @if ($operator->vendor_balances->amount != 0.00)
                                                <a href="{{route('clear-deposit',['vendor_balance_id'=>$operator->vendor_balances->vendor_balance_id])}}" class="btn-group btn btn-danger">Clear Deposit</a>

                                            @else
                                                <button class="btn-group btn btn-danger" disabled> Clear Deposit </button>

                                            @endif
                                        @else
                                            <button class="btn-group btn btn-danger" disabled> Clear Deposit </button>
                                        @endif
                                            <a href="{{route('details-admin',['id'=>$operator->id])}}" class="btn-group btn btn-primary">Operator Info</a>
                                    </div>
                                </td>
                            </tr>
                                
                        @endforeach
                    @endif
                </tbody> 
            </table>
        </div>
        <div>
            {{ $operators->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

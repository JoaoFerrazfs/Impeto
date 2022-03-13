@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div style="margin-top: 50px;" class="container">
    <table class="table table-hover table-dark table-borderless ">
        <thead>
            <tr>               
                <th scope="col">Cod</th>
                <th scope="col">Tipo de Serviço</th>
                <th scope="col">Nome do Prestador</th>
                <th scope="col">Valor</th>
                <th scope="col">Classificação</th>
                <th scope="col">Ação</th>                     
            </tr>
        </thead>
        <tbody >
            @foreach ($results as $result )     
            <tr>                         
                <td>{{$result->cod}}</td>
                <td>{{$result->type}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->price}}</td>
                <td>5 Estrelas</td>
                <td><a href="#" class="btn btn-info" >Visualizar</a></td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>

</div>

@stop
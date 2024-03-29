@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<div class="container mt-5">

    <div class="">

        <form action="/frete" method="POST" class="row g-3">
            @csrf
            <div class="col-auto">
                <input type="text" name="address" class="form-control" id="inputPassword2" placeholder="CEP">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mb-3">Usar</button>
            </div class="col-auto">
        </form>


    </div>
    <form action='/pedido/confirmado' method="post">
        @csrf
        <fieldset class="border p-2 container">
            <legend style="color: white;" class="w-auto">Dados Pessoais</legend>


            <div class="col-md-10 container d-flex p-2 align-self-center ">
                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">CPF</span>
                    <input type="text" name="cpf" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nome Completo</span>
                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Telefone</span>
                    <input type="text" name="phoneNumber" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

            </div>

           

            <div class="col-md-10 container d-flex p-2 align-self-center ">

              

              
                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
                    <input type="text" name="cep" class="form-control" value="{{  session()->get('cep') != null  ? session()->get('cep') : '';  }}"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Estado</span>
                    <input type="text" name="state" class="form-control" value="{{  session()->get('state') != null  ? session()->get('state') : '';  }}"    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Cidade</span>
                    <input type="text" name="city" class="form-control" value="{{  session()->get('town') != null  ? session()->get('town') : '';  }}"    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Rua</span>
                    <input type="text" name="street" class="form-control" value="{{  session()->get('street') != null  ? session()->get('street') : '';  }}"    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nº</span>
                    <input type="text" name="number" class="form-control" pĺaceholder= "Digite seu numero"    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>
               
            </div>
        </fieldset>

        <fieldset class="border p-2 mt-5">
            <legend style="color: white;" class="w-auto">Produtos</legend>
            <table class="table-light table ">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $value)
                    <tr>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['price']}}</td>
                        <td>{{$value['quantity']}}</td>
                        <td>{{$value['quantity'] * $value['price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>

                @if(session()->get('portage') != null)
                <tfoot class="table-secondary">
                    <tr>
                        <td>Valor dos Frete </td>
                        <td> </td>
                        <td> </td>
                        <td>{{ session()->get('portage') }}</td>
                    </tr>
                    @else

                    <tfoot class="table-secondary">





                        <tr>
                            <td>Valor do Frete </td>
                            <td> </td>
                            <td> </td>
                            <td>{{ session()->get('portage') }}</td>
                        </tr>



                        @endif
                        <tr>
                            <td>Valor dos Produtos </td>
                            <td> </td>
                            <td> </td>
                            <td>{{$amount}}</td>
                        </tr>
                    </tfoot>
            </table>


        </fieldset>

        <div class="alert alert-light text-center " role="alert">
            <h2>Valor total da compra</h2>
            <h3 style="  color: red;" class=" text-uppercase"> R$ {{$amount +  session()->get('portage')  }}</h3>
        </div>



        <fieldset class="border p-2 container mt-5">
            <legend style="color: white;" class="w-auto">Observação</legend>


            <div class="col-md-10 container d-flex p-2 align-self-center ">
                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <textarea type="text" name="note" class="form-control"> </textarea>
                </div>






            </div>
        </fieldset>

        <div class="position-relative mt-5">
            <div class="position-absolute top-50 start-0">
                <a href="/carrinho/visualizar" class="btn btn-outline-info">Editar pedido</a>
            </div>

            <div class="position-absolute top-50 end-0">
                <button type="submit" class="btn btn-outline-success">Confirmar pedido</button>
            </div>

        </div>
    </form>
</div>







@endsection
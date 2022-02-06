<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    input[type=text],
    select {
        width: 30%;
        padding: 5px 10px;
        margin: 10px 0;

        border: 1px solid #ccc;
        border-radius: 6px;

    }

    .input input {
        width: 30%;


    }

    .input span {
        margin-left: 10px;


    }
</style>



<div class="title">
    <h1> Pedido nº {{$budget['number']}}</h1>
</div>

<div class="container mt-5" class="body">

    <div>


        <fieldset class="">


            <legend class="w-auto">Dados Pessoais</legend>


            <div class="input">
                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">CPF</span>
                    <input value="{{$budget['delivery']['cpf']}}" type="text" name="cpf" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">Nome Completo</span>
                    <input value="{{$budget['delivery']['name']}}" type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <br>
                <div style="display:inline" class="display:inline">
                    <span class="" id="inputGroup-sizing-sm">Telefone</span>
                    <input value="{{$budget['delivery']['phoneNumber']}}" type="text" name="phoneNumber" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>



                <div style="display:inline" class="display:inline">
                    <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
                    <input value="{{$budget['delivery']['cep']}}" type="text" name="cep" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <br>
                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">Estado</span>
                    <input value="{{$budget['delivery']['state']}}" type="text" name="state" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">Cidade</span>
                    <input value="{{$budget['delivery']['city']}}" type="text" name="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>
                <br>
                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">Rua</span>
                    <input value="{{$budget['delivery']['street']}}" type="text" name="street" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div style="display:inline" class="">
                    <span class="" id="inputGroup-sizing-sm">Nº</span>
                    <input value="{{$budget['delivery']['number']}}" type="text" name="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

            </div>

        </fieldset>

        <fieldset class=" ">
            <legend class=" ">Produtos</legend>
            <table class="table">
                <thead style="border-style: solid;">
                    <tr class="">
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody class="table_body">
                    @foreach ($budget['products'] as $key=> $value)
                    <tr>

                        <td style="border-style: solid;">{{$value['name']}}</td>
                        <td style="border-style: solid;">{{$value['price']}}</td>
                        <td style="border-style: solid;">{{$value['quantity']}}</td>
                        <td style="border-style: solid;">{{$value['quantity'] * $value['price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </fieldset>

        <fieldset>
            <legend> Dados para Pagamento</legend>

            <div style=" margin-top: 20px;">
                <span style="">Valor do Pedido </span>
                <input style="display: inline-block;">R$ {{$amount}}</input>
            </div>

            <div style=" margin-top: 20px;">
                <span style="">Meio de Pagamento:</span>
                <input style="display: inline-block;">Dinheiro</input>
            </div>
        </fieldset>

        <fieldset>
            <legend>Observação</legend>

            @if($budget['note'] == null)
            <textarea>Não foram feitas observações</textarea>
            @else
            <textarea> {{$budget['note']}}</textarea>
            @endif

            </textarea>

        </fieldset>
    </div>
</div>
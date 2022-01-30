

<div class="container mt-5">
   
    <div>
      
        
        <fieldset class="border p-2 container">
      
       
            <legend style="color: white;" class="w-auto">Dados Pessoais</legend>


            <div class="col-md-10 container d-flex p-2 align-self-center ">
                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">CPF</span>
                    <input value="{{$budget['delivery']['cpf']}}" type="text" name="cpf" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
                </div>

                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nome Completo</span>
                    <input value="{{$budget['delivery']['name']}}" type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Telefone</span>
                    <input value="{{$budget['delivery']['phoneNumber']}}" type="text" name="phoneNumber" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

            </div>
            <div class="col-md-10 container d-flex p-2 align-self-center ">

                <div class="input-group input-group-sm mb-3 mx-3 ">
                    <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
                    <input value="{{$budget['delivery']['cep']}}"  type="text" name="cep" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Estado</span>
                    <input value="{{$budget['delivery']['state']}}" type="text" name="state" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Cidade</span>
                    <input value="{{$budget['delivery']['city']}}" type="text" name="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Rua</span>
                    <input value="{{$budget['delivery']['street']}}" type="text" name="street" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                </div>

                <div class="input-group input-group-sm mb-3 mx-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nº</span>
                    <input value="{{$budget['delivery']['number']}}" type="text" name="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
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
                    @foreach ($budget['products'] as $key=> $value)
                    <tr>
                      
                        <td>{{$value['name']}}</td>
                        <td>{{$value['price']}}</td>
                        <td>{{$value['quantity']}}</td>
                        <td>{{$value['quantity'] * $value['price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-secondary">
                    <tr>
                        <td>Valor do Pedido </td>
                        <td> </td>
                        <td> </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </fieldset>
</div>
</div>



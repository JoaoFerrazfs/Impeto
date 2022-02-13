@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<section class="container productRegister ">
    <h1>Compre seu Banner</h1>
    <form method="POST" action="/novoBanner" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Solicitante</span>
            <input type="text" name="name" class="form-control" id="phoneNumber" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Telefone</span>
            <input type="text" name="phoneNumber" class="form-control" id="cod" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">email</span>
            <input type="email" class="form-control " name="email" id="email" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Empresa</span>
            <input type="text" step='0.01' class="form-control" name="company" id="company" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Localização</span>
            <select name="localization" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Selecione</option>
                <option value="Cabeçalho">Cabeçalho</option>
                <option value="Lateral Esquerda">Lateral Esquerda</option>
                <option value="Lateral Direita">Lateral Direita</option>
                <option value="Rodapé">Rodapé</option>
            </select>
        </div>
        <div>
            <fieldset class="border p-2 container mt-5 d-flex mb-3 ">
            <label class="d-inline p-2  text-white">Tempo de Exibição: </label>

                <div class="p-2 ">
                    <input class="form-check-input" value="7 dias" name="showTime" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        7 Dias
                    </label>
                </div>
                <div class="p-2  ">
                    <input class="form-check-input" value=" 15 Dias"  name="showTime" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        15 Dias
                    </label>
                </div>
                <div class="p-2 ">
                    <input class="form-check-input" value="30 dias" name="showTime" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        30 Dias
                    </label>
                </div>

            </fieldset>

        </div>





        <div class="mb-3">
            <label for="image" class="form-label">Adicione uma foto</label>
            <input class="form-control" type="file" id="image" name="image" required="required">
        </div>


        <button type="submit" class="btn btn-outline-light">Salvar Produto</button>
    </form>




</section>




@endsection
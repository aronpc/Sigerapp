@extends('adminlte::page')

@section('title', 'SIGER - Sistema Gerenciador de Reservas de Equipamentos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">

  
<form method="post" action="{{ route('manutencoes.store') }}">
        @csrf
        <div class="form-group">
             
        <div class="form-group">
             
             <label for="fkequipamentos">Equipamento:</label>
             
            
            
             {!!
             
             Form::select(
                 'fkequipamentos',
                  $equipamentos->pluck('eqdescricao','id'),
                 old('fkequipamentos') ?? request()->get('fkequipamentos'),
                 ['class' => 'form-control']
             )
         !!}




               </div>
	      <label for="data">Data da abertura:</label>
        {!!
				Form::date('data', \Carbon\Carbon::now(),['class' => 'form-control']);

              !!}
          </div>
	      
 		
     <div class="form-group">
 		<label for="descricaoproblema">Descrição do problema apresentado:</label>
        	<textarea  rows="4" cols="50" id="descricaoproblema" class="form-control" name="descricaoproblema" autofocus > {{old('descricaoproblema')}}</textarea>
            <input type="hidden" class="form-control" name="status" value="Aberta"/>
	  </div>
	  <button type="submit" class="btn btn-primary">Abrir</button>
          <a href="{{ route('manutencoes.index')}}" class="btn btn-primary">Voltar</a>
      </form>
  </div>
</div>


@stop
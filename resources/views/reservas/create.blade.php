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

  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    
    
      
      <form method="post" action="{{ route('reservas.store') }}">
      {{ csrf_field() }}
         
         
          <div class="form-group">
         <label for="horario">Horário:</label> 
              <input type="time" id="horario"class="form-control" name="horario">
         </div>
          <div class="form-group">
              
             
              <label for="dtagendamento">Data de agendamento:</label>
              {!!
				Form::date('dtagendamento', \Carbon\Carbon::now(),['class' => 'form-control']);

              !!}
          </div>
	  
          <div class="form-group">
           <label for="fkequipamentos">Equipamentos:</label>

            {!!
            Form::select(
                'fkequipamentos',
                $equipamentos->pluck('eqdescricao','id'),
                old('fkequipamentos') ?? request()->get('fkequipamentos'),
                [
                'class' => 'form-control',
                'required' => 'required'
                ]
            )
        !!}

          </div>
          
          <button type="submit" class="btn btn-primary">Confirmar</button>
      </form>
  </div>
</div>

@stop



  @extends('layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('content')




<div class="container">
    <form name="clientAlt" action="{{ route('client.update', $client->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="empresa">Empresa</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" >
          </div>
          <div class="form-group col-md-6">
            <label for="docs">CNPJ/CPF</label>
            <input type="text" name="docs" class="form-control" value="{{ $client->docs }}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return validate()">Cadastar</button>
      </form>
</div>

@endsection

@push('js')


@endpush

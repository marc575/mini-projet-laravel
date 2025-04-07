@extends('layout') 
 
@section('content') 
<style> 
  .uper { 
    margin-top: 40px; 
  } 
</style> 
 
<div class="card uper"> 
  <div class="card-header"> 
    Ajouter un client 
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
        <form method="post" action="{{ route('clients.store') }}"> 
            @csrf 
            <div class="form-group"> 
                <label for="npr">Nom et prénom:</label> 
                <input type="text" class="form-control" name="npr"/> 
            </div> 
            <div class="form-group"> 
                <label for="adresse">Adresse :</label> 
                <input type="text" class="form-control" name="adresse"/> 
            </div> 
            <div class="form-group"> 
                <label for="email">Email :</label> 
                <input type="text" class="form-control" name="email"/> 
            </div> 
            <button type="submit" class="btn btn-primary">Ajouter</button> 
        </form> 
    </div> 
</div> 
@endsection
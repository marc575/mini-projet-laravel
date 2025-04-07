@extends('layout') 
 
@section('content') 
 
<style> 
  .uper { 
    margin-top: 40px; 
  } 
</style> 
 
<div class="uper"> 
 
  @if(session()->get('success')) 
    <div class="alert alert-success"> 
      {{ session()->get('success') }}   
    </div><br /> 
  @endif 
 
  <h1>Liste des clients</h1> 
  <table class="table table-striped"> 
 
    <thead> 
        <tr> 
          <td>ID</td> 
          <td>Nom Prénom</td> 
          <td>Adresse</td> 
          <td>Email</td> 
          <td>créé le</td> 
          <td>Mis à jour le</td> 
          <td colspan="3">Action</td> 
        </tr> 
    </thead> 
 
    <tbody> 
        @foreach($clients as $client) 
        <tr> 
            <td>{{$client->id}}</td> 
            <td>{{$client->npr}}</td> 
            <td>{{$client->adresse}}</td> 
            <td>{{$client->email}}</td> 
            <td>{{$client->created_at}}</td> 
            <td>{{$client->updated_at}}</td> 
            <td><a href="{{ route('clients.show', $client->id)}}" class="btn 
btn-success">Détails</a></td> 
            <td><a href="{{ route('clients.edit', $client->id)}}" class="btn 
btn-primary">Modifier</a></td> 
            <td> 
                <form action="{{ route('clients.destroy', $client->id)}}" 
method="post"> 
                  @csrf 
                  @method('DELETE') 
                  <button class="btn btn-danger" 
type="submit">Supprimer</button> 
                </form> 
            </td> 
        </tr> 
        @endforeach 
    </tbody> 
  </table> 
<div> 
@endsection
@extends('layout.default')
@section('content')
	  	<h1>Liste des Ruchers</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">latitude</th>
      <th scope="col">longitude</th>
    </tr>
  </thead>
  <tbody>
  	 @foreach ($ruchers as $rucher)
	    <tr>
	      <th scope="row">{!! $rucher->id !!}</th>
	      <td>{!! $rucher->nom !!}</td>
 	      <td>{!! $rucher->longitude !!}</td>
	      <td>{!! $rucher->latitude !!}</td>
	    </tr>
    @endforeach
  </tbody>
</table>
@stop

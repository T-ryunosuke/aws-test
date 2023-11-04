@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 m-auto h-75">
    <p><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="h-75 border">
      <table class="alternately w-100">
        <tr class="" style="background:#03AAD2;">
          <th class="w-25 pl-5">ID</th>
          <th class="w-50 pl-4">名前</th>
          <th class="w-25">場所</th>
        </tr>
        @foreach($reservePersons as $reservePerson)
          @foreach($reservePerson->users as $reservesetting_user)
        <tr class="">
          <td class="w-25 pl-5">{{ $reservesetting_user ->id }}</td>
          <td class="w-25 pl-4">{{ $reservesetting_user ->over_name }}{{$reservesetting_user ->under_name }}</td>
          <td>リモート</td>
        </tr>
          @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

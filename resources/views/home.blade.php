@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @isset($colors)
        @foreach($colors as $key => $color)
          <label class="btn btn-{{$color}}">{{$key}}</label>
        @endforeach
      @endisset
      <div class="table-responsive">  
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Country</th>
              <th>Total Cases</th>
              <th>New Cases</th>
              <th>Total Deaths</th>
              <th>New Deaths</th>
              <th>Total Recovered</th>        
            </tr>
          </thead>
          <tbody>
            @isset($response)
              @foreach($response as $data)
                <tr class="table-{{Arr::get($colors, $data['continent']) }} text-dark">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data['country'] }}</td>
                  <td>{{ $data['totalCases'] }}</td>
                  <td>{{ $data['newCases'] }}</td>
                  <td>{{ $data['totalDeaths'] }}</td>
                  <td>{{ $data['newDeaths'] }}</td>
                  <td>{{ $data['totalRecovered'] }}</td>
                </tr>
              @endforeach
            @else 
              <tr>
                <td colspan="7">
                  <b> No Covid Data found...</b>
                </td>
              </tr>
            @endisset
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

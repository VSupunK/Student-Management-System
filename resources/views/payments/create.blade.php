
@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payments</div>
  <div class="card-body">
      
      <form action="{{ url('batches') }}" method="post">
        {!! csrf_field() !!}
        <label>Enrollment No</label></br>
        <select name="enrollment_id" id="enrollment_id" class="form-control">
          @foreach($payments as $id => $enrollno)
          <option value="{{ $id }}">{{ $enrollno }}</option>
          @endforeach
        </select>  
        
        <label>Paid Date</label></br>
        {{-- <input type="text" name="course_id" id="course_id" class="form-control"></br> --}}
        <input type="text" name="paid_date" id="paid_date" class="form-control"></br>
        


        <label>Amount</label></br>
        <input type="text" name="amount" id="amount" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
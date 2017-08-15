@extends('layouts.admin')





@section('content')

	<h1>Media</h1>


	@if($photos)


	<form action="delete/media" method="post" class="form-inline">

		{{csrf_field()}}

		{{method_field('delete')}}

		<div class="form-group">
			<select name="checkBoxArray" id=""  class="form-control">
				<option value="">Delete</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="delete_all" class="btn btn-primary">
		</div>

		  <table class="table">
		    <thead>
		      <tr>
		      	<th><input type="checkbox" id="options"></th>
		      	<th>Id</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>

		    @foreach($photos as $photo)

		      <tr>
		      	<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
		        <td>{{$photo->id}}</td>
		        <td><img height="50" src="{{$photo->file}}"></td>
		        <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
		        <td>
		        	
		        	{{-- <input type="text" name="photo" value="{{$photo->id}}"> --}}

						
					<div class="form-group">
					{{-- 	<input type="submit" name="delete_single" value="{{$photo->id}}" class="btn btn-danger"> --}}
						<button type="submit" name="delete_single" value="{{$photo->id}}" class="btn btn-danger">Submit</button>
					</div>



		        </td>
		      </tr>


		     @endforeach

		    </tbody>
		  </table>

	  </form>

	@endif



@stop

@section('scripts')

	<script>
		
		$(document).ready(function(){

			$('#options').click(function(){
				if(this.checked){
					$('.checkBoxes').each(function(){

						this.checked = true;

					});
				}else{
					$('.checkBoxes').each(function(){

						this.checked = false;

					});
				}

			});

		});

	</script>

@stop

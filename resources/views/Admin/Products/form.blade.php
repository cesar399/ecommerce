@csrf
{{ Form::hidden('user_id', auth()->user()->id) }}
<!--<input class="form-control" name="user_id" id="user_id" type="text" value="{ { auth()->user()->id}}">-->
<div class=" form-group">
	<label>Nombre</label>
	<input class="form-control"
	 type="text"
	 name="name"
	 id="name"
	 value="{{old('name', $product->name)}} ">
</div>
<br>
<div class=" form-group">
	<label>Monto</label>
	<input class="form-control" type="text" name=" price" id="price" value="{{old('price', $product->price)}} ">
</div>
<br>
<div class=" form-group">
	<label>Descripcion</label>
	<input type="text" class="form-control" name="description" id="description" value="{{old('description', $product->description)}} ">
</div>

<!--<div class=" form-group">
	<label>user</label>
	<input type="text" name="user" id="user" value="{ {old('user', $product->user)}} ">
</div>-->
<br>
<div class=" form-group">
	<label>imagen</label>
	<input type="file" class="form-control" name="images[]" id="image" multiple >
</div>
<br>

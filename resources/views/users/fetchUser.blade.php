@extends('layout')

@section('content')
	
	<div id="UserController" style="padding-top: 2em">
		
		<div class="alert alert-danger" v-if="!isValid">
			<ul>
				<li v-show="!validation.name">Masukkan Nama.</li>
				<li v-show="!validation.email">Masukkan Email (@).</li>
				<li v-show="!validation.address">Alamat tidak boleh kosong.</li>
				<li v-show="!validation.telp">
				Isi no.tlp dengan 12 digit number.</li>
			</ul>
		</div>

		<form action="#" @submit.prevent="AddNewUser" method="POST">
			
			<div class="form-group">
				<label for="name">Name:</label>
				<input v-model="newUser.name" type="text" id="name" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="address">Address:</label>
				<input v-model="newUser.address" type="text" id="address" name="address" class="form-control">
			</div>

			<div class="form-group">
				<label for="telp">No.Tlp:</label>
				<input v-model.number="newUser.telp" type="number" id="telp" name="telp" class="form-control">
			</div>

			<div class="form-group">
				<label for="pesan">Pesan:</label>
				<textarea v-model="newUser.pesan" type="text" id="pesan" name="pesan" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New User</button>

				<button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditUser(newUser.id)">Edit User</button>
			</div>

		</form>
		
		<div class="alert alert-success" transition="success" v-if="success">Add new user successful.</div>

		<hr>

		<table class="table">
			<thead>
				<th>ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>ADDRESS</th>
				<th>NO.CONTACT</th>
				<th>PESAN</th>
				
			</thead>

			<tbody>
				<tr v-for="user in users">
					<td>@{{ user.id }}</td>
					<td>@{{ user.name }}</td>
					<td>@{{ user.email }}</td>
					<td>@{{ user.address }}</td>
					<td>@{{ user.telp}}</td>
					<td>@{{ user.pesan}}</td>
					
					<td>
						<button class="btn btn-default btn-sm" @click="ShowUser(user.id)">Edit</button>
						<button class="btn btn-danger btn-sm" @click="RemoveUser(user.id)">Soft Delete</button>
						
					</td>
				</tr>
			</tbody>
		</table>

	</div>

@endsection

@push('scripts')
	<script src="/js/script.js"></script>

	<style>
	.success-transition {
		transition: all .5s ease-in-out;
	}
	.success-enter, .success-leave {
		opacity: 0;
	}
	</style>
@endpush
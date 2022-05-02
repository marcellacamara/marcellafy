<h3 class="text-center">{{ $title }}</h3>

<div class="m-auto col-8">
  <form action="{{ route('admin.artists.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Nome do artista</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label for="file">Avatar</label>
      <input type="file" name="avatar" id="avatar" class="form-control">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
  </form>
</div>

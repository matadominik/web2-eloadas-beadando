<x-mainpage>
  <h1>Edit student</h1>

  <form action="{{ route('crud.update', $diak->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nev" placeholder="Name" value="{{ $diak->nev }}"><br>
    <input type="text" name="osztaly" placeholder="Class" value="{{ $diak->osztaly }}"><br>
    <input type="hidden" name="fiu" value="0">
    <input type="checkbox" name="fiu" id="boy" value="1" {{ $diak->fiu == 1 ? 'checked' : '' }}><label for="boy">Boy</label><br>

    <button type="submit">Update</button>
  </form>
</x-mainpage>
<x-mainpage>
  <h1>New students</h1>

  <form action="{{ route('crud.store') }}" method="POST">
    @csrf
    <input type="text" name="nev" placeholder="Name"><br>
    <input type="text" name="osztaly" placeholder="Class"><br>
    <input type="hidden" name="fiu" value="0">
    <input type="checkbox" name="fiu" id="boy" value="1"><label for="boy">Boy</label><br>

    <button type="submit">Save</button>
  </form>
</x-mainpage>
  <x-mainpage>
  <h1>Students</h1>
  <a href="{{ route('crud.create') }}">New student</a>
  <table class="table">
    <thead>
      <th>Id</th>
      <th>Name</th>
      <th>Class</th>
      <th>Boy</th>
      <th></th>
      <th></th>
    </thead>
    <tbody>
      @forelse ($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->nev }}</td>
          <td>{{ $student->osztaly }}</td>
          <td>{{ $student->fiu }}</td>
          <td><a href="{{ route('crud.edit', $student) }}">Edit</a></td>
          <td><form action="{{ route('crud.destroy', $student) }}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit">Delete</button></form></td>
        </tr>
      @empty
        <tr><td colspan="5">No student to show.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $students->links() }}
</x-mainpage>

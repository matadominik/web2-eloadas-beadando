<x-mainpage>
  <h1>Grades</h1>
  <table class="table">
    <thead>
      <th>Date</th>
      <th>Student</th>
      <th>Subject</th>
      <th>Type</th>
      <th>Grade</th>
    </thead>
    <tbody>
      @forelse ($grades as $grade)
        <tr>
          <td>{{ $grade->datum }}</td>
          <td>{{ $grade->diak->nev }}</td>
          <td>{{ $grade->targy->nev }}</td>
          <td>{{ $grade->tipus }}</td>
          <td>{{ $grade->ertek }}</td>
        </tr>
      @empty
        <tr><td colspan="5">No grade to show.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $grades->links() }}
</x-mainpage>

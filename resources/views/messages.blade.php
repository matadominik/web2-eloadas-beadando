<x-mainpage>
  <h1>Messages</h1>
  <table>
    <thead>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Full name</th>
      <th>Email address</th>
      <th>Message</th>
    </thead>
    <tbody>
      @forelse ($message_array as $message)
        <tr>
          <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
          <td>{{ $message->updated_at->format('Y-m-d H:i') }}</td>
          <td>{{ $message->full_name }}</td>
          <td>{{ $message->email_address }}</td>
          <td>{{ $message->message }}</td>
        </tr>
      @empty
        <tr><td colspan="5">No messages to show.</td></tr>
      @endforelse
    </tbody>
  </table>
</x-mainpage>
